<?php

namespace app\controllers;

use app\models\Cmonth;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use app\models\DataPcu;

class TestController extends \yii\web\Controller {

    public function actionTest1() {
        echo "<table border=1>";
        echo "<tr>";
        $data = Cmonth::find()->asArray()->all();
        foreach ($data as $d) {
            echo "<td>" . $d['month_th'] . "</td>";
        }
        echo "</tr>";
        echo "</table>";
    }

    public function actionTest2() {
        $file = "./data/pcu.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($file);
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(2);
//objWorksheet = $objPHPExcel->getActiveSheet();
        echo '<table border=1>' . "\n";
        foreach ($objWorksheet->getRowIterator() as $row) {
            echo '<tr>' . "\n";
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
            // even if it is not set.
            // By default, only cells
            // that are set will be
            // iterated.
            foreach ($cellIterator as $cell) {
                $data = $cell->getCalculatedValue();
                if ($data == "#DIV/0!") {
                    $data = 0;
                };
                echo '<td>' . $data . '</td>' . "\n";
            }
            echo '</tr>' . "\n";
        }
        echo '</table>' . "\n";
    }

    public function actionTest3() {

        $file = "./data/pcu.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($file);

        $highestColumn = $objPHPExcel->setActiveSheetIndex(2)->getHighestColumn();
        $highestRow = $objPHPExcel->setActiveSheetIndex(2)->getHighestRow();
        $highestColumn++;
        $all_row = array();
        for ($row = 2; $row < $highestRow + 1; $row++) {
            //$row=2;
            $rows = array();
            //$cell=[];
            for ($column = 'A'; $column != $highestColumn; $column++) {
                $cell[$column] = $objPHPExcel->setActiveSheetIndex(2)->getCell($column . $row)->getCalculatedValue();

                $cell[$column] = $cell[$column] == "#DIV/0!" ? 0 : $cell[$column];

                $rows[$column] = $cell[$column];
            }
           echo "<pre>"; print_r($rows); echo "<hr>";
            
            //if($row <> 1)
            //$all_row[] = $rows;
        }
        //echo "<pre>";
        //print_r($all_row);
    }

}
