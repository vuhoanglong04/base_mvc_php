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
<form action="{{route('post-teacher')}}" method="post">
    <label for="">Name</label> <br>
    <input type="text" name='name'> <br>
    <label for="">Email</label> <br>
    <input type="text" name='email'> <br>

    <label for="">Salary</label> <br>
    <input type="text" name='salary'> <br>
    <label for="">School</label> <br>
    <input type="text" name='school'> <br>
    <input type="submit" name='add'>
</form>
@endsection