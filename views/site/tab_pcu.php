<br>
<div class="box box-info box-body">ปีงบประมาณ 2558</div>
<table class="table table-bordered table-striped table-responsive">
    <thead>
    <td >ลำดับ</td>
    <td >ตัวชีวัด</td>
    <td style="text-align: center">พล</td>
    <td style="text-align: center">พช</td>
    <td style="text-align: center">อต</td>
    <td style="text-align: center">สท</td>
    <td style="text-align: center">ตก</td>
    <td style="text-align: center"><b>รวม</b></td>
</thead>
<tbody>

    
<?php
$sql = "SELECT t.id,t.topic
,0 as 'พล'
,0 as 'พช' 
,0 as 'อต'
,0 as 'สท'
,0 as 'ตก'
,0 as 'รวม' 
from topic_pcu t";
$raw = \Yii::$app->db->createCommand($sql)->queryAll();
?>
<?php foreach ($raw as $value):?>

    <tr>
        <td style="width: 1%"><?=$value['id']?></td>
        <td style="word-break:break-all; width: 50%">
           <?=$value['topic']?>
        </td>
        <td style="text-align: center"><?=$value['พล']?></td>
        <td style="text-align: center"><?=$value['พล']?></td>
        <td style="text-align: center"><?=$value['พล']?></td>
        <td style="text-align: center"><?=$value['พล']?></td>
        <td style="text-align: center"><?=$value['พล']?></td>
        <td style="text-align: center" ><b><?=$value['พล']?></b></td>
    </tr>
<?php endforeach;?>
</tbody>

</table>