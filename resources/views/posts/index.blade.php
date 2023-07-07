@extends('layouts.post')

@section('content')
<div class="container mt-5">
    <h1>Posts</h1>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="d-flex">
        {{ $posts->links() }}
    </div>
</div>
@endsection
