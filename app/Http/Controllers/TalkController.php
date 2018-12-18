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
        return Talk::all();
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
      return $talk;
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
}
