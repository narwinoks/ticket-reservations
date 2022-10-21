<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('TiketData')->get();
        return view('ticket.index',compact('tickets'));
    }
    public function create()
    {
        return view('ticket.create');
        //
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avalible' => 'required|integer',
            'price' => 'required|integer',
            'event_date'=>'required'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $dir='/images';
        $absoutPath = public_path($dir);
        $request->image->move($absoutPath, $imageName);

       $ticket=Ticket::create([
        'name'=>$request->name,
        'slug'=>str()->slug($request->name . now() ,'-' ),
        'highlight'=>$request->highlight,
        'location'=>$request->location,
        'description'=>$request->description,
        'event_date'=>$request->event_date,
        'event_time'=>$request->event_time,
        'open_at'=>$request->open_at,
        'price'=>$request->price,
        'image' =>$imageName
       ]);
       if($ticket){
          for($i =1 ;$i <= $request->avalible; $i++){
            TicketData::create([
                'ticket_id'=>$ticket->id,
                'code'=>$this->generateCode($request->name,$i),
                'available'=>1
            ]);
          }
       }else{
        return redirect()->back()->with('danger','Your Event Faild To Save !');
       }
        return redirect()->route('ticket.index')->with('success', 'Your Evenet Succesfully Has Been Added !!');
    }
    private function generateCode($name,$i){
        // format code is  random number -2first naem -years -
        $years=Date('Y');
        $letter =str()->random(1);
        $firstname=substr($name,3);
        $number=rand(1,9);
        $code = $number.$firstname  . '-'. $years . '-'. $i .$letter;
        return $code;

    }
    public function show($id)
    {
        return view('ticket.edit');    
    }

    public function edit($id)
    {
        $ticket=Ticket::find($id);
        // dd($ticket);
        return view('ticket.edit', compact('ticket')); 
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avalible' => 'required|integer',
            'price' => 'required|integer',
            'event_date' => 'required'
        ]);

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
    
            $dir = '/images';
            $absoutPath = public_path($dir);
            $request->image->move($absoutPath, $imageName);
        }else{
            $imageName=$request->banner_old;
        }

        $data = [
           
            'name' => $request->name,
            'slug' => str()->slug($request->name . now(), '-'),
            'highlight' => $request->highlight,
            'location' => $request->location,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'open_at' => $request->open_at,
            'price' => $request->price,
            'image' => $imageName
        ];
        $ticket =Ticket::where('id', $request->id)->update($data);
        // dd($ticket);
        if ($ticket) {
            for ($i = 1; $i <= $request->avalible; $i++) {
                TicketData::create([
                    'ticket_id' => $request->id,
                    'code' => $this->generateCode($request->name, $i),
                    'available' => 1
                ]);
            }
        } else {
            return redirect()->back()->with('danger', 'Your Event Faild To Save !');
        }
        return redirect()->route('ticket.index')->with('success', 'Your Evenet Succesfully Has Been Added !!');
    }
    public function destroy($id)
    {
        // return $id;
        $ticets=Ticket::find($id)->delete();
        if ($ticets) {
            return redirect()->route('ticket.index')->with('success', 'Your Evenet Succesfully Deleted !!');
        }
    }
}
