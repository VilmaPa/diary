@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">STUDENTŲ SĄRAŠAS</div>
                    <div class="card-body">
                        <ul class="list-group" id="students-list">
                            @include('student.students_list')
                        <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

