<?php

namespace App\Livewire\Backup;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class Index extends Component
{
    public $isBackupRunning = false;
    public function runBackup()
    {
        // Set the flag to indicate backup is running
        $this->isBackupRunning = true;
        // Execute the backup command
        Artisan::call('backup:run');
    }

    public function closeAlert()
    {
        // Set the flag to indicate backup is running
        $this->isBackupRunning = false;
    }
    private function formatBytes($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
    }
    public function getBackupInfo()
    {
        $statuses = BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitor_backups'));
        $info = [];
        foreach ($statuses as $status) {
            $destination = $status->backupDestination();
            $backups = $destination->backups();
            $destInfo = [
                'name' => $destination->backupName(),
                'disk' => $destination->diskName(),
                'storageType' => $destination->filesystemType(),
                'reachable' => $destination->isReachable(),
                'healthy' => $status->isHealthy(),
                'count' => $backups->count(),
                'storageSpace' => $this->formatBytes($destination->usedStorage()),
                'backups' => [],
            ];
            foreach ($backups as $backup) {
                $destInfo['backups'][] = [
                    'path' => $backup->path(),
                    'date' => $backup->date(),
                    'size' => $this->formatBytes($backup->sizeInBytes()),
                ];
            }

            $info[] = $destInfo;
        }
        return $info;
    }

    public function downloadBackup($path)
    {
        $backupFilePath = storage_path('app/' . $path);
        if (file_exists($backupFilePath)) {
            return response()->download($backupFilePath);
        }
    }
    public function deleteBackup($path)
    {
        $backupFilePath = storage_path('app/' . $path);
        if (file_exists($backupFilePath)) {
            unlink($backupFilePath);
            return true;
        }
        return false;
    }
    public function render()
    {
        $backupInfo = $this->getBackupInfo();
        return view('livewire.backup.index', compact('backupInfo'));
    }
}
