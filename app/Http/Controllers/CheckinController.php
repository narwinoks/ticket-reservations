<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TicketData;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index(Request $request){
        if($request->code){
            // dd($request->code);
           $bookings= TicketData::where('available','=','0')-> where('code','LIKE',"%$request->code%")->with('Tikect')->with('booking')->get();
        //    dd($bookings);
        }else{
            $bookings =null;
        }
        return view('checkin.index',compact('bookings'));
    }

    public function CheckIn($id){
        $data=Booking::find($id);
        $data->update([
            'status'=>'0'
        ]);
         if ($data) {
            return redirect()->route('checkin.index')->with('success', 'Your Evenet Succesfully Deleted !!');
        }
    }
}
