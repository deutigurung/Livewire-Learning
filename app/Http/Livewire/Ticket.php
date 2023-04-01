<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SupportTicket;

class Ticket extends Component
{
    public function render()
    {
        $tickets = SupportTicket::get();
        return view('livewire.ticket',compact('tickets'));
    }
}
