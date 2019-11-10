@php
use Sdkconsultoria\Base\Widgets\Information\BreadCrumb;
use Sdkconsultoria\Base\Widgets\Form\ActiveField;
use Sdkconsultoria\Base\Widgets\Messages\Error;
ActiveField::$rules = 'rulesUpdate';
@endphp

@extends('base::layouts.main')

@section('title_tab', __('attributes.user.edit'))

@section('breadcrumb')
    <?= BreadCrumb::generate([
        'user.index' => __('attributes.user.items'),
        'Active'    => __('attributes.user.edit'),
        ]) ?>
@endsection

@section('content')
    @card({{__('attributes.user.edit')}})
        <?= Error::generate($errors) ?>
        <form action="{{route('user.update', $model->name)}}" method="post">
            @csrf
            @method('PUT')
            @include('user._form')
        </form>
    @endcard()
@endsection
