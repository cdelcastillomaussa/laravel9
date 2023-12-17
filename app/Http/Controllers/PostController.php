<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show'] ]);
    }
    
    public function index()
    {
        //manera de DB 
        //$posts = DB::table('posts')->get();

        //Eloquent ORM
        $posts = Post::all();



        //simulacion normal datos staticos
        // $posts = [
        //     ['title' => 'First post'],
        //     ['title' => 'Second post'],
        //     ['title' => 'Third post'],
        //     ['title' => 'Fourth post45']
        // ];
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        //view('show', ['post' => $id_post]) Post::find($id_post)
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    //guargar con eloquent a base de datos
    public function store(SavePostRequest $request)
    {
        /*validate with Request
        $validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body'  => ['required']
        ]);*/

        //dd($validated);
        /*$posts = new Post;
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->save();*/

        /*validate
        [
            'title' => $request->input('title'),
            'body'  => $request->input('body')
        ]*/
        Post::create($request->validated());

        //session()->flash('status', 'Post created!'); == ->with('status', 'Post CREATED!!')

        //se puede retornar asi
        //return redirect()->route('posts.index');
        // y asi..
        return to_route('posts.index')->with('status', 'Post CREATED!!');
    }

    public function edit(Post $post)
    {
        return  view('posts.edit', ['post' => $post]);
    }

    public function update(SavePostRequest $request, Post $post)
    {
       /* validate with Request
        $validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body'  => ['required']
        ]); */

        /*$post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();*/

        $post->update($request->validated());


        //session()->flash('status', 'Post updated!');

        //se puede retornar asi
        //return redirect()->route('posts.index');
        // y asi..
        return to_route('posts.show', $post)->with('status', 'Post updated!!');
    }

    public function destroy(Post $post){
        $post->delete();
        return to_route('posts.index')->with('status', 'Post deleted!');
    }
}
