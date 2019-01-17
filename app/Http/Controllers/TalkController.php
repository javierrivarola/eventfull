<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTalk;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ["success"=>true,"data"=> Talk::with('speaker.roles','event.type','questions')->get()];
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
    public function store(StoreTalk $request)
    {
      $validated = $request->validated();
      $talk = Talk::create($validated);
      return ["success"=>true,"data"=>$talk];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function show(Talk $talk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function edit(Talk $talk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talk $talk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talk $talk)
    {
        //
    }

    public function mine() {
      $user = auth()->user();
      if ($user->hasRole('investigador')) {
        $myTalks = Talk::where('user_id',$user->id)->get();
        return ["success"=>true,"data"=>$myTalks];
      }else{
        return response()->json(["success"=>false,"data"=>"Feature only available for investigators."]);
      }
    }
}
