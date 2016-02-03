<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    /**
     * Store a Comment for a given Ticket id
     *
     * @param Ticket $ticket
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Ticket $ticket, Request $request)
    {
        // validate the comment first
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->comment = $request->get('comment');
        $comment->user()->associate(Auth::user());
        $comment->ticket()->associate($ticket);
        $comment->save();

        session()->flash('flash_message', 'Comment added successfully');

        return redirect()->route('show_ticket', [$ticket]);
    }
}
