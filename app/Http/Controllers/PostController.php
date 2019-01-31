<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\SubmitPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);
        return view('posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edit-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SubmitPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmitPost $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id()
        ]);
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        return view('edit-post', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SubmitPost  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmitPost $request, $id)
    {
        Post::find($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id()
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $post->delete();
        return redirect()->route('post.index');
    }
}
