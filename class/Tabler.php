<?php
/**
 * Created by Dmitry Kmita.
 */

namespace library;


use model\tableUnit;

class Tabler {

    /**
     * @var string $css
     */
    private $css = 'smart_tabler';

    /**
     * @var string $name
     */
    private $name = 'Default Table';

    /**
     * @var int $width
     */
    private $width;

    /**
     * @var bool $responsive
     */
    private $responsive = true;

    /**
     * @var array|null $headres
     */
    private $header = null;

    /**
     * @var array|null $body
     */
    private $body = null;

    /**
     * Sets if the table is responsive
     *
     * @param $responsive
     */
    public function setResponsive($responsive)
    {
        $this->responsive = (bool) $responsive;
    }

    /**
     * Table width setter
     *
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Table name setter
     *
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Sets the parameters for the future table
     *
     * @param $parameters
     * @throws \Exception
     */
    public function setParameters($parameters)
    {
        if (!is_array($parameters)) {
            throw new \Exception("Bad Request", 403);
        }
        foreach ($parameters as $parameterName => $parameterValue) {
            if (!property_exists($this, $parameterName)) {
                throw new \Exception("Bad Request: " . $parameterName . " parameter does not exist.", 403);
            }
            if (!method_exists($this, "set" . $parameterName)) {
                throw new \Exception("Bad Request: " . $parameterName . " parameter setter does not exist.", 403);
            }
            $method = 'set' . $parameterName;
            $this->$method($parameterValue);
        }
    }

    /**
     * Sets table main body
     *
     * @param $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Sets table header (TH)
     *
     * @param $header
     */
    public function setHeaders($header)
    {
        $this->header = $header;
    }

    /**
     * Renders table and returns the html for display
     *
     * @return string
     */
    public function render()
    {
        if ($this->width) {
            $startTable = "<table width='" . $this->width . "'>";
        } else {
            $startTable = '<table>';
        }

        $body = "";

        if ($this->header) {
            $body .= "<tr>";
            foreach ($this->header as $unit) {
                /**
                 * @var tableUnit $unit
                 */
                $body .= "<th>" . $unit->getValue() . "</th>";
            }
            $body .= "</tr>";
        }

        if ($this->body) {
            foreach ($this->body as $trunit) {
                /**
                 * @var tableUnit $trunit
                 * @var TableUnit $tdunit
                 */
                $body .= "<tr>";
                foreach ($trunit->getChildren() as $tdunit) {
                    $body .= "<td>" . $tdunit->getValue() . "</td>";
                }
                $body .= "<tr>";
            }
        }
        $endTable = "</table>";

        return $startTable . $body . $endTable;
    }

} 