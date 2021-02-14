@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">NAUJAS STUDENTAS</div>

               <div class="card-body">
               {{-- enctype reikia jei paveikslelis bus --}}
                 <form method="POST" action="{{route('student.store')}}" enctype="multipart/form-data"> 
                 <div class="form-group">
                    <label>Vardas</label>
                    <input type="text" class="form-control" name="student_name" value="{{old('student_name')}}">
                    <small class="form-text text-muted">Studento vardas.</small>
                </div>
                <div class="form-group">
                    <label>Pavardė</label>
                    <input type="text" class="form-control" name="student_surname" value="{{old('student_surname')}}">
                    <small class="form-text text-muted">Studento pavardė.</small>
                </div>
                 <div class="form-group">
                    <label>E-paštas</label>
                    <input type="text" class="form-control" name="student_email" value="{{old('student_email')}}">
                    <small class="form-text text-muted">Studento e-paštas.</small>
                </div>
                <div class="form-group">
                    <label>Telefono numeris</label>
                    <input type="text" class="form-control" name="student_phone" value="{{old('student_phone')}}">
                    <small class="form-text text-muted">Studento tel.nr.</small>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="student_portret">
                    <small class="form-text text-muted">Studento nuotrauka.</small>
                </div>
   @csrf
   <button class="btn btn-info btn-sm" style="float:right;" type="submit">PRIDĖTI</button>
</form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection

