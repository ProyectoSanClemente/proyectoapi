<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Cuenta extends Model
{
    
	public $table = "cuentas";
    

	public $fillable = [
		"id",
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
    	"id" => "integer",
		"zimbra_id" => "string",
		"zimbra_pass" => "string",
		"nube_id" => "string",
		"nube_pass" => "string"
    ];

	public static $rules = [
	    
	];
	public function usuario()
    {
        return $this->belongsTo('Usuario','rut');
    }

}