<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use Validator;

class LectureController extends Controller
{
    //REIKALINGAS, KAD NEILEISTU NEPRISILOGINUSIO
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::orderBy('name')->get(); //2užd.surušiuota pagal pavadinimą
        return view('lecture.index', ['lectures' => $lectures]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'lecture_name' => ['required', 'min:3', 'max:64'],
            'lecture_description' => ['required'],
        ],
        [
            'lecture_name.required' => 'Įveskite kurso pavadinimą.',
            'lecture_name.min' => 'Kurso pavadinimas turi būti ilgesnis nei 3 simboliai.',
            'lecture_name.max' => 'Kurso pavadinimas turi būti trumpesnis nei 64 simboliai.',
            'lecture_description.required' => 'Įveskite kurso aprašymą.',
                    ]
        );
      
        if ($validator->fails()) {
            //reikalinga, kad neistrintu formoje teisingai suvestu duomenu
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
       $lecture = new Lecture;
       $lecture->name = $request->lecture_name;
       $lecture->description = $request->lecture_description;
       $lecture->save();
       return redirect()->route('lecture.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('lecture.edit', ['lecture' => $lecture]);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $validator = Validator::make($request->all(),
        [
            'lecture_name' => ['required', 'min:3', 'max:64'],
            'lecture_description' => ['required'],
        ],
        [
            'lecture_name.required' => 'Įveskite kurso pavadinimą.',
            'lecture_name.min' => 'Kurso pavadinimas turi būti ilgesnis nei 3 simboliai.',
            'lecture_name.max' => 'Kurso pavadinimas turi būti trumpesnis nei 64 simboliai.',
            'lecture_description.required' => 'Įveskite kurso aprašymą.',
                    ]
        );
      
        if ($validator->fails()) {
            //reikalinga, kad neistrintu formoje teisingai suvestu duomenu
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $lecture->name = $request->lecture_name;
        $lecture->description = $request->lecture_description;
        $lecture->save();
        return redirect()->route('lecture.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        if($lecture->lectureGrades->count()){
            return 'Trinti negalima, nes turi įvertinimų';
        }
 
        $lecture->delete();
        return redirect()->route('lecture.index')->with('success_message', 'Sekmingai ištrintas.');
 
    }
}
