<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comments = [
        [
            'body' => 'Weekly articles',
            'created_at' => '3 min ago',
            'created_by' => 'Admin'
        ],
        [
            'body' => 'Scam articles',
            'created_at' => '1 day ago',
            'created_by' => 'User'
        ]
    ];

    public $newComment;

    public function render()
    {
        return view('livewire.comment');
    }

    public function addComment(){
        if($this->newComment == ""){
            return ;
        }
        //array_unshift is used to add element at first of array
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'created_by' => 'User'
        ]);
        //reset newComment variable
        $this->newComment = '';
    }
}
