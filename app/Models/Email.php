<?php namespace App\Models;

use Model;

class Cuenta extends Model
{
    

	public $fillable = [
	    "usuario_id",
		"zimbra_id",
		"zimbra_pass",
		"nube_id",
		"nube_pass"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "usuario_id" => "integer",
		"zimbra_id" => "string",
		"zimbra_pass" => "string",
		"nube_id" => "string",
		"nube_pass" => "string"
    ];

	public static $rules = [
	    
	];

}
