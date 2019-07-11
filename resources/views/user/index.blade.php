@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card mt-2 mb-5">
                    <img src="https://garyconstable.dev/assets/images/img_avatar.png" alt="John" style="width:100%">
                    <h1 class="my-5">{{$data['user'][0]->name}}</h1>
                    <p class="mx-3"><strong>{{$data['user'][0]->email}}</strong></p>
                    <p class="mx-3 mt-3">{{$data['user'][0]->biography}}</p>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="mt-2 mb-5">
                right
                </div>
            </div>
        </div>
    </div>
@endsection
