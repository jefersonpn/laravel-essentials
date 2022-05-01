<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class ShowRoomsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $roomType = null)
    {
        $rooms = Room::byType($roomType)->get();

      // We can use WITHTRASHED() and WHERE() here as well
      //  $rooms = Room::byType($roomType)->withTrashed()->where()->get();
      
      // Just another way of filter the data.
      /*  if (isset($roomType)) {
           $rooms = Room::where('room_type_id', $roomType)->get();
           // If we want to compare to some thing we can use like this.
           //  $rooms = Room::where('room_type_id', '!=', $roomType)->get();

       }else{
            $rooms = Room::get();
       } */
       
        /*  $rooms = Room::get();
        if ($request->query('id') !== null){
            $rooms = $rooms->where('room_type_id', $request->query('id'));        
        } */
        return view('rooms.index', ['rooms'=> $rooms]);
    }
}
