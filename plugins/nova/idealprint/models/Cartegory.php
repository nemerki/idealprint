<?php namespace Nova\Idealprint\Models;

use Model;

/**
 * Model
 */
class Cartegory extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    use \October\Rain\Database\Traits\Sluggable;

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */

    /**
     * @var array Generate slugs for these attributes.
     */

    protected $slugs = ['slug' => 'name'];

    public $rules = [
        'name' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nova_idealprint_categories';

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['name'];

    public $belongsToMany = [
        'groups' => [
            'Nova\Idealprint\Models\Group',
            'table' => 'nova_idealprint_categories_groups',
            'order' => 'name'
        ]
    ];

    public $hasMany = [
        'products' => ['Nova\Idealprint\Models\Product', 'key' => 'cartegory_id', 'softDelete' => true],
        'homeProducts' => ['Nova\Idealprint\Models\Product',
            'order' => 'created_at desc',
            'conditions' => 'is_active = 1',
            'key' => 'cartegory_id',
             ],
    ];


}
