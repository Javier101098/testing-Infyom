<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class autor
 * @package App\Models
 * @version February 23, 2021, 2:56 am UTC
 *
 * @property string $nombre
 * @property string $correo
 */
class autor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'autors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'correo' => 'required|email'
    ];

    
}
