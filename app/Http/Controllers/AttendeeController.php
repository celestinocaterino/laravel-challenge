<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendeeRequest;
use App\Http\Requests\UpdateAttendeeRequest;
use App\Models\Attendee;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $attendees = Attendee::paginate(15);

            return response()->json($attendees);

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
    public function store(StoreAttendeeRequest $request)
    {
        try {
            $attendee = Attendee::create($request->all());

            return response()->json($attendee, 201);
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
    public function show(Attendee $attendee)
    {
        try{
            return response()->json($attendee);
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
    public function update(UpdateAttendeeRequest $request, Attendee $attendee)
    {
        try {
            $attendee->update($request->all());

            return response()->json([
                'message' => 'Attendee successfully updated',
                'data' => $attendee
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
    public function destroy(Attendee $attendee)
    {
        try{
            $attendee->delete();

            return response()->json([
                'message' => 'Attendee successfully deleted',
            ]);
        }
        catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'status' => 'error'
            ]);
        }
    }
}
