<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Impresora extends Model
{
    
	public $table = "impresoras";
    

	public $fillable = [
	    "id_usuario",
		"modelo_impresora"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_usuario" => "integer",
		"modelo_impresora" => "string"
    ];

	public static $rules = [
	    "id_usuario" => "required",
		"modelo_impresora" => "required"
	];

}
