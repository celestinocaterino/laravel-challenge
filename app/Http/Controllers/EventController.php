<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Attendee;

class EventController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $events = Event::paginate(15);

            return response()->json($events);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 'error'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        try{
            $event = Event::create($request->all());

            return response()->json($event);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 'error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        try{
            $event->attendees;

            return response()->json([$event]);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 'error'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        try {
            $event->update($request->all());

            return response()->json($event);
        }  catch (\Throwable $th) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 'error'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();

            return response()->json([
                'message' => 'Event successfully deleted',
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reserve(Event $event, Attendee $attendee)
    {
        try {
            if($event->max_attendees <= $event->attendees()->count()){
                return response()->json([
                    'message' => 'Event fully reserved',
                ]);
            }


            if($event->attendees()->where('attendee_id', $attendee->id)->exists()){
                return response()->json([
                    'message' => 'Event already reserved',
                ]);
            }

            $event->attendees()->attach($attendee->id);

            return response()->json([
                'message' => 'Event successfully reserved',
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 'error'
            ]);
        }
    }
}
