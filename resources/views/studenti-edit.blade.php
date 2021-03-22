@extends('layouts.app')

@section('title', "Edit Student")

@section("sidebar")
    @parent
@endsection

@section('content')
    <form method="post" action="{{route('post.edit.student')}}" enctype="multipart/form-data">
        @csrf
        <label>First Name:</label><br>
        <input name="first_name" type="text"><br>
        <label>Last Name:</label><br>
        <input name="last_name" type="text"><br>
        <label>Gender:</label><br>
        <select name="gender">
            <option value="M">M</option>
            <option value="F">F</option>
        </select><br>
        <label>Birthdate:</label><br>
        <input name="birthdate" type="date"><br>
        <label>Profile Picture:</label><br>
        <input type="file" name="profile_picture" /><br><br>
        <input type="submit"/>
    </form>
@endsection

