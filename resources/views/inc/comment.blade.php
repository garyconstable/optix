@if (count($data['comments']) < 1)
    <p><strong>There are no comments</strong></p>
@endif

@foreach ($data['comments'] as $comment)
    <div class="list-group-item list-group-item-action flex-column align-items-start ">
        <p class="mb-1 float-left">{{ $comment->comment }}</p>
        @if($data['is_admin'])
            <p><a href="/comment/delete/{{$comment->id}}" class="btn btn-primary float-right">Delete</a></p>
        @endif
    </div>
@endforeach
