@extends('layouts.admin')

@section('content')
    <h1>Categories list</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Data di creazione</th>
                <th scope="col">Azioni</th>
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
                        <a href="">Modifica</a>
                        <a href="">Elimina</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
