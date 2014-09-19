<?php
/**
 * Created by Dmitry Kmita.
 */

namespace model;


class tableUnit {

    const TYPE_HEADER = 'header';
    const TYPE_TR = 'tr';
    const TYPE_TD = 'td';

    /**
     * @var string $type;
     */
    private $type;

    /**
     * @var string $value
     */
    private $value;

    /**
     * @var array $children
     */
    private $children;

    /**
     * Constructor
     *
     * @param $type
     * @param $value
     * @param array|null $children
     */
    public function __construct($type, $value, $children = null)
    {
        $this->type = $type;
        $this->value = $value;
        if ($type == self::TYPE_TR) {
            $this->children = $children;
        }
    }

    /**
     * Gets type of table unit
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns TR children
     *
     * @return array|null
     */
    public function getChildren()
    {
        if ($this->type === self::TYPE_TR) {
            return $this->children;
        } else {
            return false;
        }
    }
} 