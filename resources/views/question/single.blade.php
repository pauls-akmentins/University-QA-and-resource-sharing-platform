@extends('layouts\main')

@section('title', "| $post->title")

@section('styles')

    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')

    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h1 class="all-form-group">{{$post->title}}</h1>
            <p class="all-form-group">{{$post->body}}</p>
            <hr class="create-hr">
        </div>

@endsection