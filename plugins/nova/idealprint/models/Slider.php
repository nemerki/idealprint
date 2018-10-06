<?php namespace Nova\Idealprint\Models;

use Model;

/**
 * Model
 */
class Slider extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];



    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['content','btn_text'];


    /**
     * @var array Validation rules
     */
    public $rules = [
        'image' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nova_idealprint_sliders';

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}
