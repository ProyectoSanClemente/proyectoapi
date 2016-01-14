<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Impresora extends Model
{
    
	public $table = "impresoras";
    

	public $fillable = [
        "id",
		"modelo_impresora"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"modelo_impresora" => "string"
    ];

	public static $rules = [
		"modelo_impresora" => "required"
	];

	 public function usuario()
    {
        return $this->belongsTo('Usuario','rut');
    }

}
/*$impresora = Impresora::find(1);*/
