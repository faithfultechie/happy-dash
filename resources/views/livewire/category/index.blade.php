<div>
    <div>
        <x-page-heading pageHeading="Categories" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="text-right">
            <x-button xs light secondary label="Add category"
                wire:click="$dispatch('openModal', {component: 'add-category-modal'})" icon="plus" />
        </div>
        <div class="text-sm mt-5">
            @livewire('CategoryTable')
        </div>
    </div>

</div>
