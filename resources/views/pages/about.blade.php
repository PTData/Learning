@extends('app')
@section('content')

@if(count($people))
    <h1>About Me {{ $first }} {{ $second }}</h1>
    {{ $teste }}

    <h3>People I Like</h3>
    <ul>
        @foreach($people as $p)
        <li> {{ $p }} </li>
        @endforeach
    </ul>
@endif
<p>Abouch of text</p>
@stop