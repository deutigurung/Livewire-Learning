<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithFileUploads,WithPagination;

    protected $filename = null;
    public $title,$description,$image,$status;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|min:10',
        'image' => 'nullable|image|max:1024|mimes:jpeg,png,jpg'
    ];

    public function updated($request){
        $this->validateOnly($request,[
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|max:1024|mimes:jpeg,png,jpg'
        ]);
    }

    public function render()
    {
        $all_posts = Post::active()->latest()->paginate(2);
        return view('livewire.posts',compact('all_posts'));
    }

    public function paginationView(){
        return 'pagination';
    }

    public function storePost(){
        $this->validate();
        if($this->image != ''){
            $ext = $this->image->extension();
            $this->filename = 'post-'.time().'.'.$ext;
            $this->image->storeAs('public/posts',$this->filename);
        }
       
        $post = Post::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'status' => 1,
            'image' => $this->filename,
        ]);
       
        $this->title = '';
        $this->description = '';
        $this->image = '';
        session()->flash('success','Post Added Successfully');

    }
}
