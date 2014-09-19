<?php
/**
 * Created by PhpStorm.
 * User: dmitry.kmita
 * Date: 19.09.2014
 * Time: 14:27
 */

namespace test;


use core\SmartTable;

class simpleTest {

    public function __construct()
    {
        $table = new SmartTable();
        $array = array(
            'name'  => 'Shit',
        );
        $table->setParameters($array);
    }
} 