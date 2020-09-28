@extends('errors::minimal')

@section('title', __('app.error.unauthorized'))
@section('code', '401')
@section('message', __('app.error.unauthorized'))
