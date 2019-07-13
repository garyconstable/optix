@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="my-3 display-5">Users: </h1>
                <section>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data['users'] as $user)
                            <tr>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ date('l, dS F Y H:i:s', strtotime($user->updated_at)) }}</td>
                                <td class="align-middle, text-right"><a class="btn btn-primary" href="/user/{{ $user->id }}">Visit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
                <section>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @for ($i =1; $i < $data['totalPages'] + 1; $i++)
                                <li class="page-item"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
                            @endfor
                        </ul>
                    </nav>
                </section>
            </div>
        </div>
    </div>
@endsection
