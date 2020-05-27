@php
use Sdkconsultoria\Base\Widgets\Grid\GridView;
use Sdkconsultoria\Base\Widgets\Information\BreadCrumb;
use Sdkconsultoria\Base\Widgets\Messages\Alert;
@endphp
@extends('base::layouts.main')

@section('title_tab', __('attributes.user.items'))

@section('breadcrumb')
    <?= BreadCrumb::generate([
        'Active'    => __('attributes.user.items'),
        ]) ?>
@endsection

@section('content')
    @card({{__('attributes.user.items')}})
    <div class="form-group">
        <a href="{{route('user.create')}}" class="btn btn-primary"> @lang('attributes.user.create') </a>
    </div>
    <?= Alert::generate() ?>
    <?= GridView::generate([
        'model' => $model,
        'models' => $models,
        'route' => 'user',
        'key' => 'seoname',
        'attributes' => [
            'name',
            'full_name',
            'email',
            'created_at',
            'status',
            [
                'label' => 'Roles',
                'value' => function($model){
                    $roles = '';
                    foreach ($model->roles as $key => $role) {
                        $roles .= $role->name .', ';
                    }
                    $roles = substr($roles, 0, -2);
                    return $roles;
                }
            ]
        ]
    ])?>
    @endcard
@endsection
