<?php

namespace App\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class AuditTable extends PowerGridComponent
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
        return DB::table('Audits')
            ->join('users', 'audits.auditable_id', '=', 'users.id')
            ->select('audits.*', 'audits.created_at', 'users.name', 'users.email');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_name', function ($model) {
                return $model->name;
            })
            ->add('event')
            ->add('auditable_id')
            ->add('ip_address')
            ->add('user_agent_name', function ($model) {
                $agent = new Agent();
                return $agent->browser();
            })
            ->add('created_at')
            ->add('created_at_formatted', fn ($model) => Carbon::parse($model->created_at)->diffForHumans());
    }

    public function columns(): array
    {
        return [
            Column::make('User', 'user_name')
                ->sortable()
                ->searchable(),

            Column::make('Event', 'event')
                ->sortable()
                ->searchable(),

            Column::make('Ip address', 'ip_address')
                ->sortable()
                ->searchable(),

            Column::make('User agent', 'user_agent_name', 'user_agent')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('created_at', 'created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

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
