<html>
<body>
@foreach($question as $ques)
<div style="border-width:1px;">
<img  src="{{url('uploads/'.$ques->filename)}}" alt="{{$ques->filename}}" width="500px" height="300px;">
<br><br>
@foreach($hints as $hint)
@if($hint->questionno==$ques->questionno)
    <input type="text" value="{{$hint->hint}}" readonly><br><br>
@endif
@endforeach
</div>
@endforeach
</body>
</html>
