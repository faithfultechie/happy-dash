<div>
    <div>
        <x-page-heading pageHeading="Companies" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="text-right">
            <x-button xs light secondary label="Add company"
                wire:click="$dispatch('openModal', {component: 'add-company-modal'})" icon="plus" />
        </div>
        <div class="text-sm mt-5">
            @livewire('CompanyTable')
        </div>
    </div>

</div>
