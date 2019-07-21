<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
use Mail;


class PostController extends Controller
{
    public function __construct() {
        $this -> middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable
        $posts = Post::orderBy('updated_at', 'desc') -> paginate(10);
        
        //return a view with variable
        return view('posts\index')->withQuestions($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts\create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating input
            $this->validate($request, array(
                'category_id' => 'required|integer',
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));

        //store
            $post = new Post;
            
            $post -> title = $request -> title;
            $post -> body = $request -> body;
            $post -> slug = $request -> slug;
            $post -> category_id = $request -> category_id;

            $post -> save();

            Session::flash('success', 'Your question was successfully added!');

        //redirect
            return redirect() -> route('posts.show', $post->id);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts\show')->withQuestion($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //validation

        //find the question
            $post = Post::find($id);

        //return the view with variable
            return view('posts\edit')->withQuestion($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validating changes
        $post = Post::find($id);
        if ($request -> input('slug') == $post -> slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        }
        else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }

        //store
        $post = Post::find($id);
            
        $post -> title = $request -> input('title');
        $post -> body = $request -> input('body');
        $post -> slug = $request -> input('slug');

        $post -> save();

        //success message
        Session::flash('success', 'Your question was successfully edited!');

        //redirect with flash data
        return redirect() -> route('posts.show', $post -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
            $post = Post::find($id);

            $post -> delete();

        //success message
            Session::flash('success', "Your question was successfully deleted");
        //redirect with flash data
            return redirect() -> route('posts.index');
    }

}
