<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }


    public function create()
    {
        $aux = new Ticket();
        $fillable = $aux->getFillable();
        return view('tickets.create', compact('fillable'));
    }


    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'screenshot' => $request->file('screenshot')->getClientOriginalName(),
            'creator' => $request->creator,
            'priority' => $request->priority
        ]);

        $request->file('screenshot')->storeAs('public', $request->file('screenshot')->getClientOriginalName());

        return redirect()->route('tickets.show', $ticket);
    }


    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }


    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }


    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $ticket->update([
            'title' => $request->title,
            'description' => $request->description,
            'creator' => $request->creator,
            'priority' => $request->priority
        ]);

        if ($request->hasFile('screenshot')) {
            $ticket->update([
                'screenshot' => $request->file('screenshot')->getClientOriginalName()
            ]);
            $request->file('screenshot')->storeAs('public', $request->file('screenshot')->getClientOriginalName());
        }

        return redirect()->route('tickets.show', $ticket);
    }


    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
