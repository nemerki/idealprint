<?php namespace Nova\Idealprint\Models;

use Model;

/**
 * Model
 */
class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sluggable;

    protected $dates = ['deleted_at'];

    protected $slugs = ['slug' => 'title'];

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['title','description','content','slug'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nova_idealprint_news';

    public $attachOne = [
        'image' => 'System\Models\File',

    ];
}
