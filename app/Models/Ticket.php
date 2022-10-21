<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Ticket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function TiketData(){
        return $this->hasMany(TicketData::class)->where('available' , '=', 1);
    }
}

