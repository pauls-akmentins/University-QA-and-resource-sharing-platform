<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class QuestionController extends Controller
{
     public function __construct() {
          $this -> middleware('auth');
     }

     public function getIndex() {
          $questions = Post::paginate(10);

          return view('question.index') ->withQuestions($questions);
     }

    public function getSingle($slug) {
       //fetch slug
            $post = Post::where('slug', '=', $slug) -> first();
       //return view
            return view('question.single')->withPost($post);
    }
}
