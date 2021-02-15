 @foreach ($students as $student)
    <li class="list-group-item flex">
    <div style="float:left; display:float;">             
  {{$student->name}} {{$student->surname}}
  
  @if($student->photo)
  <img style="height:50px;" src="{{asset('portrets').'/'.$student->photo}}" alt="{{$student->name}}">
  @endif
  {{-- e-paštas: {{$student->email}} tel.nr.: {{$student->phone}} --}}
  </div>
  <div style="float:right;display:float;">
<a class="btn btn-info btn-sm" href="{{route('student.show',[$student])}}">DAUGIAU</a>
<a class="btn btn-info btn-sm" href="{{route('student.edit',[$student])}}">KEISTI</a>
<form method="POST" style="float:right; display:inline;" action="{{route('student.destroy', [$student])}}">
   @csrf
   <button type="submit" class="btn btn-danger btn-sm">TRINTI</button>
</form>
</div>
</li>
@endforeach