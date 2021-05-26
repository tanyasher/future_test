<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate();

        foreach ($comments as $comment){
            $timestamp = $comment->created_at->getTimestamp();
            $comment->day= date ('d.m.Y', $timestamp  );
            $comment->time= date ('H:i', $timestamp  );
        }

        $comment_create = new Comment();
        return view('comments', ['comments' => $comments, 'comment_create' => $comment_create]);

    }

    // Здесь нам понадобится объект запроса для извлечения данных
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'text' => 'required|min:1',
        ]);

        $comment = new Comment();
        $comment->fill($data);
        $comment->save();
        return redirect()
            ->route('comments.index');


    }
}
