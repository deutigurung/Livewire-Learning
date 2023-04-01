<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Storage;
class Comment extends Component
{
    use WithPagination;
    public $comments,$image;
    public $newComment;

    protected $rules = [
        'newComment' => 'required|string',
    ];

    protected $listeners = [
        'removeComment'=>'delete',
        'fileUpload'=>'handleFileUpload'
    ];

    public function render()
    {
        $all_comments = Comments::latest()->paginate(5);
        return view('livewire.comment',compact('all_comments'));
    }

    //mount() is used to initialize variable
    public function mount(){
        // $initialComments = Comments::latest()->take(5)->get();
        // $this->comments = $initialComments;
    }

    // validateOnly is used for real time validation on current input field
    //updated() is livewire hooks that is used for real time validation after data being change/alter
    public function updated($request){
        $this->validateOnly($request,[
            'newComment' => 'required|string',
        ]);
    }

    public function paginationView(){
        return 'pagination';
    }

    public function addComment(){
        $validateData = $this->validate([
            'newComment' => 'required|string',
        ]);
        $image = $this->storeImage();
        $data = Comments::create([
            'body' => $this->newComment,
            'image' => $image,
            'user_id' => 1
        ]);
        // $this->comments->push($data); // add new comment to collection
        //reset newComment variable
        $this->newComment = '';
        $this->image = '';
        session()->flash('message','Comment added');
    }

    public function delete($id){
        // $this->comments = $this->comments->except($id);
        $comment = Comments::find($id);
        if($comment->image) {
            Storage::disk('public')->delete('comments/'.$comment->image);
        }
        $comment->delete();
        session()->flash('message','Comment deleted');
    }

    public function handleFileUpload($imageData){
        $this->image = $imageData;
    }

    public function storeImage(){
        if(!$this->image){
            return null;
        }
        // 75 is image quality 
        $img = ImageManagerStatic::make($this->image)->encode('jpg',75);
        $name = Str::random(10);
        $file_name = $name.'.jpg';
        Storage::disk('public')->put('comments/'.$file_name,$img);
        return $file_name;
    }
}
