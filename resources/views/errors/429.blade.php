@extends('errors::minimal')

@section('title', __('app.error.too-many-requests'))
@section('code', '429')
@section('message', __('app.error.too-many-requests'))
