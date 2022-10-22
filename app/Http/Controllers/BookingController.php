<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ticket;
use App\Models\TicketData;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings=Booking::with('TicketData.Tikect')->get();
        return view('booking.index',compact('bookings'));
    }
    public function destroy($id){
        $booking=Booking::find($id);
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Succesfully Deleted !!');
    }

    public function edit($id){
        $booking = Booking::with('TicketData.Tikect')->find($id);
        // dd($booking);
        return view('booking.edit', compact('booking'));
    }

    public function update(Request $request,$id ){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $data=Booking::find($id);
        $data->update($request->all());
        if ($data) {
            return redirect()->route('booking.index')->with('success', 'Succesfully Updated Booking !!');
        }
        return redirect()->route('booking.index')->with('success', 'FAild Update Data !!');



    }
}
