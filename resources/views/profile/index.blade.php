@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <section class="col-12 ">
                <h1 class="my-3 display-5">Welcome, {{$data['name']}}</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitati</p>
            </section>
            <section class="col-12 col-md-4">
                <div class="cardd text-left mb-5">
                    <div>
                        <h4 class="my-3">Profile</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ Form::open(array('url' => '/home', 'class' => 'form')) }}

                        {{ Form::text('name', $data['name'], ['class'=>'form-control', 'placeholder' => 'Name']) }} <br>

                        {{ Form::textarea('biography', $data['biography'], ['class'=>'form-control', 'placeholder' => 'Biography']) }}

                        {{ Form::submit('Save', ['class'=>'mt-3 btn btn-primary']) }}

                        {{ Form::close() }}

                    </div>
                </div>
            </section>
            <section class="col-12 col-md-8">
                <h4 class="my-3">Comments</h4>
                <div class="list-group mb-5">
                    @include('inc.comment')
                </div>
            </section>
        </div>
    </div>
@endsection
