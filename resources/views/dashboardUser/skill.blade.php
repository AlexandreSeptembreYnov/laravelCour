@extends('layouts.app')

@section('content')

    <table>
        <thead>
        <tr>
            <td>nom</td>
            <td>prenom</td>
            <td>competences</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                @foreach($user->skills as $skill)
                    <td>{{ $skill->name }}</td>
                    @endforeach
            </tr>
                @endforeach

        </tbody>
    </table>
