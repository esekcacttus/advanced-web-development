@extends('layouts.app')

@section('title', 'Studenti me id='.$studenti->getId())

@section("sidebar")
    @parent
    Subs sidebar
@endsection

@section('content')
    <table>
        @component('components.tablerow')
            @slot('attributeName','ID')
            @slot('value', $studenti->getId())
        @endcomponent
        @component('components.tablerow')
            @slot('attributeName','Full Name')
            @slot('value', $studenti->getFullName())
        @endcomponent
        <tr>
            <th>Birthdate:</th>
            <td>{{$studenti->getBirthdate()}}</td>
        </tr>
        <tr>
            <th>Gender:</th>
            <td>{{$studenti->getGender()}}</td>
        </tr>
    </table>
@endsection

