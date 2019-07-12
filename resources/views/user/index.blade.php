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

                    <h4>Comments</h4>
                    <p>necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
                    Itaque earum rerum hic tenetur a sapiente  </p>

                    <div class="list-group">
                        @foreach ($data['comments'] as $comment)
                            <div class="list-group-item list-group-item-action flex-column align-items-start ">
                                <p class="mb-1">{{ $comment->comment }}</p>
                            </div>
                        @endforeach
                    </div>

                    <h4 class="mt-5">Leave a comment</h4>
                    <p>rum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>

                    {{ Form::open(array( 'class' => 'form')) }}

                    {{ Form::textarea('comment', NULL, ['class'=>'form-control', 'placeholder' => 'Comment']) }}

                    {{ Form::submit('Save', ['class'=>'mt-3 btn btn-primary']) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
