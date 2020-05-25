@extends('emails.layouts.main')

@section('content')
    <h2>Tienes un nuevo mensaje</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <td>{{$contact->name}}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{$contact->email}}</td>
        </tr>
        <tr>
            <th>Asunto</th>
            <td>{{$contact->subject}}</td>
        </tr>
        <tr>
            <th>Mensaje</th>
            <td>{{$contact->message}}</td>
        </tr>
    </table>
@endsection
