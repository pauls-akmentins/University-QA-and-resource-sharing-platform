
@extends('layouts\main')

@section('title', "- Forgot my password")

@section('styles')

    {{Html::style('css/parsley.css')}}
    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h1 class="all-form-group">Forgot password</h1>
                <hr class="create-hr">

                {{Form::open(['url' => 'password/reset', 'method' => 'POST'], ['data-parsley-validate' => ""])}}
                    
                    {{Form::hidden('token', $token)}}
                    
                    {{Form::label('email', 'E-mail', ['class' => 'all-form-group'])}}
                    {{Form::email('email', $email, ['class' => 'form-control form-group-pages', 'required' => '', 'pattern' => '.*@lu.lv$'])}}
                
                    {{Form::label('password', 'New password', ['class' => 'all-form-group'])}}
                    {{Form::password('password', ['class' => 'form-control form-group-pages', 'required' => ''])}}

                    {{Form::label('password_confirmation', 'Confirm new password', ['class' => 'all-form-group'])}}
                    {{Form::password('password_confirmation', ['class' => 'form-control form-group-pages', 'required' => '', 'data-parsley-equalto' => '#password' ])}}

                    <hr class="create-hr">
                    {{Form::submit('Reset', ['class' => 'submit-button html-button html-button-left'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {{Html::script('js/parsley.min.js')}}

@endsection
