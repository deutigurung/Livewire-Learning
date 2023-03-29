@extends('layouts.app')
@section('content')
        <div class="container">
                @include('layouts.notifications')
                <livewire:posts />
        </div>
@endsection