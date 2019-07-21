@extends('layouts\main')

@section('title', '- View question')

@section('styles')

    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 input-container">
            <h1 class="all-form-group">View question</h1>
        </div>
        <div class="col-md-4">
            {{Html::linkRoute('posts.index', 'back to all questions', null, ["class" => "submit-button posts-ask-question-button"])}}
        </div> 
        <div class="col-md-12">
            <hr class="create-hr">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="all-form-group">{{$question -> title}}</h1>
            <p class="all-form-group">{{$question -> body}}</p>
            <hr class="create-hr">
            <div style="date-container">
                <p class="date-title-style">last modified: </p>
                <p class="date-style">{{date('M j, Y', strtotime($question -> updated_at))}}</p>
            </div>
            <div class="button-container">
                <div class="show-button-container-edit">
                    {{Html::linkRoute('posts.edit', 'Edit', array($question->id), array('class' => 'submit-button html-button html-button-left'))}}
                </div>
                <div class="show-button-container-delete">
                    {{Form::open(['route'=>['posts.destroy', $question->id], 'method' => 'DELETE'])}}
                    {{Form::submit('Delete', ['class' => 'submit-button html-button'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection