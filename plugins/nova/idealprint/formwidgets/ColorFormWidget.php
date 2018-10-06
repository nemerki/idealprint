<?php namespace Nova\Idealprint\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Nova\Idealprint\Models\Color;

/**
 * ColorFormWidget Form Widget
 */
class ColorFormWidget extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'nova_idealprint_color_form_widget';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('colorformwidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName() . '[]';
        $this->vars['model'] = $this->model;
        $this->vars['colors'] = Color::where("is_active", "1")->lists('name', 'id');
        if (!empty($this->getLoadValue())) {
            $this->vars['value'] = $this->getLoadValue();
        } else {
            $this->vars['value'] = [];
        }
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/colorformwidget.css', 'Nova.Idealprint');
        $this->addJs('js/colorformwidget.js', 'Nova.Idealprint');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
