<?php namespace Nova\Idealprint\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Nova\Idealprint\Models\Group;

/**
 * GroupFormWidget Form Widget
 */
class GroupFormWidget extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'nova_idealprint_group_form_widget';

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
        return $this->makePartial('groupformwidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName() . '[]';

        $this->vars['model'] = $this->model;
        $this->vars['groups'] = Group::where("is_active", "1")->lists('name', 'id');
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
        $this->addCss('css/groupformwidget.css', 'Nova.Idealprint');
        $this->addJs('js/groupformwidget.js', 'Nova.Idealprint');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
