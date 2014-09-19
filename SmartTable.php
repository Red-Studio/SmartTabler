<?php
/**
 * Created by Dmitry Kmita
 */

namespace core;

require_once("class/Tabler.php");
require_once("model/tableUnit.php");

use library\Tabler;

class SmartTable {

    /**
     * @var Tabler $tabler
     */
    private $tabler;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tabler = new Tabler();
    }

    /**
     * Preparing the table with parameters
     *
     * @param $parameters
     * @throws \Exception
     */
    public function setParameters($parameters)
    {
        $this->tabler->setParameters($parameters);
    }

    /**
     * Renders the table
     *
     * @return string
     */
    public function render()
    {
        return $this->tabler->render();
    }

    /**
     * Setting data for the table
     *
     * @param $data
     */
    public function setData($data)
    {
        if (isset($data["headers"])) {
            $this->tabler->setHeaders($data["headers"]);
        }
        if (isset($data["body"])) {
            $this->tabler->setBody($data["body"]);
        }
    }
} 