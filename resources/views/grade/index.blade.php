@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ĮVERTINIMŲ SĄRAŠAS</div>

               <div class="card-body">
                 @foreach ($grades as $grade)
  {{$grade->gradeLecture->name}} {{$grade->grade}} {{$grade->gradeStudent->name}} {{$grade->gradeStudent->surname}} 
  <a style="float:right;" class="btn btn-info btn-sm" href="{{route('grade.edit',[$grade])}}">KEISTI</a>
  <form style="float:right;" method="POST" action="{{route('grade.destroy', [$grade])}}">
   @csrf
   <button class="btn btn-danger btn-sm" type="submit">TRINTI</button>
  </form>
  <hr>
@endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


