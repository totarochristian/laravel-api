@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Index Post</h1>

        <a class="btn btn-success text-white" href="{{ route('admin.projects.create') }}">Crea nuovo post</a>

    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $proj)
                <tr>
                    <th scope="row">{{ $proj->id }}</th>
                    <td>{{ $proj->title }}</td>
                    <td><img class="img-thumbnail" style="width:100px" src="{{ $proj->image }}" alt="{{ $proj->title }}">
                    </td>
                    <td>
                        {{ $proj->category ? $proj->category->name : 'Senza categoria' }}
                    </td>
                    <td>{{ $proj->created_at }}</td>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.projects.show', $proj->slug) }}" class="btn btn-primary text-white"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $proj->slug) }}" class="btn btn-warning text-white"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('admin.projects.destroy', $proj->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="delete-button btn btn-danger text-white"
                                    data-item-title="{{ $proj->title }}"> <i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $projects->links('vendor.pagination.bootstrap-5') }}
    @include('partials.modal-delete')
@endsection
