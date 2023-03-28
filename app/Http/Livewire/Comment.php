<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comments;
    public $newComment;

    protected $rules = [
        'newComment' => 'required|string',
    ];

    protected $listeners = ['removeComment'=>'delete'];

    public function render()
    {
        return view('livewire.comment');
    }

    //mount() is used to initialize variable
    public function mount(){
        $initialComments = Comments::latest()->take(5)->get();
        $this->comments = $initialComments;
    }

    // validateOnly is used for real time validation on current input field
    //updated() is livewire hooks that is used for real time validation after data being change/alter
    public function updated($request){
        $this->validateOnly($request,[
            'newComment' => 'required|string',
        ]);
    }

    public function addComment(){
        $validateData = $this->validate([
            'newComment' => 'required|string',
        ]);
        $data = Comments::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);
        $this->comments->push($data); // add new comment to collection
        //reset newComment variable
        $this->newComment = '';
        session()->flash('message','Comment added');
    }

    public function delete($id){
        $this->comments = $this->comments->except($id);
        $data = Comments::find($id)->delete();
        session()->flash('message','Comment deleted');
    }
}
