@extends('emails.layouts.main')

@section('content')
    <h2>Tienes una nueva cita agendada</h2>

    <table>
        <tr>
            <th>Servicio</th>
            <td>{{$date->service->name}}</td>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>{{$client->full_name}}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{$client->email}}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{$client->phone}}</td>
        </tr>
        <tr>
            <th>Precio</th>
            <td>${{number_format($date->price, 2)}}</td>
        </tr>
        <tr>
            <th>Duración</th>
            <td>{{$date->duration}} mins</td>
        </tr>
        <tr>
            <th>Fecha programada</th>
            <td>{{$date->date}}</td>
        </tr>
    </table>
@endsection
