@extends('errors::minimal')

@section('title', __('app.error.server-error'))
@section('code', '500')
@section('message', __('app.error.server-error'))
