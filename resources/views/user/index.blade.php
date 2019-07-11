@extends('layouts.app')

@section('content')
    <div class="card mt-5 mb-5">
        <img src="https://garyconstable.dev/assets/images/img_avatar.png" alt="John" style="width:100%">
        <h1 class="my-5">{{$data['user'][0]->name}}</h1>
        <p class="mx-3"><strong>{{$data['user'][0]->email}}</strong></p>
        <p class="mx-3 mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
@endsection
