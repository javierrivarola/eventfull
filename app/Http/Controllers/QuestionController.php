<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all();
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
    public function store(StoreQuestion $request)
    {
      $validated = $request->validated();
      $question = Question::create($validated);
      return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(Questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions $questions)
    {
        //
    }

    /**
     *Adds a vote to the specified resource
     * @param  integer  $id
     */

    public function voteUp($id){
      try {
        DB::transaction(function () {
          $question = Question::findOrFail($id);
          $question->upvotes = $question->upvotes + 1;
          $question->save();
        });
      }catch(ModelNotFoundException $e) {

      }
    }

    /**
     *Removes a vote to the specified resource
     * @param  integer  $id
     */
    public function voteDown($id){
      try {
        DB::transaction(function () {
          $question = Question::findOrFail($id);
          $question->downvotes = $question->downvotes + 1;
          $question->save();
        });
      }catch(ModelNotFoundException $e) {

      }
    }
}
