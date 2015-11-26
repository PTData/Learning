@extends('app')

@section('content')

<h1>Write a new Article</h1>

<hr/>

{!! Form::open(['url' => 'articles']) !!}
    
    @include('articles/form', ['submitButton' => "Criar Artigo"])
    
{!! Form::close() !!}
@include('errors/list')
@stop