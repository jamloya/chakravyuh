<?php

namespace App\Http\Controllers;

use App\questions;
use App\hints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $question=DB::table('questions')->get();
        $hints=DB::table('hints')->get();
        return view('/viewquestions',['question'=>$question,'hints'=>$hints]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $question=$request->file('question');
        $extension=$question->getClientOriginalExtension();
        Storage::disk('public')->put($question->getFilename().'.'.$extension,File::get($question));
        $newquestion=new questions();
        $newquestion->questionno=$request->questionnumber;
        $newquestion->mime=$question->getClientMimeType();
        $newquestion->original_filename=$question->getClientOriginalName();
        $newquestion->filename=$question->getFileName().'.'.$extension;
        $newquestion->save();
        foreach($request->hints as $hintinc)
        {
            $hint=new hints();
            $hint->questionno=$request->questionnumber;
            $hint->hint=$hintinc;
            $hint->save();
        }

        return redirect('addquestions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(questions $questions)
    {
        //
    }
}
