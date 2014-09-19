<?php
/**
 * Created by Dmitry Kmita
 */

namespace core;

use library\Tabler;

class SmartTable {

    private $css = 'smart_tabler';

    public function __construct()
    {
        $tabler = new Tabler();
    }

    public function setParameters($parameters)
    {
        if (!is_array($parameters)) {
            return new \Exception("Bad Request", 403);
        }
        foreach ($parameters as $parameterName => $parameterValue) {
            if (!property_exists($this, $parameterName)) {
                return new \Exception("Bad Request: " . $parameterName . "parameter does not exist.", 403);
            }
            if (!method_exists ($this, "set" . $parameterName)) {
                return new \Exception("Bad Request: " . $parameterName . "parameter setter does not exist.", 403);
            }
            $method = 'set' . $parameterName;
            $this->$method($parameterValue);
        }
    }
} 