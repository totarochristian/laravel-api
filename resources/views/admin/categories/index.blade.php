@extends('layouts.admin')

@section('content')
    <h1>Categories list</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.categories.show', $category->slug) }}">Show</a>
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
