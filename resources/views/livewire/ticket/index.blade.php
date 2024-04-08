<div>
    @foreach ($tickets as $ticket)
        <ul>
            <a href="{{ route('ticket.edit', $ticket->id) }}">{{ $ticket->id }}</a>
        </ul>
    @endforeach
</div>
