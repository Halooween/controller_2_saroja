<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Blog;
use GuzzleHttp\Psr7\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('only')->only('index');
       $this->middleware('except')->except(['index','create', 'show', 'store', 'edit', 'update']);

    }
    public function index( $blog)
    {
        $comments= Comment::select("*")->where('blog_id', $blog)->get();
               // dd($comments);
        return view(('comment.commentIndex'), compact('blog', 'comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($blog)
    {
        $comment= Comment::all();

        return view('comment.commentCreate', compact('blog','comment'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, $blog)
    {
        //dd($blog);
        $comnt= new Comment();
        $comnt->comments= $request->get('comments');
        $comnt->blog_id=$blog;
        $comnt->save();

        return redirect()->route('blog.comment.index', $blog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show( $blog, $comment)
    {
        $comment= Comment::select("*")->where('blog_id', $blog)->first();
        // dd($comment);
        return view(('comment.commentShow'), compact('comment', 'blog'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($blog, $comment)
    {
        $comment= Comment::findorFail($comment);

        return view(('comment.commentEdit'), compact('blog','comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request,  $blog, Comment $comment)
    {
        $comment->comments= $request->get('comments');
        $comment->update();

        return redirect()->route('blog.comment.index',[$blog, $comment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('blog.comment.index',[$blog, $comment]);
    }
}
