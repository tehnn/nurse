<?php

namespace app\controllers;

use Yii;
use app\models\Cmonth;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use app\models\DataPcu;

class TestController extends \yii\web\Controller {

    public function exec($sql) {
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function actionTest2() {
        $file = "./data/hos.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($file);
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(2);
        //echo "<pre>";
        //print_r($objWorksheet->getRowIterator()->current());
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

    public function getTableColumn($table) {
        $sql = "SHOW COLUMNS FROM $table";
        //$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'data_pcu';";
        $raw = Yii::$app->db->createCommand($sql)->queryAll();
        $cols = [];
        foreach ($raw as $value) {
            $cols[] = $value['Field'];
        }
        //print_r($cols);
        return $cols;
    }

    public function actionTest3() {

        $columns = $this->getTableColumn('data_pcu');
        $columns = implode(",", $columns);

        $file = "./data/pcu_1.xlsx";

        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($file);

        $highestColumn = $objPHPExcel->setActiveSheetIndex(2)->getHighestColumn();
        $highestRow = $objPHPExcel->setActiveSheetIndex(2)->getHighestRow();

        $highestColumn++;
        $all_row = array();
        for ($row = 1; $row < $highestRow + 1; $row++) {

            $rows = array();

            for ($column = 'A'; $column != $highestColumn; $column++) {
                $cell[$column] = $objPHPExcel->setActiveSheetIndex(2)
                                ->getCell($column . $row)->getCalculatedValue();

                $cell[$column] = $cell[$column] == "#DIV/0!" ? 0 : $cell[$column];

                $rows[$column] = $cell[$column];
            }
            $all_row[] = $rows;


            //$escaped_values = array_map('mysql_real_escape_string', array_values($rows));
            //$values = implode("','", $escaped_values);
            $values = implode("','", $rows);
            $sql = "REPLACE INTO data_pcu ($columns) VALUES ('$values')";
            $this->exec($sql);

            //echo "<hr>";
        }
        $sql = "delete from data_pcu where kpi=0";
        $this->exec($sql);
        //$columns=$this->getTableColumn('data_pcu');
        //\Yii::$app->db->createCommand()->batchInsert('data_pcu',$columns,$all_row)->execute();
    }
    
     public function actionTest4() {

        $columns = $this->getTableColumn('data_hos');
        $columns = implode(",", $columns);

        $file = "./data/hos.xlsx";

        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($file);

        $highestColumn = $objPHPExcel->setActiveSheetIndex(2)->getHighestColumn();
        $highestRow = $objPHPExcel->setActiveSheetIndex(2)->getHighestRow();

        $highestColumn++;
        $all_row = array();
        for ($row = 1; $row < $highestRow + 1; $row++) {

            $rows = array();

            for ($column = 'A'; $column != $highestColumn; $column++) {
                $cell[$column] = $objPHPExcel->setActiveSheetIndex(2)
                                ->getCell($column . $row)->getCalculatedValue();

                $cell[$column] = $cell[$column] == "#DIV/0!" ? 0 : $cell[$column];

                $rows[$column] = $cell[$column];
            }
            $all_row[] = $rows;


            //$escaped_values = array_map('mysql_real_escape_string', array_values($rows));
            //$values = implode("','", $escaped_values);
            $values = implode("','", $rows);
            $sql = "REPLACE INTO data_hos ($columns) VALUES ('$values')";
            $this->exec($sql);

            //echo "<hr>";
        }
        $sql = "delete from data_hos where kpi=0";
        $this->exec($sql);
        //$columns=$this->getTableColumn('data_pcu');
        //\Yii::$app->db->createCommand()->batchInsert('data_pcu',$columns,$all_row)->execute();
    }

    
}
