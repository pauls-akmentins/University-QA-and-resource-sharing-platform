
@extends('layouts\main')

@section('title', "- Contact")

@section('styles')

    {{Html::style('css/parsley.css')}}
    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="all-form-group all-form-group-pages">Contact</h1>
                <hr class="create-hr create-hr-pages">
                <form action="{{url('contact')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email" class="all-form-group all-form-group-pages">Email</label>
                        <input id="email" name="email" class="form-control form-group-pages">
                    </div>
                    <div class="form-group">
                        <label name="subject" class="all-form-group all-form-group-pages">Subject</label>
                        <input id="subject" name="subject" class="form-control form-group-pages">
                    </div>
                    <div class="form-group">
                        <label name="message" class="all-form-group all-form-group-pages">Message</label>
                        <textarea id="message" name="Message" class="form-control form-group-pages"></textarea>
                    </div>
                    <hr class="create-hr create-hr-pages">
                    {{Form::submit('Contact', ['class' => 'submit-button submit-button-pages html-button'])}}
                </form>
            </div>
        </div>
    </div>
@endsection
