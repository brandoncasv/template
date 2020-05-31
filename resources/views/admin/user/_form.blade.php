@php
use Sdkconsultoria\Base\Widgets\Form\ActiveField;
use Spatie\Permission\Models\Role;
$roles = Role::all();
ActiveField::$errors = $errors;
@endphp

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label><?=$model->getLabel('role')?></label>
            <select class="form-control" name="role">
                @foreach ($roles as $key => $role)
                    <option {{(($model->first_role??old('role'))==((int)$role->name))?'selected':''}} value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= ActiveField::Input($model, 'firstname')?>
    </div>
    <div class="col-md-4">
        <?= ActiveField::Input($model, 'lastname1')?>
    </div>
    <div class="col-md-4">
        <?= ActiveField::Input($model, 'lastname2')?>
    </div>
</div>
<?= ActiveField::Input($model, 'phone')?>
<?= ActiveField::Input($model, 'email')?>
<?= ActiveField::Input($model, 'password')->passwordInput()?>
<?= ActiveField::Input($model, 'password_confirmation')->passwordInput()?>


<div class="form-group">
    <button type="submit" class="btn btn-primary">@lang('base::messages.save')</button>
</div>
