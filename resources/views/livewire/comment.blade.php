<div>
  <h1 class="text-3xl">Comments</h1>
  @if(session()->has('message'))
      <div class="text-black">{{ session('message')}}</div>
  @endif
  <section>
    @if($image)
    <img src="{{ $image }}" width="200" alt="">
    @endif
    <input id="image" name="image" type="file" autocomplete="image" wire:change="$emit('fileChoosen')">
  </section>
  @error('newComment') <span class="text-black">{{ $message}}</span>@enderror
  <form class="my-4 flex" wire:submit.prevent="addComment"> 
    <div class="mt-6 flex max-w-md gap-x-4">
    <label for="newComment" class="sr-only"></label>
    <!--
        wire:model="newComment" is used to bind input value to newComment variable 
        wire:model.debounce.500ms is used to bind input value after 500ms delay
        wire.model.lazy is used to bind input value after user leaves the input field 
      -->
    <input id="newComment" name="newComment" type="text" wire:model="newComment" autocomplete="comment" 
      class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2  shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Enter your comment">
    
      <button type="submit" class="flex-none rounded-md bg-indigo-500 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add</button>
  </div>
  </form>
  
  @foreach($all_comments as $comment)
  <div class="rounded border shadow p-3 my-2">
    <div class="flex justify-between my-2">
        <div class="flex">
            <p class="font-bold text-lg">{{$comment->user->name}}</p>
            <p class="mx-3 py-1 text-xs text-black-500 font-semibold">{{$comment->created_at->diffForHumans()}}
            </p>
        </div>
        <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"
            wire:click="$emit('removeComment',{{$comment->id}})"></i>
    </div>
    <p class="text-gray-800">{{$comment->body}}</p>
     @if($comment->image)
        <img src="{{ $comment->imagePath }}" width="200" alt="image">
      @endif
  </div>
  @endforeach
    {{ $all_comments->links('pagination')}}
</div>
<script>
  Livewire.on('fileChoosen',() => {
    let file = document.getElementById('image').files[0];
    // console.log(file);
    //Filereader read the file and convert it to base64 string
    let reader = new FileReader();
    reader.onloadend = () => {
      Livewire.emit('fileUpload',reader.result);
      // console.log(reader.result);
    }
    //readAsDataURL is used to read the contents of specified file when read operation is finished
    reader.readAsDataURL(file);
  })

</script>