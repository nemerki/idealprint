<?php namespace Nova\Idealprint\Models;

use Model;

/**
 * Model
 */
class Color extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'color_code' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nova_idealprint_colors';

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['name'];

    public $belongsToMany = [
        'products' => [
            'Nova\Idealprint\Models\Product',
            'table'=>'nova_idealprint_colors_products',
            'order'=>'name'
        ]
    ];
}
