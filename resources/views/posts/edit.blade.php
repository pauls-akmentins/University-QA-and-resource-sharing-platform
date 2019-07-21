@extends('layouts\main')

@section('title', '- Edit question')

@section('styles')

    {{Html::style('css/parsley.css')}}
    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')
    <div class="row">
            <div class="offset-md-2 col-md-8 input-container data-parsley-validate">
            <h1 class="all-form-group">Edit your question</h1>
            <hr class="create-hr">
                {{Form::model($question, ['route' => ['posts.update', $question->id], 'method' => 'PATCH', 'data-parsley-validate' => ''])}}
                        {{Form::label('title', 'Title', ["class" => "all-form-group"])}}
                        {{Form::text('title', null, ["class" => 'form-control form-group-pages', 'required' => '', 'maxlength' => '255'])}}
    
                        {{Form::label('slug', 'Shortcut', ['class' => 'all-form-group'])}}
                        <div>
                            <div class="input-group-text">
                                smuia.lu.lv/questions/
                                {{Form::text('slug', null, array('class' => 'form-control form-group-pages slug-input', 'required' => '', 'maxlength' => '255', 'minlength' => '5'))}} 
                            </div>
                        </div>
                        
                        {{Form::label('body', 'Description', ["class" => "all-form-group"])}}
                        {{Form::textarea('body', null, ["class" => 'form-control form-group-pages', 'required' => ''])}}
                        <hr class="create-hr">
                <div style="date-container">
                    <p class="date-title-style">last modified: </p>
                    <p class="date-style">{{date('M j, Y', strtotime($question -> updated_at))}}</p>
                </div>
                <div style="button-container">
                    {{Html::linkRoute('posts.show', 'Cancel', array($question->id), array('class' => 'submit-button html-button'))}}                    
                    {{Form::submit('Update', ['class' => 'submit-button html-button html-button-left'])}}
                </div>
            </div>
        {{Form::close()}}
    </div>

@section('scripts')

    {{Html::script('js/parsley.min.js')}}

@endsection

@endsection