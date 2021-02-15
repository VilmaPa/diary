<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Lecture;
use Validator;

class StudentController extends Controller
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
        $students = Student::orderBy('surname')->get();  //2uzd.surušiuota pagal pavardes
        return view('student.index', ['students' => $students]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
            'student_name' => ['required', 'min:3', 'max:64'],
            'student_surname' => ['required', 'min:3', 'max:64'],
            'student_email' => ['required'],
            'student_phone' => ['required'],
        ],
        [
            'student_name.required' => 'Įveskite studento vardą.',
            'student_name.min' => 'Vardas turi būti ilgesnis nei 3 simboliai.',
            'student_name.max' => 'Vardas turi būti trumpesnis nei 64 simboliai.',
            'student_surname.required' => 'Įveskite studento pavardę.',
            'student_surname.min' => 'Pavardė turi būti ilgesnis nei 3 simboliai.',
            'student_surname.max' => 'Pavardė turi būti trumpesnis nei 64 simboliai.',
            'student_email.required' => 'Įveskite e-pašto adresą.',
            'student_phone.required' => 'Įveskite telefono numerį.',
                    ]
        );
      
        if ($validator->fails()) {
            //reikalinga, kad neistrintu formoje teisingai suvestu duomenu
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $student = new Student;

        if ($request->has('student_portret')) {
            //Get image file
            $image = $request->file('student_portret');
            //Make a image name based on user name and current timestamp + file extension
            $imageName = $request->student_name.'-'.time().'.'.$image->getClientOriginalExtension();
            //Define folder path
            $path = public_path() . '/' . 'portrets' . '/';
            //Make a file path where image will be stored [ fo;der path + file name]
            $image->move($path, $imageName);

            $student->photo = $imageName;
        }

       
        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->email = $request->student_email;
        $student->phone = $request->student_phone;
        $student->save();
        return redirect()->route('student.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
        $grades = Grade::where('student_id', $student->id)->get();
        $lectures = Lecture::all();
        return view('student.show', ['student' => $student, 'lectures' => $lectures, 'grades' => $grades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', ['student' => $student]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(),
        [
            'student_name' => ['required', 'min:3', 'max:64'],
            'student_surname' => ['required', 'min:3', 'max:64'],
            'student_email' => ['required'],
            'student_phone' => ['required'],
        ],
        [
            'student_name.required' => 'Įveskite studento vardą.',
            'student_name.min' => 'Vardas turi būti ilgesnis nei 3 simboliai.',
            'student_name.max' => 'Vardas turi būti trumpesnis nei 64 simboliai.',
            'student_surname.required' => 'Įveskite studento pavardę.',
            'student_surname.min' => 'Pavardė turi būti ilgesnis nei 3 simboliai.',
            'student_surname.max' => 'Pavardė turi būti trumpesnis nei 64 simboliai.',
            'student_email.required' => 'Įveskite e-pašto adresą.',
            'student_phone.required' => 'Įveskite telefono numerį.',
                    ]
        );
      
        if ($validator->fails()) {
            //reikalinga, kad neistrintu formoje teisingai suvestu duomenu
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        if ($request->has('student_portret')) {
            //Get image file
            $image = $request->file('student_portret');

            if($student->photo) {
                unlink(public_path() . '/' . 'portrets' . '/'.$student->photo);
            }
         
            
            //Make a image name based on user name and current timestamp + file extension
            $imageName = $request->student_name.'-'.time().'.'.$image->getClientOriginalExtension();
            //Define folder path
            $path = public_path() . '/' . 'portrets' . '/';
            //Make a file path where image will be stored [ fo;der path + file name]
            $image->move($path, $imageName);

            $student->photo = $imageName;
        }
      
        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->email = $request->student_email;
        $student->phone = $request->student_phone;
        $student->save();
        return redirect()->route('student.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student->studentGrades->count()){
            return 'Trinti negalima, nes turi įvertinimų.';
        }
        if($student->photo) {
            unlink(public_path() . '/' . 'portrets' . '/'.$student->photo);
        }
 
        $student->delete();
        return redirect()->route('student.index')->with('success_message', 'Sekmingai ištrintas.');
 
    }
}
