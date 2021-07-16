<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Pdf;
use App\Models\Post;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ConversationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function store(Request $request)
    {
        $request->validate([
           'description' => 'required|min:10'
        ]);



        $conversation = new Conversation();
        $conversation->ticket_id   = $request->ticket;
        $conversation->writer      = auth()->user()->id;
        $conversation->description = $request->description;

        try {
            $conversation->save();
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with('warning',$exception->getMessage());
        }



        $ticket  = Ticket::firstWhere('id',$request->ticket);

        if ($conversation->Writer->role === 'user')
            $ticket->status = 'manager_answer';
        else
            $ticket->status = 'user_answer';

        try {
            $ticket->save();
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with('warning',$exception->getMessage());
        }


        return redirect()->back()->with('success','Message sent');

    }



}
