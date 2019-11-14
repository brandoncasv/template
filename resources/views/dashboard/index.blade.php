@php
use Sdkconsultoria\Base\Widgets\Grid\Details;
use Sdkconsultoria\Base\Widgets\Information\BreadCrumb;
@endphp
@extends('base::layouts.main')

@section('title_tab', __('base::messages.dashboard'))

@section('content')
    @card({{__('base::messages.dashboard')}})

    @endcard()
@endsection
