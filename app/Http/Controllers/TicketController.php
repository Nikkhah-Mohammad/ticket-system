<?php

namespace App\Http\Controllers;

use App\Status;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\TicketUpdateRequest;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $tickets =Ticket::latest()->paginate(10);
        return view('tickets.index',compact('tickets'));
    }

    public function GetAPI(){
        return $tickets =Ticket::latest()->paginate(200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }
    public function delete(Ticket $ticket)
    {
        return view('tickets.delete',compact('ticket'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketUpdateRequest $request)
    {
        Ticket::create([
           'summary'=> request('summary'),
           'description' =>request('description'),
           'status'=>request('status'),
        ]);
        return redirect()->route(
            'tickets.index');
    }


    public function storeAPI(request $request){

        $request->wantsJson();

        $request->validate([
           'summary' =>'required',
          'description'=>'required',
          'status'=>'required'
 

        ]); 

       $pr =  Ticket::create([
           'summary'=> request('summary'),
           'description' =>request('description'),
           'status'=>request('status'),
        ]);
        dd($pr);
        return $pr;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)

    {
        $statuses =Status::get();
        return view('tickets.show',compact(['ticket','statuses']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $ticket->summary =request('summary');
        $ticket->description =request('description');
        $ticket->status =request('status');
        $ticket->save();
        return redirect()->route('tickets.index')->withSuccess('Ticket has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->withSuccess('Ticket has been deleted');
    }
}
