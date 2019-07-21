@extends('layouts\main')

@section('title', '| All categories')

@section('styles')

    {{Html::style('css/styles.css')}}
    
@endsection


@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1 class="all-form-group">Categories</h1>
            <hr class="create-hr">
            <a href="#" class="all-form-group categories-button">Homework questions</a>
            <hr class="create-hr">
            <a href="#" class="all-form-group categories-button">Programming questions</a>
            <hr class="create-hr">
            <a href="#" class="all-form-group categories-button">Lecture questions</a>
            <hr class="create-hr">
        </div>
        <div class="col-md-9">
            <h1 class="all-form-group">All questions</h1>
            <hr class="create-hr">
            @foreach ($questions as $question)
                <h3 class="all-form-group">{{$question->title}}</h3>
                <p class="all-form-group">{{ substr($question->body, 0, 255)}} {{ strlen($question->body) > 250 ? '...' : ""}}</p>
                <div style="date-container">
                    <p class="date-title-style-categories">added </p>
                    <p class="date-style">{{date('M j, Y', strtotime($question -> updated_at))}}</p>
                </div>
                <div style="button-container">
                    <a href="{{ url('question/'.$question->slug)}}" class="submit-button html-button-left">read</a>
                </div>
                <hr class="create-hr questions-hr">
            @endforeach
        </div>
    </div>


@endsection
