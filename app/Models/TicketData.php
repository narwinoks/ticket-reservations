<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketData extends Model
{
    use HasFactory;
    protected $guarded=['id'];

 
    public function Tikect()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id','id');
        // return 1;
    }

    public function Booking(){
        return $this->hasMany(Booking::class);
    }
}
