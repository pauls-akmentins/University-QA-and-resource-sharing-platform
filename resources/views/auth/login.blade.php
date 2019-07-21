
@extends('layouts\main')

@section('title', "- Login")

@section('styles')

    {{Html::style('css/parsley.css')}}
    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h1 class="all-form-group">Login</h1>
                <hr class="create-hr">

                @if ($status = Session::get('status'))
                    <div class="alert alert-info">
                        {{$status}}
                @endif

                {{Form::open(['data-parsley-validate' => ""])}}
                    {{Form::label('email', 'E-mail', ['class' => 'all-form-group'])}}
                    {{Form::email('email', null, ['class' => 'form-control form-group-pages', 'required' => '', 'pattern' => '.*@lu.lv$'])}}
                
                    {{Form::label('password', 'Password', ['class' => 'all-form-group'])}}
                    {{Form::password('password', ['class' => 'form-control form-group-pages', 'required' => ''])}}

                    {{Form::checkbox('remember')}}
                    {{Form::label('remember', 'Remember me', ['class' => 'all-form-group remember-me'])}}
                    <hr class="create-hr">
                    {{Form::submit('Login', ['class' => 'submit-button html-button html-button-left'])}}
                    
                    <p><a href="{{url('password/reset')}}" class="submit-button html-button html-button-left">Forgot password</a>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {{Html::script('js/parsley.min.js')}}

@endsection
