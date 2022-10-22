<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\TicketData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

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
            'email' => 'required|email',
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
                    // return $tikeCode->id;
                    $data=Booking::create([
                        'ticket_data_id' => $tikeCode->id,
                        'email' => $request->email,
                        'name' => $request->name,
                        'status' => '1'
                    ]);
                    // return $data;
                    if ($data) {
                      return redirect()->route('buy.ticekt',$data->ticket_data_id)->with('success','Your Data Success');
                    }
                    return redirect()->route('event.index')->with('success', 'FAild Update Data !!');
                    
                }
                return redirect()->route('event.index')->with('success', 'FAild Update Data !!');                
        }

    
    }

    public function generatePDF($id){
        // return $id;
         $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        $event=TicketData::where('id','=',$id)->first();
        $pdf = PDF::loadView('event.print', compact('event','data'));
        return $pdf->download('winarno.pdf');
    }
    public function buy($id){
        // return $data;
        $event=TicketData::where('id','=',$id)->first();
        return view('event.buy',compact('id','event'));

    }

}
