<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Livewire</title>
    @livewireStyles
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="min-h-full">
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <div class="container mx-auto">
        <div class="w-full flex">
            <div class="w-1/2 rounded border p-2">
                <livewire:login/>
            </div>
            <div class="w-1/2 rounded border p-2">
                <livewire:register/>
            </div>
        </div>
    </div>
    </div>
  </main>
</div>
 @livewireScripts
</body>
</html>