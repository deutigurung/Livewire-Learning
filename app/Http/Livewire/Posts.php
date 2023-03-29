<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
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
        return view('livewire.posts');
    }

    public function storePost(){
        $this->validate();
        Post::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'status' => 1,
        ]);
        $this->title = '';
        $this->description = '';
        session()->flash('success','Post Added Successfully');

    }
}
