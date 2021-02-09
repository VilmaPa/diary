@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">NAUJAS KURSAS</div>

               <div class="card-body">
                 <form method="POST" action="{{route('lecture.store')}}">
                 <div class="form-group">
                    <label>Pavadinimas</label>
                    <input type="text" class="form-control" name="lecture_name" value="{{old('lecture_name')}}">
                    <small class="form-text text-muted">Naujo kurso pavadinimas.</small>
                </div>
   
   Aprašymas <textarea name="lecture_description" id="summernote">{{old('lecture_description')}}</textarea>
   <small class="form-text text-muted">Naujo kurso aprašymas.</small>
   @csrf
   <button class="btn btn-info btn-sm" style="float:right;" type="submit">PRIDĖTI</button>
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


