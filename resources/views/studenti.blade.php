@extends('layouts.app')

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
            @slot('rowColor', 'blue')
            @slot('attributeName', "Birthdate")
            @slot('value', $studenti->getBirthdate())
        @endcomponent
        @component('components.tablerow')
            @slot('attributeName', 'Gender')
            @slot('value', $studenti->getGender())
        @endcomponent
    </table>
@endsection

