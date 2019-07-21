
@extends('layouts\main')

@section('title', "- Register")

@section('styles')

    {{Html::style('css/parsley.css')}}
    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h1 class="all-form-group">Register</h1>
                <hr class="create-hr">
                {{Form::open(['data-parsley-validate' => ""])}}
                    {{Form::label('name', 'Name', ['class' => 'all-form-group'])}}
                    {{Form::text('name', null, ['class' => 'form-control form-group-pages', 'required' => ''])}}

                    {{Form::label('surname', 'Surname', ['class' => 'all-form-group'])}}
                    {{Form::text('surname', null, ['class' => 'form-control form-group-pages', 'required' => ''])}}

                    <div class="row">
                        <div class="col-md-6">
                            {{Form::label('program', 'Program', ['class' => 'all-form-group'])}}
                            {{Form::select('program', ['Bachelor' => 'Bachelor', 'Magister' => 'Magister', 'Lecturer' => 'Lecturer'], 'Bachelor', ['class' => 'form-control form-group-pages btn register-dropdown dropdown-toggle', 'required' => ''])}}
                        </div>
                        <div class="col-md-6">
                            {{Form::label('year', 'Year', ['class' => 'all-form-group'])}}
                            {{Form::select('year', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '-' => '-'], '1', ['class' => 'form-control form-group-pages btn register-dropdown dropdown-toggle', 'required' => ''])}}
                        </div>
                    </div>
                    {{Form::label('email', 'E-mail', ['class' => 'all-form-group'])}}
                    {{Form::email('email', null, ['class' => 'form-control form-group-pages', 'required' => '', 'pattern' => '.*@lu.lv$'])}}

                    {{Form::label('password', 'Password', ['class' => 'all-form-group'])}}
                    {{Form::password('password', ['class' => 'form-control form-group-pages', 'required' => ''])}}

                    {{Form::label('password_confirmation', 'Confirm password', ['class' => 'all-form-group'])}}
                    {{Form::password('password_confirmation', ['class' => 'form-control form-group-pages', 'required' => '', 'data-parsley-equalto' => '#password' ])}}

                    <hr class="create-hr">
                    {{Form::submit('Register', ['class' => 'submit-button html-button html-button-left'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {{Html::script('js/parsley.min.js')}}

@endsection
