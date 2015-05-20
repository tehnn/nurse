<br>
<div class="box box-info box-body">ปีงบประมาณ 2558</div>
<table class="table table-bordered table-striped table-responsive table-hover">
      <thead>
        <tr style="background-color: gold">
    <td >ลำดับ</td>
    <td >ตัวชีวัด</td>
    <td style="text-align: center">พล</td>
    <td style="text-align: center">พช</td>
    <td style="text-align: center">อต</td>
    <td style="text-align: center">สท</td>
    <td style="text-align: center">ตก</td>
    <td style="text-align: center"><b>รวม</b></td>
        </tr>
    </thead>
<tbody>

    
<?php
$sql = "
    
SELECT t.id,t.topic

,(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) from data_hos d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =65) as 'พล'
,(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) from data_hos d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =67) as 'พช' 
,(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) from data_hos d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =53) as 'อต'
,(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) from data_hos d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64) as 'สท'
,(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) from data_hos d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =63) as 'ตก'
,(SELECT IF(t.id in (13,14,15,16,17,20),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) from data_hos d WHERE d.kpi =t.id) as 'รวม' 

from topic_hos t

";
$raw = \Yii::$app->db->createCommand($sql)->queryAll();
?>
<?php foreach ($raw as $value):?>

    <tr>
        <td style="width: 1%"><?=$value['id']?></td>
        <td style="word-break:break-all; width: 50%">
           <?=$value['topic']?>
        </td>
        <td style="text-align: center"><?=$value['พล']?></td>
        <td style="text-align: center"><?=$value['พช']?></td>
        <td style="text-align: center"><?=$value['อต']?></td>
        <td style="text-align: center"><?=$value['สท']?></td>
        <td style="text-align: center"><?=$value['ตก']?></td>
        <td style="text-align: center" ><b><?=$value['รวม']?></b></td>
    </tr>
<?php endforeach;?>
</tbody>

</table>