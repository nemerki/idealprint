<?php namespace Nova\Idealprint\Models;

use Model;

/**
 * Model
 */
class Group extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    use \October\Rain\Database\Traits\Sluggable;

    protected $dates = ['deleted_at'];


    /**
     * @var array Generate slugs for these attributes.
     */

    protected $slugs = ['slug' => 'name'];


    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['name'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nova_idealprint_groups';

    public $belongsToMany = [
        'categories' => [
            'Nova\Idealprint\Models\Cartegory',
            'table'=>'nova_idealprint_categories_groups',
            'order'=>'name'
        ]
    ];
}
