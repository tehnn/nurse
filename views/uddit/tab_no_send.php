<?php

$sql = " SELECT h.hoscode,h.hosname,h.ampurname,h.changwatname from chospital h
LEFT JOIN (SELECT DISTINCT d.hospcode from data_pcu d ) t on t.hospcode = h.hoscode
WHERE t.hospcode IS  NULL   AND   h.changwatname = 'อุตรดิตถ์'
ORDER BY h.changwatname asc,h.ampurname asc,h.hoscode asc ";

$raw = Yii::$app->db->createCommand($sql)->queryAll();


?>
<h1>รายชื่อหน่วยบริการ</h1>
<table>
    <?php foreach ($raw as $d):?>
    <tr>
        <td><?=$d['hoscode']?></td><td><?=$d['hosname']?></td><td><?=$d['ampurname']?></td>
    </tr>
    <?php endforeach;?>
</table>

