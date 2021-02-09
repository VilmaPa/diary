@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">KURSŲ SĄRAŠAS</div>

               <div class="card-body">
                 @foreach ($lectures as $lecture)
  {{$lecture->name}}   
  <a style="float:right;" class="btn btn-info btn-sm" href="{{route('lecture.edit',[$lecture])}}">KEISTI</a>
  <form style="float:right;" method="POST" action="{{route('lecture.destroy', [$lecture])}}">
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


