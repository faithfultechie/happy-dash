<?php

namespace App\Livewire;

use Jenssegers\Agent\Agent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ActivityTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()
                ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('authentication_log')
            ->join('users', 'authentication_log.authenticatable_id', '=', 'users.id')
            ->select('authentication_log.*', 'users.name', 'users.email');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('authenticatable_id')
            ->add('user_name', function ($model) {
                return $model->name;
            })
            ->add('ip_address')
            ->add('user_agent')
            ->add('user_agent_name', function ($model) {
                $agent = new Agent();
                return $agent->browser();
            })
            ->add('login_at')
            ->add('login_at_format', function ($model) {
                $loginAt = Carbon::parse($model->login_at);

                return $loginAt->format(
                    $loginAt->year === Carbon::now()->year
                        ? 'M d, g:i A' : 'M d, Y, g:i A'
                );
            })
            ->add('login_successful_message', function ($model) {
                return ($model->login_successful == 1) ? '<span class="rounded-md text-xs px-2 py-1.5 bg-green-100 text-green-700 ring-green-600/20">Successful</span>
                              ' : '<span class="rounded-md text-xs px-2 py-1.5 bg-red-100 text-red-700 ring-red-600/20">Failed</span>
                ';
            });
    }

    public function columns(): array
    {
        return [
            Column::make('User', 'user_name', 'authenticatable_id')
                ->sortable()
                ->searchable(),

            Column::make('Ip address', 'ip_address')
                ->sortable()
                ->searchable(),

            Column::make('User agent', 'user_agent_name', 'user_agent')
                ->sortable()
                ->searchable(),

            Column::make('Login at', 'login_at_format', 'login_at')
                ->sortable()
                ->searchable(),

            Column::make('Login successful', 'login_successful_message', 'login_successful')
                ->sortable()
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    // public function actions($row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
