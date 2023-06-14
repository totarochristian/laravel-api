@extends('layouts.admin')

@section('content')
    <h1>Tag list</h1>
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
            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>
                        <a class="text-black" href="{{ route('admin.tags.show', $tag->slug) }}">Show</a>
                        <a class="text-black" href="#">Modifica</a>
                        <a class="text-black" href="#">Elimina</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
