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
     * @return View
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
     * @param $id
     * @return View
     */
    public function tickets_by_user($id)
    {
        $tickets = $this->ticket->whereUserId($id)
            ->orderBy('id', 'asc')
            ->paginate(10);
        $header = 'Tickets by ' . User::findOrFail($id)->name;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Show a Ticket by its id
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $ticket = $this->ticket->findOrFail($id);
        return view('tickets.show', compact('ticket', 'comments_for_ticket'));
    }

    /**
     * Load a form to edit a given Ticket id
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $ticket = $this->ticket->findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }


    /**
     * Actual process of updating Ticket
     *
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, Request $request)
    {
        $ticket = $this->ticket->findOrFail($id);
        $ticket->update($request->all());
        session()->flash('flash_message', 'You have successfully updated the ticket');
        return redirect()->route('show_ticket', [$ticket]);
    }

    /**
     * Returns the Tickets for a given Backlog id
     *
     * @param $id
     * @return View
     */
    public function tickets_by_backlog($id)
    {
        $tickets = $this->ticket->whereBacklogId($id)
            ->orderBy('id', 'asc')
            ->paginate(10);
        $header = 'Tickets for Backlog ' . Backlog::findOrFail($id)->name;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Returns all the Tickets whether they are open/close
     *
     * @param $status
     * @return View
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
     * @return View
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
     * Tickets for a given prio
     *
     * @param $priority
     * @return View
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
     * @return View
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
     * @return Redirector
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
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $ticket = $this->ticket->findOrFail($id);
        $this->authorize('delete-post', $ticket);
        $ticket->delete();
        return redirect('/tickets')->with('flash_message', 'You have successfully deleted the ticket');
    }

}
