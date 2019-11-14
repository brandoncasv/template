@php
use Sdkconsultoria\Base\Widgets\Grid\Details;
use Sdkconsultoria\Base\Widgets\Information\BreadCrumb;
@endphp
@extends('base::layouts.main')

@section('title_tab', __('attributes.user.my-profile'))

@section('breadcrumb')
    <?= BreadCrumb::generate([
        'Active'    => __('attributes.user.my-profile'),
        ]) ?>
@endsection

@section('content')
    @card({{__('attributes.user.my-profile')}})

    @endcard()
@endsection
