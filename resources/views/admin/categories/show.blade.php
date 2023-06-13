@extends('layouts.admin')
@section('content')
    <h1>{{ $category->name }}</h1>
    @if (count($category->projects ) > 0)
    <p>
        <h4>Progetti appartenenti a questa categoria:</h4>
        <ul class="fs-5">
            @foreach ($category->projects as $proj)
                <li><a href="{{ route('admin.projects.show', $proj->slug) }}">{{ $proj->title }}</a></li>
            @endforeach
        </ul>
    </p>
    @else
    <p class="fs-3 mt-4">Non esistono progetti che appartengono a questa categoria!</p>
    @endif
@endsection
