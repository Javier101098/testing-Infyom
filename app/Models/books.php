<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class books
 * @package App\Models
 * @version February 23, 2021, 2:30 am UTC
 *
 * @property string $name
 * @property string $email
 * @property integer $publication
 */
class books extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'books';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'publication'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'publication' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'email'
    ];

    
}
