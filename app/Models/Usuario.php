<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Usuario extends Model
{
    
	public $table = "usuarios";
    

	public $fillable = [
	    "rut",
		"nombre",
		"apellido",
		"correo",
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
		"correo" => "string",
		"password" => "string"
    ];

	public static $rules = [
	    "rut" => "required",
		"nombre" => "required",
		"apellido" => "required",
		"correo" => "required",
		"password" => "required"
	];

}
