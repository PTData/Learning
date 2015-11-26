@extends('app')

@section('content')

<h1>Articles</h1>
<hr>
    @foreach($articles as $art)
    <article>
        <h2>
            <a href='{{ url('articles', $art->id) }}'>{{ $art->title }}</a>
        </h2>
        <div class="body">{{ $art->body }}</div>
    </article>
    @endforeach
@stop