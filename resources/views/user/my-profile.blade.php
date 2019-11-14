@php
use Sdkconsultoria\Base\Widgets\Grid\Details;
use Sdkconsultoria\Base\Widgets\Information\BreadCrumb;
use Sdkconsultoria\Base\Widgets\Form\ActiveField;
use Sdkconsultoria\Base\Widgets\Messages\Error;

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
    <?= Error::generate($errors) ?>
    <form action="{{route('user.store')}}" method="post" novalidate>
        <div class="row">
            <div class="col-md-8">
                <?= ActiveField::Input($model, 'name')?>
                <?= ActiveField::Input($model, 'first_name')?>
                <?= ActiveField::Input($model, 'last_name')?>
                <?= ActiveField::Input($model, 'description')->textArea(['class' => 'form-control'])?>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <img class="img-fluid rounded-circle width-300" src="{{asset('images/profile.png')}}" alt="">
                </div>
                <button type="button" class="btn btn-outline-info btn-block"><i class="ft-upload"></i> {{ __('attributes.user.change_image') }}</button>
                <button type="button" class="btn btn-outline-danger btn-block"><i class="ft-trash-2"></i> {{ __('attributes.user.delete_image') }}</button>
                <br>
                <?= ActiveField::Input($model, 'password')->passwordInput()?>
                <?= ActiveField::Input($model, 'password_confirmation')->passwordInput()?>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">@lang('base::messages.save')</button>
        </div>
    </form>
    @endcard()
@endsection
