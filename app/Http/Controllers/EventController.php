<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\TicketData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $events=Ticket::with('TiketData')->get();
        return view('event.index',compact('events'));
    }

    public function detail($slug){
        $event=Ticket::where('slug','=',$slug)->first();
        // dd($event);
        return view('event.detail', compact('event'));
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'email' => 'required|unique:bookings|email',
        ]);
        if ($validator->fails()) {
                 return redirect()->route('event.index')->with('danger',$validator->errors());
        }else{
            if($request->sum > 1){
                return redirect()->route('event.index')->with('danger','Dont Buy Tickets More Than 2 !');
            }
                for ($i=0; $i < $request->sum; $i++) { 
                    $tiket=Ticket::where('slug','=',$request->slug)->first();
                    $tikeCode=TicketData::where('ticket_id',$tiket->id)->where('available','=','1')->first();
                    $tikeCode->update([
                        'available' => '0'
                    ]);
                    $data=Booking::create([
                        'ticket_data_id' => $tikeCode->id,
                        'email' => $request->email,
                        'name' => $request->name,
                        'status' => '1'
                    ]);
                    if ($data) {
                        return redirect()->route('event.index')->with('success', 'Succesfully  Booking Tikets !!');
                    }
                    return redirect()->route('event.index')->with('success', 'FAild Update Data !!');
                    
                }
                return redirect()->route('event.index')->with('success', 'FAild Update Data !!');                
        }

    
    }

}
