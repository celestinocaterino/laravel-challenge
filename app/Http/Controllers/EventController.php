<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;

class EventController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(15);

        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->all());

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return response()->json([
            'message' => 'Event successfully updated',
            'data' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json([
            'message' => 'Event successfully deleted',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reserve()
    {
        //TODO
    }
}
