<div>
    @foreach ($tickets as $ticket)
    <ul>
<a href="{{ route('ticket.edit',$ticket->id) }}">boo</a>

        @foreach ($ticket->attachmentList as $attachment)
            <li>{{ $attachment }}</li>
        @endforeach
    </ul>
    @endforeach
</div>
