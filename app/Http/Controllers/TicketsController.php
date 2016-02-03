<?php

namespace App\Http\Controllers;

use App\Backlog;
use App\Http\Requests\TicketRequest;
use App\Ticket;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{

    /**
     * @var Ticket
     */
    private $ticket;

    public  function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Displays all Tickets
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $tickets = $this->ticket->orderBy('id', 'asc')->paginate(10);
        $header = 'All Tickets';
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Displays the Tickets by the given User id
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_user(User $user)
    {
        $tickets = $this->ticket->whereUserId($user->id)
            ->orderBy('id', 'asc')
            ->paginate(10);
        $header = 'Tickets by ' . User::findOrFail($user->id)->name;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Show a Ticket by its id
     *
     * @param Ticket $ticket
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket', 'comments_for_ticket'));
    }

    /**
     * Actual process of updating Ticket
     *
     * @param Ticket $ticket
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Ticket $ticket, Request $request)
    {
        $ticket->update($request->all());
        session()->flash('flash_message', 'You have successfully updated the ticket');
        return redirect()->route('show_ticket', [$ticket]);
    }

    /**
     * Returns the Tickets for a given Backlog id
     *
     * @param Backlog $backlog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_backlog(Backlog $backlog)
    {
        $tickets = $this->ticket->whereBacklogId($backlog->id)
            ->orderBy('id', 'asc')
            ->paginate(10);
        $header = 'Tickets for Backlog ' . Backlog::findOrFail($backlog->id)->name;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Returns all the Tickets whether they are open/close
     *
     * @param $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_status($status)
    {
        $tickets = $this->ticket->whereStatus($status)
            ->orderBy('id', 'asc')
            ->paginate(10);
        $header = 'Tickets that are ' . $status;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Tickets for a given type
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_type($type)
    {
        $tickets = $this->ticket->whereType($type)
            ->orderBy('id', 'asc')
            ->paginate(10);
        $header =  $type . ' tickets';
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Tickets for a given priority
     *
     * @param $priority
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_priority($priority)
    {
        $tickets = $this->ticket->wherePriority($priority)
            ->orderBy('id', 'asc')
            ->paginate(10);
        $header =  $priority . ' priority tickets';
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Loads a form to create Ticket
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        if(Auth::user()->is_admin()) {
            return view('tickets.create');
        } else {
            return redirect('/tickets')->with('flash_message', 'You must be a administrator to create a ticket.');
        }
    }

    /**
     * Actual process of storing Ticket
     *
     * @param TicketRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketRequest $request)
    {
        $input = $request->all();
        $this->ticket->create($input);

        return redirect('/user/profile')->with([
            'flash_message' => 'You have successfully created a ticket',
            'flash_message_important' => true
        ]);
    }

    /**
     * Delete Ticket
     *
     * @param Ticket $ticket
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete-post', $ticket);
        $ticket->delete();
        return redirect('/tickets')->with('flash_message', 'You have successfully deleted the ticket');
    }

}
