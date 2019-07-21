
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                {{Form::open(['url' => 'password/email', 'method' => 'POST'], ['data-parsley-validate' => ""])}}
                    {{Form::label('email', 'E-mail', ['class' => 'all-form-group'])}}
                    {{Form::email('email', null, ['class' => 'form-control form-group-pages', 'required' => '', 'pattern' => '.*@lu.lv$'])}}
                
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
