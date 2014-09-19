<?php
/**
 * Created by Dmitry Kmita.
 */

namespace test;

use core\SmartTable;
use model\tableUnit;

require("../../SmartTable.php");


class simpleTest {

    public function __construct()
    {

        $table = new SmartTable();
        $array = array(
            'name'  => 'Sample Table',
            'class'   => 'sample'
        );
        try {
            $table->setParameters($array);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
        echo "Parameters are set";

        $headers = array(
            new tableUnit(tableUnit::TYPE_HEADER, 'header1'),
            new tableUnit(tableUnit::TYPE_HEADER, 'header2'),
            new tableUnit(tableUnit::TYPE_HEADER, 'header3'),
        );
        $tds = array(
            new tableUnit(tableUnit::TYPE_TD, 'td1'),
            new tableUnit(tableUnit::TYPE_TD, 'td2'),
            new tableUnit(tableUnit::TYPE_TD, 'td3'),
        );
        $tr = new tableUnit(tableUnit::TYPE_TR, 'tr', $tds);

        $body = array(
            $tr,
            $tr,
            $tr,
        );
        $data = array(
            'headers'   => $headers,
            'body'      => $body
        );
        $table->setData($data);
        $tableView  =  $table->render();
        include("view/index.php");
    }
}

$test = new simpleTest();