<?php

/**
 * Author: Hoang Ngo
 */
class IG_Active_Form
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function open($args = array())
    {
        echo IG_Form::open($args);
    }

    public function close()
    {
        echo IG_Form::close();
    }

    public function label($field, $args = array())
    {
        $args['for'] = $this->build_id($field);
        echo IG_Form::label($args);
    }

    public function hidden($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = $this->model->$field;
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::hidden($args);
    }

    public function text($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = $this->model->$field;
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::text($args);
    }

    public function password($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = $this->model->$field;
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::password($args);
    }

    public function text_area($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = $this->model->$field;
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::text_area($args);
    }

    public function email($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = $this->model->$field;
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::email($args);
    }

    public function file($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::file($args);
    }

    public function select($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);
        $selected = $this->model->$field;
        if (!is_array($selected)) {
            $selected = explode(',', $selected);
        }
        $args['selected'] = array_filter($selected);

        echo IG_Form::select($args);
    }

    public function radio($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = array($this->model->$field);
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::radio($args);
    }

    public function checkbox($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = array($this->model->$field);
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::checkbox($args);
    }

    public function number($field, $args = array())
    {
        $args['name'] = $this->build_name($field);
        $args['value'] = array($this->model->$field);
        $args['attributes']['id'] = isset($args['attributes']['id']) ? $args['attributes']['id'] : $this->build_id($field);

        echo IG_Form::number($args);
    }

    public function error($field)
    {
        echo $this->model->get_error($field);
    }

    private function build_name($attribute)
    {
        $class_name = get_class($this->model);
        return $class_name . "[$attribute]";
    }

    private function build_id($attribute)
    {
        $class_name = get_class($this->model);
        return sanitize_title($class_name . '-' . $attribute);
    }

}