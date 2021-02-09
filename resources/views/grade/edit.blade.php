@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ĮVERTINIMO KEITIMAS</div>

               <div class="card-body">
                 <form method="POST" action="{{route('grade.update',[$grade])}}">
    Įvertinimas: <input type="text" name="grade_grade" value="{{old('grade_grade',$grade->grade)}}">
    <select name="student_id">
           @foreach ($students as $student)
               <option value="{{$student->id}}" @if($student->id == $grade->student_id) selected @endif>
                   {{$student->name}} {{$student->surname}}
               </option>
           @endforeach
    </select>
    <select name="lecture_id">
           @foreach ($lectures as $lecture)
               <option value="{{$lecture->id}}" @if($lecture->id == $grade->lecture_id) selected @endif>
                   {{$lecture->name}}
               </option>
           @endforeach
    </select>
       @csrf
       <button type="submit">KEISTI</button>
</form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


