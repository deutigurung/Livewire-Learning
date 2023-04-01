<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SupportTicket;

class Ticket extends Component
{

    public $active;

    protected $listeners = ['ticketSelected'];

    public function render()
    {
        $tickets = SupportTicket::get();
        return view('livewire.ticket',compact('tickets'));
    }

    public function ticketSelected($ticketId){
        $this->active = $ticketId;
    }
}
