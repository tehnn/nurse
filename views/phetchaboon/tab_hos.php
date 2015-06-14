<?php

use fedemotta\datatables\DataTables;
use yii\data\ArrayDataProvider;
$prov = 67;

?>
<br>
<div class="box box-info box-body">ปีงบประมาณ 2558</div>
<table class="table table-bordered table-striped table-responsive table-hover">
    <thead>
        <tr style="background-color: gold">

            <td >ลำดับ</td>
            <td >ตัวชีวัด</td>
            <?php
            $sql = "SELECT h.hospcode,h.hospname from chos h where h.province = $prov";
            $rawhos = \Yii::$app->db->createCommand($sql)->queryAll();
            ?>
            <?php foreach ($rawhos as $value): ?>
                <td style="text-align: center"><?= $value['hospname'] ?></td>
            <?php endforeach; ?>
            <td style="text-align: center"><b>รวม</b></td>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT t.id,t.topic";

        foreach ($rawhos as $value) {
            $hospcode = $value['hospcode'];
            $sql.=",(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
            from data_hos d WHERE d.kpi =t.id and d.rep=2558 AND d.hospcode=$hospcode) as '$hospcode' ";
        }



        $sql.=",(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
        from data_hos d WHERE d.kpi =t.id AND d.prov=$prov) as 'all' ";

        $sql.="from topic_hos t";

        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        ?>
        <?php foreach ($raw as $value): ?>

            <tr>
                <td style="width: 1%"><?= $value['id'] ?></td>
                <td style="word-break:break-all; width: 50%">
                    <?= $value['topic'] ?>
                </td>

                <?php foreach ($rawhos as $val): ?>

                    <?php $hospcode = $val['hospcode'] ?>
                    <td style="text-align: center"><?= $value[$hospcode] ?></td>
                <?php endforeach; ?>


                <td style="text-align: center" ><b><?= $value['all'] ?></b></td>
            </tr>
        <?php endforeach; ?>


    </tbody>

</table>
