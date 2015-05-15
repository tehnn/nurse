<?php

namespace app\controllers;

use app\models\Cmonth;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use app\models\DataPcu;

class TestController extends \yii\web\Controller {

    
    public function exec($sql){
        \Yii::$app->db->createCommand($sql)->execute();
    }

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
    
    public function getTableColumn($table){
        $sql = "SHOW COLUMNS FROM $table";
        //$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'data_pcu';";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
       $cols = [];
        foreach ($raw as $value) {
            $cols[]= $value['Field'];
        }
        //print_r($cols);
        return $cols;
    }
    
    public function actionGet(){
        $data = $this->getTableColumn('chos');
        //print_r($data);
        $columns = implode(",", $data);
        echo $columns;
    }

    public function actionTest3() {
        
        $columns=$this->getTableColumn('data_pcu');
        $columns = implode(",",$columns);

        $file = "./data/pcu_1.xlsx";
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
            $all_row[]=$rows;
            
            
            //$escaped_values = array_map('mysql_real_escape_string', array_values($rows));
            //$values = implode("','", $escaped_values);
            $values = implode("','", $rows);
            $sql = "REPLACE INTO data_pcu ($columns) VALUES ('$values')";
            $this->exec($sql);
            //echo "<hr>";
            
        }
        //$columns=$this->getTableColumn('data_pcu');
        
        //\Yii::$app->db->createCommand()->batchInsert('data_pcu',$columns,$all_row)->execute();
        
        
    }

}
