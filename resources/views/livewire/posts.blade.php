<div class="relative overflow-hidden bg-white">
    <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
      <div class="sm:max-w-lg">
         <p>Add New Post</p>

         <form class="mt-8 space-y-6" wire:submit.prevent="storePost">
            <div class="-space-y-px rounded-md shadow-sm">

            <div>
               <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
               <div class="relative mt-2 rounded-md shadow-sm">
                  <input type="text" name="title" id="title" wire:model="title" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Post Title">
                  @error('title') <span class="text-red-500 error">{{ $message }}</span> @enderror
               </div>
            </div>

            <div>
               <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
               <div class="relative mt-2 rounded-md shadow-sm">
                  <textarea  name="description" id="description"wire:model="description"  rows="5" cols="5" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Post Description">
                  </textarea>
                  @error('description') <span class="text-red-500 error">{{ $message }}</span> @enderror
               </div>
            </div>

             <div>
               <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
               <div class="relative mt-2 rounded-md shadow-sm">
                  <input type="file" name="image" id="image" wire:model="image" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
               </div>
            </div>

             <div>
               <label id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
               <div class="relative mt-2">
                  <select name="status" id="status" wire:model="status" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     <option value="1">Active</option>
                     <option value="0">InActive</option>
                  </select>
               </div>
            </div>

            <div>
            <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
               Save
            </button>
            </div>
         </form>
      </div>
      <div>
         <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
            <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
            <div class="flex items-center space-x-6 lg:space-x-8">
                  <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                     <table>
                        <thead>
                           <th>Image</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Status</th>
                        </thead>
                        <tbody>
                           @foreach($all_posts as $post)
                           <tr>
                              <td>
                                 @if($post->image != null)
                                 <img src="{{ asset('storage/posts/'.$post->image)}}" height="50" width="50"/> 
                                 @endif
                              </td>
                              <td>{{ $post->title}}</td>
                              <td>{{ $post->description}}</td>
                              <td> {{ $post->status == 1 ? 'Active' : 'Inactive'}} </td>
                           </tr>
                           @endforeach
                           {{ $all_posts->links('pagination')}}
                        </tbody>
                     </table>
                  </div>   
               </div>   
            </div>   
         </div>   
      </div>
 
</div>
