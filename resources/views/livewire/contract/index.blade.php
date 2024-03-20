<div>
    <div>
        <x-page-heading pageHeading="Contracts" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow mt-5">
        <div class="text-right">
            <a href="{{ route('contract.create') }}"><x-button xs light secondary label="Add contract" icon="plus" /></a>
        </div>
        <div class="text-sm mt-5">
            @livewire('ContractTable')
        </div>
    </div>

</div>
