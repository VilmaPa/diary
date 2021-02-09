@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">STUDENTO ĮVERTINIMAI</div>
               <div class="card-body">
    <div style="font-size: 15px;font-weight:bold;">           
  {{$student->name}} {{$student->surname}}
  </div> 
  <div>   
    tel.nr.: {{$student->phone}}
    </div> 
    <div>   
    E-paštas: {{$student->email}}
    </div>   
    <ul class="list-group">
    <li class="list-group-item">
    <div style="float:left;font-weight:bold;">
    Kursas
    </div>
    <div style="float:right;font-weight:bold;">
    Įvertinimas
    </div>
    </li>
    @foreach ($grades as $grade)
    <li class="list-group-item">
        <div style="float:left;">
            {{$grade->gradeLecture->name}}
        </div>
        <div style="float:right;">    
             {{$grade->grade}} 
        </div>
    </li>    
    @endforeach
    </ul>
    <br>
<form method="GET" action="{{route('student.index')}}">
    <button style="float:right;" class="btn btn-info" type="submit">GRĮŽTI</button>
</form>
{{-- <a href="{{route('student.show',[$student])}}">DAUGIAU</a>
<a href="{{route('student.edit',[$student])}}">KEISTI</a>
<form method="POST" action="{{route('student.destroy', [$student])}}">
   @csrf
   <button type="submit">TRINTI</button>
</form> --}}

<br>


               </div>
           </div>
       </div>
   </div>
</div>
@endsection

