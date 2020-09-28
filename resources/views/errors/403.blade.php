@extends('errors::minimal')

@section('title', __('app.error.forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'app.error.forbidden'))
