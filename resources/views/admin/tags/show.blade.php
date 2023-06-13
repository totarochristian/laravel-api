@extends('layouts.admin')
@section('content')
    <h1>{{ $tag->name }}</h1>

    @if (count($tag->projects ) > 0)
    <p>
        <h4>Progetti che utilizzano questa tecnologia:</h4>
        <ul class="fs-5">
            @foreach ($tag->projects as $proj)
                <li><a href="{{ route('admin.projects.show', $proj->slug) }}">{{ $proj->title }}</a></li>
            @endforeach
        </ul>
    </p>
    @else
    <p class="fs-3 mt-4">Non esistono progetti che utilizzano questa tecnologia!</p>
    @endif
@endsection
