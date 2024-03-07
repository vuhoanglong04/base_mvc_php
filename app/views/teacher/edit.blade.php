@extends('layout.main')
@section('content')
@if(isset($_SESSION['success']) && isset($_GET['msg']))
<span style='color:green'>{{$_SESSION['success']}}</span>
@endif
@if(isset($_SESSION['errors']) && isset($_GET['msg']))
<ul>
    @foreach($_SESSION['errors'] as $value)
    <li style='color:red'>{{$value}}</li>
    @endforeach
</ul>
@endif
<br>
<form action="{{route('update-teacher/'.$teacher->id)}}" method="post">
    <label for="">Name</label> <br>
    <input type="text" name='name' value='{{$teacher->name}}'> <br>
    <label for="">Email</label> <br>
    <input type="text" name='email' value='{{$teacher->email}}'> <br>

    <label for="">Salary</label> <br>
    <input type="text" name='salary' value='{{$teacher->salary}}'> <br>
    <label for="">School</label> <br>
    <input type="text" name='school' value='{{$teacher->school}}'> <br>
    <input type="submit" name='edit'>
</form>
@endsection