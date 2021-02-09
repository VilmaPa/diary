@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">STUDENTO REDAGAVIMAS</div>

               <div class="card-body">
                 <form method="POST" action="{{route('student.update',[$student->id])}}">
   Vardas: <input type="text" name="student_name" value="{{old('student_name', $student->name)}}">
   Pavardė: <input type="text" name="student_surname" value="{{old('student_surname', $student->surname)}}">
   E-paštas: <input type="text" name="student_email" value="{{old('student_email', $student->email)}}">
   Tel.nr.: <input type="text" name="student_phone" value="{{old('student_phone', $student->phone)}}">
   @csrf
   <button type="submit">KEISTI</button>
</form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection

