@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">KURSO REDAGAVIMAS</div>

               <div class="card-body">
                 <form method="POST" action="{{route('lecture.update',[$lecture])}}">
   Pavadinimas: <input type="text" name="lecture_name" value="{{old('lecture_name', $lecture->name)}}">
   Aprašymas: <textarea name="lecture_description" id="summernote">{{old('lecture_description', $lecture->description)}}</textarea>
   @csrf
   <button type="submit">KEISTI</button>
</form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>
@endsection



