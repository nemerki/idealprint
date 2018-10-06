<?php namespace Nova\Idealprint\Models;

use Model;

/**
 * Model
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sluggable;

    protected $dates = ['deleted_at'];


    /**
     * @var array Generate slugs for these attributes.
     */

    protected $slugs = ['slug' => 'title'];


    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['title','description','content'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'image' => 'required',
        'cartegory' => 'required',
        'brand' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nova_idealprint_products';

    public $attachOne = [
        'image' => 'System\Models\File',

    ];
    public $attachMany = [
        'gallery' => 'System\Models\File',

    ];

    public $belongsTo = [
        'brand' => ['Nova\Idealprint\Models\Brand'],
        'cartegory' => ['Nova\Idealprint\Models\Cartegory'],
        'field' => ['Nova\Idealprint\Models\Field'],
    ];

    public $belongsToMany = [
        'colors' => [
            'Nova\Idealprint\Models\Color',
            'table'=>'nova_idealprint_colors_products',
            'order'=>'name'
        ]
    ];



}
