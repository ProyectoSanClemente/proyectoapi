<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Model
{
    
	public $table = "usuarios";
    

	public $fillable = [
	    "rut",
		"nombre",
		"apellido",
		"email",
		"password"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "rut" => "integer",
		"nombre" => "string",
		"apellido" => "string",
		"email" => "string",
		"password" => "string"
    ];

	public static $rules = [
	    "rut" => "required",
		"nombre" => "required|alpha",
		"apellido" => "required|alpha",
		"email" => "required|email",
		"password" => ""
	];

	protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }
}
