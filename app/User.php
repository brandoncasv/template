<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Sdkconsultoria\Base\Traits\TraitModel;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use TraitModel;

    const STATUS_DELETE   = 5;
    const STATUS_CREATE   = 10;
    const STATUS_INACTIVE = 15;
    const STATUS_ACTIVE   = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'social_login', 'social_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules($params)
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users,email|max:255',
            'password'  => 'required|string|min:6|confirmed',
        ];
    }

/**
     * Get the validation rules that apply to the request in update.
     *
     * @return array
     */
    public static function rulesUpdate($params)
    {
        $validate = Self::rules($params);
        unset($validate['email']);
        unset($validate['password']);
        $validate['password'] = 'nullable|string|min:6|confirmed';
        $validate['email'] = ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($params['user_id']??'0'), 'max:255'];
        return $validate;
    }

    /**
     * Obtiene los atributos por lo que se puede buscar
     */
    public function getFiltersAttribute()
    {
        return [
            'status' => [
                'type' => 'dropdown',
                'options' => $this->getStatus()
            ]
        ];
    }

    /**
     * Get default client attributes values.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'created_at'            => __('base::attributes.created_at'),
            'updated_at'            => __('base::attributes.updated_at'),
            'created_by'            => __('base::attributes.created_by'),
            'status'                => __('base::attributes.status'),
            'name'                  => __('attributes.user.name'),
            'email'                 => __('attributes.user.email'),
            'password'              => __('attributes.user.password'),
            'password_confirmation' => __('attributes.user.password_confirmation'),
        ];
    }

    /**
     * Guarda un modelo pero antes encrypta la contraseña si es necesario.
     */
    public function save(array $options = [])
    {
        if (empty($this->id) or $this->isDirty('password')) {
            $this->password = bcrypt($this->password);
        }
        parent::save($options);
    }

    /**
     * Devuelve el usuario que creo el elemento
     * @return [type] [description]
     */
    public function createdBy()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    /**
     * Devuelve el ultimo usuario que modifico este elemento
     * @return [type] [description]
     */
    public function updatedBy()
    {
        return $this->hasOne('App\User', 'id', 'updated_by');
    }
}
