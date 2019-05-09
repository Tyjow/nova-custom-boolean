<?php

namespace Tyjow\NovaCustomBoolean;

use Laravel\Nova\Fields\Boolean;

class CustomBoolean extends Boolean
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-custom-boolean';

    /**
     * The label to be used when the field is "true".
     *
     * @var bool
     */
    public $trueLabel = 'Yes';

    /**
     * The label to be used when the field is "false".
     *
     * @var bool
     */
    public $falseLabel = 'No';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|callable|null  $attribute
     * @param  callable|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
    }

    /**
     * Specify the options labels to store for the field.
     *
     * @param  mixed  $trueLabel
     * @param  mixed  $falseLabel
     * @return $this
     */
    public function labels($trueLabel, $falseLabel)
    {
        return $this->withMeta(['labels' => [__($falseLabel), __($trueLabel)]]);
    }

    /**
     * Enable or disable colored labels.
     */
    public function colorLabels()
    {
        return $this->withMeta(['colorLabels' => true]);
    }
}
