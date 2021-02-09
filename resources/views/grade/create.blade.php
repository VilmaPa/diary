@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">NAUJAS ĮVERTINIMAS</div>

               <div class="card-body">
                 <form method="POST" action="{{route('grade.store')}}">
                 <div class="form-group">
                    <label>Naujas įvertinimas</label>
                    <input type="text" class="form-control" name="grade_grade" value="{{old('grade_grade')}}">
                    <small class="form-text text-muted">Naujas studentoįvertinimas.</small>
                </div>
   <select name="student_id">
<option value="0">Pasirinkite studentą</option>
       @foreach ($students as $student)
           <option value="{{$student->id}}">{{$student->name}} {{$student->surname}}</option>
       @endforeach
</select>
<select name="lecture_id">
<option value="0">Pasirinkite kursą</option>
       @foreach ($lectures as $lecture)
           <option value="{{$lecture->id}}">{{$lecture->name}}</option>
       @endforeach
</select>
   @csrf
   <button class="btn btn-info btn-sm" style="float:right;" type="submit">PRIDĖTI</button>
</form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
