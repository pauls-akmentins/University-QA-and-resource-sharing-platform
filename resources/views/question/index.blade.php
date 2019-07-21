@extends('layouts\main')

@section('title', '| Questions')

@section('styles')

    {{Html::style('css/styles.css')}}
    
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="all-form-group">Questions</h1>
            <hr class="create-hr">
        </div>
    </div>

    @foreach ($questions as $question)
        <div class="row">
            <div class="col-md-12">
                <h3 class="all-form-group">{{$question->title}}</h3>
                <p class="all-form-group">{{ substr($question->body, 0, 255)}} {{ strlen($question->body) > 250 ? '...' : ""}}</p>
                <div style="date-container">
                    <p class="date-title-style">added </p>
                    <p class="date-style">{{date('M j, Y', strtotime($question -> updated_at))}}</p>
                </div>
                <div style="button-container">
                    <a href="{{ url('question/'.$question->slug)}}" class="submit-button html-button-left">read</a>
                </div>
                <hr class="create-hr questions-hr">
            </div>
        </div> 
    @endforeach

    <div class="pagination">
        {{$questions -> links("pagination::bootstrap-4"), ['class' => 'pagination']}}
    </div>

@endsection