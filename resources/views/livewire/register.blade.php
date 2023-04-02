<div class="flex min-h-full items-center justify-center">
  <div class="w-full max-w-md space-y-8">
    <div>
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign up to  account</h2>
    </div>
   
    <form class="mt-8 space-y-6" wire:submit.prevent="addUser">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="full-name" class="sr-only">Full Name</label>
          @error('userRegister.name') <span class="text-red-500">{{ $message}}</span> @enderror
          <input id="full-name" name="name" type="text" autocomplete="name" wire:model="userRegister.name"
           class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Full Name">
        </div>
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          @error('userRegister.email') <span class="text-red-500">{{ $message}}</span> @enderror
          <input id="email-address" name="email" type="email" autocomplete="email" wire:model="userRegister.email"
           class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          @error('userRegister.password') <span class="text-red-500">{{ $message}}</span> @enderror
          <input id="password" name="password" type="password" autocomplete="current-password" wire:model="userRegister.password"
           class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Password">
        </div>
         <div>
          <label for="password_confirmation" class="sr-only">Password Confirmation</label>
          @error('userRegister.password_confirmation') <span class="text-red-500">{{ $message}}</span> @enderror
          <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="password_confirmation" wire:model="userRegister.password_confirmation"
           class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Password Confirmation">
        </div>
      </div>

      <div>
        <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
            </svg>
          </span>
          Register
        </button>
      </div>
    </form>
  </div>
</div>