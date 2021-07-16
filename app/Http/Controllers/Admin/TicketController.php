<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;


class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $tickets = Ticket::where('user_id',auth()->user()->id)
            ->orWhere('manager_id',auth()->user()->id)->get();

        return view('admin.pages.ticket.list',compact('tickets'));
    }


    public function show(Ticket $ticket)
    {
        $conversations = Conversation::where('ticket_id',$ticket->id)->orderBy('id','asc')->get();

        return view('admin.pages.ticket.reply',compact('conversations','ticket'));
    }


    public function create()
    {

        $users = User::where('role', 'user')->where('manager',auth()->user()->id)->get();
        return view('admin.pages.ticket.new', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->priority = $request->priority;

        if (auth()->user()->role === 'user') {

            $ticket->user_id = auth()->user()->id;
            $ticket->manager_id = auth()->user()->manager;
            $ticket->status = 'Wait for manager';
        }
        else
        {
            $ticket->manager_id = auth()->user()->id;
            $ticket->user_id = $request->user;
            $ticket->status = 'Wait for user';
        }

        try {
            $ticket->save();
        }
        catch (\Exception $e) {

            return redirect()->back()->with('warning', $e->getMessage());
        }


        $conversation = new Conversation();
        $conversation->ticket_id = $ticket->id;
        $conversation->writer = auth()->user()->id;
        $conversation->description = $request->description;

        try {
            $conversation->save();
        }
        catch (\Exception $e) {

            return redirect()->back()->with('warning', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Added successfully');
    }
}

