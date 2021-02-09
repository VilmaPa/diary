@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">STUDENTŲ SĄRAŠAS</div>

               <div class="card-body">
                 @foreach ($students as $student)
  {{$student->name}} {{$student->surname}} e-paštas: {{$student->email}} tel.nr.: {{$student->phone}}<br>
<a class="btn btn-info btn-sm" href="{{route('student.show',[$student])}}">DAUGIAU</a>
<a class="btn btn-info btn-sm" href="{{route('student.edit',[$student])}}">KEISTI</a>
<form method="POST" style="float:right;" action="{{route('student.destroy', [$student])}}">
   @csrf
   <button type="submit" class="btn btn-danger btn-sm">TRINTI</button>
</form>
<hr>
@endforeach

               </div>
           </div>
       </div>
   </div>
</div>
@endsection

