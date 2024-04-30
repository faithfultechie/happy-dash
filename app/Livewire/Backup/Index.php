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
    public function deleteBackup()
    {
        $appName = config('app.name');
        if (Storage::disk('local')->exists($appName)) {
            Storage::disk('local')->delete($appName);
            return "Backup file  has been deleted successfully.";
        } else {
            return "Backup file  does not exist.";
        }
    }

    public $message = '';
    public $isBackupRunning = false;

    public function runBackup()
    {
        // Set the flag to indicate backup is running
        $this->isBackupRunning = true;
        // Execute the backup command
        Artisan::call('backup:run');
    }

    public function runBackup2()
    {
        // Set the flag to indicate backup is running
        $this->isBackupRunning = false;
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
                'storageSpace' => $destination->usedStorage(),
                'backups' => [],
            ];
            foreach ($backups as $backup) {
                $destInfo['backups'][] = [
                    'path' => $backup->path(),
                    'date' => $backup->date(),
                    'size' => $backup->sizeInBytes(),
                ];
            }
            $info[] = $destInfo;
        }
        return $info;
    }
    public function render()
    {
        $backupInfo = $this->getBackupInfo();
        return view('livewire.backup.index', compact('backupInfo'));
    }
}
