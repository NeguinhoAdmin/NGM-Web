<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Models\RentalPayment;
use Svg\Tag\Rect;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($motorcycle_id)
    {
        $paymentNotes = RentalPayment::find($motorcycle_id)->notes();

        // Using this section to test modal functionaility with Laravel
        return view('motorcycles.notemodal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $motorcycle_id = $request->motorcycle_id;

        $payment = RentalPayment::findOrFail($request->payment_id);

        $validated = $request->validate([
            'note' => 'required',
        ]);

        $note = new Note();
        $note->payment_id = $request->payment_id;
        $note->motorcycle_id = $request->motorcycle_id;
        $note->payment_type = $payment->payment_type;
        $note->note = $request->note;
        $note->save();

        return to_route('motorcycles.show', [$motorcycle_id])
            ->with('success', 'Note logged against payment.');
    }

    // Save notes made on customers
    public function UserNote(Request $request)
    {
        // $user_id = $request->user_id;
        $validated = $request->validate([
            'note' => 'required',
        ]);

        $note = new Note();
        $note->user_id = $request->user_id;
        $note->note = $request->note;
        $note->save();

        return to_route('users.show', [$request->id])
            ->with('success', 'Note has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "Update function...";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
