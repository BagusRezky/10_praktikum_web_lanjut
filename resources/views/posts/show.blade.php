@extends('layouts.post')

@section('content')
<div class="container mt-5">
    <h1>{{ $post->title }}</h1>
    <img src="{{ $post->image }}" />
    <p>
        {{ $post->content }}
    </p>
</div>
@endsection
