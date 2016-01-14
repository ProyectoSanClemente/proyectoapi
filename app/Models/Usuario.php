<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Usuario extends Model
{
    
	public $table = "usuarios";


	public $fillable = [
	    "rut",
		"nombre",
		"apellido",
		"email",
		"password",
		"imagen"
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

	public static $create_rules = [
	    "rut" => "required",
		"nombre" => "required|alpha",
		"apellido" => "required|alpha",
		"email" => "required|email",
		'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|min:3'
		
	];

		public static $update_rules = [
	    "rut" => "required",
		"nombre" => "required|alpha",
		"apellido" => "required|alpha",
		"email" => "required|email",
		'old_password'=>"min:3",
		'password' => 'required_with:old_password|min:3|confirmed',
        'password_confirmation' => 'min:3'	
	];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function cuenta()
    {
        return $this->hasOne('Cuenta','usuario_id');
    }
        public function impresora()
    {
        return $this->hasOne('Impresora','usuario_id');
    }

}
