@extends('layouts\main')

@section('title', '- All questions')

@section('styles')

    {{Html::style('css/styles.css')}}
    
@endsection

@section('content')

    <div class="input-container input-container-posts">
        <div class="row">
            <div class="col-md-8">
                <h1 class="all-form-group">All questions</h1>
            </div>
            <div class="col-md-4 top-button">
                <a href="{{route('posts.create')}}" class="submit-button posts-ask-question-button">Ask question</a>
            </div>
            <div class="col-md-12">
                <hr class="create-hr">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table all-form-group">
                    <thead class="thead-styling">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Last modified</th>
                        <th></th>
                    </thead>

                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{$question -> title}}</td>
                                <td>{{substr($question -> body, 0, 50)}} {{strlen($question -> body) > 50 ? "..." : ""}}</td>
                                <td style="text-transform: lowercase;">{{date('M j, Y', strtotime($question -> updated_at))}}</td>
                                <td>
                                    <a href="{{route('posts.show', $question -> id)}}" class="submit-button html-button">View</a>
                                    <a href="{{route('posts.edit', $question -> id)}}" class="submit-button html-button html-button-left">Edit</a>
                                </td>
                            </tr>  
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$questions -> links("pagination::bootstrap-4"), ['class' => 'pagination']}}
                </div>
            </div>
        </div>
    </div>

@endsection