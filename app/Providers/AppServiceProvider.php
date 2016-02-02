<?php

namespace App\Providers;

use App\Backlog;
use App\Ticket;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNav();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeNav()
    {
        view()->composer(['layouts._leftnav', 'layouts._filternav'], function($view) {
            $view->with('backlogs', Backlog::all('id', 'name'));
            $view->with('all_tickets_count', Ticket::all()->count());
            $view->with('open_tickets_count', Ticket::where('status', 'open')->count());
            $view->with('close_tickets_count', Ticket::where('status', 'close')->count());
            $view->with('bug_tickets_count', Ticket::where('type', 'bug')->count());
            $view->with('task_tickets_count', Ticket::where('type', 'task')->count());
            $view->with('high_prio_tickets_count', Ticket::where('priority', 'high')->count());
            $view->with('low_prio_tickets_count', Ticket::where('priority', 'low')->count());
            $view->with('medium_prio_tickets_count', Ticket::where('priority', 'medium')->count());
        });

        view()->composer(['tickets.create', 'tickets.show', 'tickets.edit'], function($view) {
            $ticket = new Ticket();
            $view->with('ticket_types', $ticket->displayTypes());
            $view->with('ticket_priorities', $ticket->displayPriorities());
            $view->with('backlogs', Backlog::all('id', 'name'));
            $view->with('users', User::all('id', 'name'));
        });

        view()->composer(['user.profile'], function($view) {
            $view->with('user_all_tickets', Auth::user()->tickets()->paginate(10));
        });
    }
}
