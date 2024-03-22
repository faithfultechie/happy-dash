<div>
    <div>
        <x-page-heading pageHeading="Users" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 opacity-75 shadow-md mt-5">
        <div class="text-right">
            <x-button xs light secondary label="Add user"
                wire:click="$dispatch('openModal', {component: 'add-user-modal'})" icon="plus" />
            <a href="{{ route('permission.index') }}" class="ml-4 text-gray-900 hover:text-gray-500 font-medium">Permissions & roles</a>
        </div>
        <div class="text-sm mt-5">
            @livewire('UserTable')
        </div>
    </div>

</div>
