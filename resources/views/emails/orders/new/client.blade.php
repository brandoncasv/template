@extends('emails.layouts.main')

@section('content')
    <h2>Gracias por agendar con Crescere Life Coaching</h2>

    <table>
        <tr>
            <th>Servicio</th>
            <td>{{$date->service->name}}</td>
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
