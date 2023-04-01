<div>
    <h1 class="text-3x1">Support Tickets</h2>
    @foreach($tickets as $ticket)
    <div class="rounded border shadow p-3 my-2 {{ $active == $ticket->id ? 'bg-blue-200' : 'bg-white-200' }}" 
        wire:click="$emit('ticketSelected',{{$ticket->id}})">
        <p class="text-grey-800">{{ $ticket->question}}</p>
    </div>
    @endforeach
</div>
