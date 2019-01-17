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
        return ["success"=>true,"data"=>Question::with('user','talk','comments')->get()];
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
     * @param  String  text
     * @param  Integer  talk_id
     * @param  Boolean  enable_comments

     * @return App\Question
     */
    public function store(StoreQuestion $request)
    {
      $validated = $request->validated();
      $question = Question::create($validated);
      $user = auth()->user();
      if (!is_null($user)) {
        $question->user_id = $user->id;
        $question->save();
      }
      return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Question $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $questions)
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
    public function update(Request $request, Question $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $user = auth()->user();
        if ($user->id === $question->talk->user_id) {
          $question->delete();
          return response()->json(["success"=>true,"data"=>"Question deleted successfully."]);
        }else{
          return response()->json(["success"=>false, "data","Only the creator of the Talk can delete questions."],403);
        }
    }

    /**
     *Adds a vote to the specified resource
     * @param  integer  $id
     */

    public function voteUp($id){
        DB::transaction(function () {
          $question = Question::findOrFail($id);
          $question->upvotes = $question->upvotes + 1;
          $question->save();
          return ["success"=>true,"data"=>"Question voted up successfully."]
        });
    }

    /**
     *Removes a vote to the specified resource
     * @param  integer  $id
     */
    public function voteDown($id){
        DB::transaction(function () {
          $question = Question::findOrFail($id);
          $question->downvotes = $question->downvotes + 1;
          $question->save();
          return ["success"=>true,"data"=>"Question voted down successfully."]
        });
    }
}
