<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comments;

    public $newComment;

    public function render()
    {
        return view('livewire.comment');
    }

    //mount() is used to initialize variable
    public function mount(){
        $initialComments = Comments::get();
        $this->comments = $initialComments;
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
