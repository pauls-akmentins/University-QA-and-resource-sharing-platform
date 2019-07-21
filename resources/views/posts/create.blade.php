@extends('layouts\main')

@section('title', '- Ask a question')

@section('styles')

    {{Html::style('css/parsley.css')}}
    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')

    <div class="row">
        <div class="offset-md-2 col-md-8 input-container">
            <h1 class="all-form-group">Ask a question</h1>
            <hr class="create-hr">
            {{ Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) }}
                
                {{Form::label('category_id', 'Category', ['class' => 'all-form-group'])}}
                <select class="form-control form-group-pages btn register-dropdown dropdown-toggle" name="category_id">
                    @foreach ($categories as $category)
                        <option value='{{$category->id}}'>{{$category->name}}</option> 
                    @endforeach
                </select>
                
                {{Form::label('title', 'Title', ['class' => 'all-form-group'])}}
                {{Form::text('title', null, array('class' => 'form-control form-group-pages', 'required' => '', 'maxlength' => '255'))}}

                {{Form::label('slug', 'Shortcut', ['class' => 'all-form-group'])}}
                <div>
                    <div class="input-group-text">
                        smuia.lu.lv/questions/
                        {{Form::text('slug', null, array('class' => 'form-control form-group-pages slug-input', 'required' => '', 'maxlength' => '255', 'minlength' => '5'))}} 
                    </div>
                </div>
                {{Form::label('body', 'Description', ['class' => 'all-form-group'])}}
                {{Form::textarea('body', null, array('class' => 'form-control form-group-pages', 'required' => ''))}}
            <hr class="create-hr">
                {{Form::submit('Post your question', array('class' => 'submit-button' ))}}
            {{ Form::close() }}
        </div>
    </div>

@endsection

@section('scripts')

    {{Html::script('js/parsley.min.js')}}

@endsection