<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function tickets(){

        $data=Ticket::with('TiketData')->get();
        // dd($data);
        $return = [];
        foreach ($data as $key => $value) {
            $action = '<a href="JavaScript " class="btn btn-primary btn-sm mx-1">Show</a>';
            $action2 = '<a href="javascript:void(0)"  onclick="editTodo(${todo.id})"  data-toggle="tooltio" data-id="'.$value->id.'" data-origin-title="Delete" id="delete" class="btn btn-danger btn-sm mx-1">Delete</a>';
            if(count($value->TiketData)){
                $avalible= '<p class="text-success">Available</p>';
            }else{
                $avalible = '<p class="text-danger">SoltOut</p>';
            }
            $return[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'avalible'=>$avalible,
                'description'=>$value->description,
                'action' => $action . $action2,
            ];
        }
        $response['data'] = $return;
        echo json_encode($response);
    }
}
