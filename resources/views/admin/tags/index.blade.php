@extends('layouts.admin')

@section('content')
    <h1>Tag list</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>
                        <a class="text-black" href="{{ route('admin.tags.show', $tag->slug) }}">Show</a>
                        <a class="text-black" href="#">Edit</a>
                        <a class="text-black" href="#">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
