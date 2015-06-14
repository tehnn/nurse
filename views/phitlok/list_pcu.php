
<?php

use fedemotta\datatables\DataTables;
use yii\data\ArrayDataProvider;
?>

<b>สถานบริการไม่ขึ้น สาเหตุจากใส่รหัส 5 หลักผิดพลาด</b>
<?php

    
$sql2 = " SELECT d.hospcode,h.hosname,t.id,t.topic,d.total from data_pcu d 
LEFT JOIN chospital2 h on h.hoscode = d.hospcode
LEFT JOIN topic_pcu t on t.id = d.kpi
where d.rep=2558 and d.prov = $prov and d.amp = $amp ";

$data = \Yii::$app->db->createCommand($sql2)->queryAll();

 $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => false,
        ]);
echo DataTables::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
    ]);




?>


