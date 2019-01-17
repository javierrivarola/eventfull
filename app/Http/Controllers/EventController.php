<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests\StoreEvent;
use App\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;

class EventController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return  ["success"=>true,"data"=>Event::with('talks.speaker.roles','type','attendants')->get()];
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
  public function store(StoreEvent $request)
  {

    $validated = $request->validated();
    $event = Event::create($validated);
    return ["success"=>true,"data"=>$event];
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
    //
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

  /**
  * Lists the speakers for the specified event.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function getAllSpeakers($id){
    $event = Event::findOrFail($id);
    $speakers = User::whereHas('talks', function ($query) use ($event) {
      $query->where('event_id',$event->id);
    })->get();
    return ["success"=>true,"data"=>$speakers];
  }

  /**
  * Lists the speakers for the specified event.
  *
  * @param  int  event_id
  * @param  int  payment_gateway_id (1 Efectivo, 2 Tarjeta, 3 Paypal)

  * @return \Illuminate\Http\Response
  */

  public function signup(Request $request) {
      $event_id = $request->input("event_id");
      $event = Event::findOrFail($event_id);
      $user = auth()->user();
      if ($event->type->name === Event::paidTypeName) {
        $payment_gateway_id = $request->input("payment_gateway_id");
        if (!is_null($payment_gateway_id)) {
          $orderExists = \App\Order::where('user_id',$user->id)->where('event_id',$event_id)->first();
          if (is_null($orderExists)) {
            $order = \App\Order::create(["user_id"=>$user->id,"event_id"=>$event_id,"payment_gateway_id"=>$payment_gateway_id]);
            $event->attendants()->attach($user);
            return response()->json(["success"=>true,"data"=>['event'=>$event,'order'=>$order]]);
          }else{
            return response()->json(["success"=>false,"data"=>"User already has an active order on this event."]);
          }
        }else{
          return response()->json(["success"=>false,"data"=>"Payment Gateway ID is required."]);
        }
      }
      $event->attendants()->attach($user);
      return response()->json(["success"=>true,"data"=>$event]);
  }
}
