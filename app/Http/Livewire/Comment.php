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
        $initialComments = Comments::latest()->get();
        $this->comments = $initialComments;
    }

    public function addComment(){
        if($this->newComment == ""){
            return ;
        }
        $data = Comments::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);
        $this->comments->push($data); // add new comment to collection
        //reset newComment variable
        $this->newComment = '';
    }
}
