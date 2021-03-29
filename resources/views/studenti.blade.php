@extends('layouts.old-app')

@section('title', 'Studenti me id='.$studenti->getId())

@section("sidebar")
    @parent
    Subs sidebar
@endsection

@section('content')
    <table border="1">
        @component('components.tablerow')
            @slot('rowColor', 'red')
            @slot('attributeName','ID')
            @slot('value', $studenti->getId())
        @endcomponent
        @component('components.tablerow')
            @slot('rowColor', 'green')
            @slot('attributeName','Full Name')
            @slot('value', $studenti->getFullName())
        @endcomponent
        @component('components.tablerow')
            @slot('rowColor', 'green')
            @slot('attributeName','Profile Picture')
            @slot('value')
                    @if($studenti->getProfilePicture() != null)
                        <img width=100
                             src='{{url(str_replace("public/", 'storage/', $studenti->getProfilePicture()))}}'>
                    @else
                        <form method="POST" enctype="multipart/form-data" action="{{route('add.profile.picture', $studenti->getId())}}">
                            @method('PUT')
                            @csrf
                            <input type="file" name="profile_picture"><br>
                            <button>Add Profile Picture</button>
                        </form>
                    @endif
            @endslot
        @endcomponent
        @component('components.tablerow')
            @slot('rowColor', 'blue')
            @slot('attributeName', "Birthdate")
            @slot('value', $studenti->getBirthdate())
        @endcomponent
        @component('components.tablerow')
            @slot('attributeName', 'Gender')
            @slot('value', $studenti->getGender())
        @endcomponent
        @component('components.tablerow')
            @slot('attributeName', 'Actions')
            @slot('value')
                <form onsubmit="return confirm('Are your sure to delete this student?');"
                      method="POST" action="{{route('delete.student', $studenti->getId())}}">
                    @method('DELETE')
                    @csrf
                    <button>DELETE</button>
                </form>
            @endslot
        @endcomponent
    </table>
@endsection

