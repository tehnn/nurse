<br>
<div class="box box-info box-body">ปีงบประมาณ 2558</div>
<table class="table table-bordered table-striped table-responsive table-hover">
      <thead>
        <tr style="background-color: #01ff70">
            
    <td >ลำดับ</td>
    <td >ตัวชีวัด</td>
    <?php
    $pv = 64;
    
    $sql = "SELECT a.ampurcode,a.ampurname FROM campur a  WHERE a.changwatcode = $pv";
    $rawAmp = \Yii::$app->db->createCommand($sql)->queryAll();  
    
   
    
    ?>
    <?php foreach ($rawAmp as $value):?>
    <?php
         $url = \yii\helpers\Url::to(['list-pcu','prov'=>$pv,'amp'=>$value['ampurcode']]);
    ?>
    <td style="text-align: center"><a href="<?=$url?>"><?=$value['ampurname']?></a></td>
    <?php    endforeach;?>
    <td style="text-align: center"><b>รวม</b></td>
  
        </tr>
    </thead>
<tbody>
<?php
    $sql = "SELECT t.id,t.topic

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=01) as '01'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=02) as '02'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=03) as '03'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=04) as '04'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=05) as '05'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=06) as '06'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=07) as '07'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=08) as '08'

,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id and d.rep=2558 AND d.prov =64 AND d.amp=09) as '09'


,(SELECT IF(t.id not in (6,7,8,9),FORMAT(SUM(d.total),0),ROUND(AVG(d.total),2)) 
from data_pcu d WHERE d.kpi =t.id AND d.prov=64) as 'all' 

from topic_pcu t";
    
    $raw = \Yii::$app->db->createCommand($sql)->queryAll();
?>
<?php foreach ($raw as $value):?>

    <tr>
        <td style="width: 1%"><?=$value['id']?></td>
        <td style="word-break:break-all; width: 50%">
           <?=$value['topic']?>
        </td>
        <td style="text-align: center"><?=$value['01']?></td>
        <td style="text-align: center"><?=$value['02']?></td>
        <td style="text-align: center"><?=$value['03']?></td>
        <td style="text-align: center"><?=$value['04']?></td>
         <td style="text-align: center"><?=$value['05']?></td>
        <td style="text-align: center"><?=$value['06']?></td>
        <td style="text-align: center"><?=$value['07']?></td>
        <td style="text-align: center"><?=$value['08']?></td>
        <td style="text-align: center"><?=$value['09']?></td>       
        <td style="text-align: center" ><b><?=$value['all']?></b></td>
    </tr>
<?php endforeach;?>
    

</tbody>

</table>