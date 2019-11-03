@extends('layouts.master')
@section('content')

<div style="margin:10% 0 0 50%">
<form method="post" action="addquestions" ID="questionform"  enctype="multipart/form-data">
{{ csrf_field() }}
<input type="text" name="questionnumber">
<input type="file" name="question" accept="image/*">
<br><br>
<input type="button" onClick="addHints()" value="Add a Hint"><br><br>
<input type="submit"  value="Add Question"><br><br>
</form>
</div>
@endsection
