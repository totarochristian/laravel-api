@extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }}</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h6>Category: {{ $project->category ? $project->category->name : 'Senza categoria' }}
        </td>
    </h6>
    <img src="{{ $project->image }}" alt="{{ $project->title }}">
    <p>{!! $project->body !!}</p>
    @if ($project->tags && count($project->tags) > 0)
        <div>
            @foreach ($project->tags as $tag)
                <a href="{{ route('admin.tags.show', $tag->slug) }}"
                    class="badge rounded-pill text-bg-info">{{ $tag->name }}</a>
            @endforeach
        </div>
    @endif
@endsection
