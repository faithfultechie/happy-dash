<div>
    <div>
        <x-page-heading pageHeading="Tickets" />
    </div>
    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow mt-5">
        <div class="text-right">
            <a href="{{ route('ticket.create') }}"><x-button xs light secondary label="Create ticket" icon="plus" /></a>
        </div>
        <div class="text-sm mt-5">
            @livewire('TicketTable')
        </div>
    </div>
</div>
