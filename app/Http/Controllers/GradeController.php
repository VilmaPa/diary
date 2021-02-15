<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Student;
use Validator;

class GradeController extends Controller
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
       $grades = Grade::all();
       return view('grade.index', ['grades' => $grades]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $lectures = Lecture::all();
        return view('grade.create', ['students' => $students, 'lectures' => $lectures]);

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
            'grade_grade' => ['required'],
            'lecture_id' => ['required', 'integer', 'min:1'],
            'student_id' => ['required', 'integer', 'min:1'],
        ],
        [
            'grade_grade.required' => 'Įveskite įvertinimą.',
            'lecture_id.min' => 'Pasirinkite kursą.',
            'student_id.min' => 'Pasirinkite studentą.',
        ]
        );
      
        if ($validator->fails()) {
            //reikalinga, kad neistrintu formoje teisingai suvestu duomenu
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

       $grade = new Grade;
       $grade->grade = $request->grade_grade;
       $grade->lecture_id = $request->lecture_id;
       $grade->student_id = $request->student_id;
       $grade->save();
       return redirect()->route('grade.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $students = Student::all();
        $lectures = Lecture::all();
        return view('grade.edit', ['grade' => $grade, 'students' => $students, 'lectures' => $lectures]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $validator = Validator::make($request->all(),
        [
            'grade_grade' => ['required'],
            'lecture_id' => ['required','integer', 'min:1'],
            'student_id' => ['required','integer', 'min:1'],
        ],
        [
            'grade_grade.required' => 'Įveskite įvertinimą.',
            'lecture_id.min' => 'Pasirinkite kursą.',
            'student_id.min' => 'Pasirinkite studentą.',
        ]
        );
      
        if ($validator->fails()) {
            //reikalinga, kad neistrintu formoje teisingai suvestu duomenu
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

       $grade->grade = $request->grade_grade;
       $grade->lecture_id = $request->lecture_id;
       $grade->student_id = $request->student_id;
       $grade->save();
       return redirect()->route('grade.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grade.index')->with('success_message', 'Sekmingai ištrintas.');
 
    }
}
