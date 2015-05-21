<?php

use yii\bootstrap\Tabs;
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">ตัวชี้วัดคุณภาพการพยาบาลเขตสุขภาพที่ 2 จ.พิษณุโลก</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <!--เริ่ม content-->

        <?php
        echo Tabs::widget([
            'items' => [
                [
                    'label' => 'โรงพยาบาล',
                    'icon' => 'user',
                    'content' => $this->render('tab_hos'),
                    'active' => true,
                    'options' => ['id' => 'tab0'],
                ],
                [
                    'label' => 'หน่วยปฐมภูมิ',
                    'content' => $this->render('tab_pcu'),
                    //'headerOptions' => [...],
                    'options' => ['id' => 'tab1'],
                ],
                [
                    'label' => 'ขาดส่ง',
                     'content' => $this->render('tab_no_send'),
                    //'headerOptions' => [...],
                    'options' => ['id' => 'tab2'],
                ],
            ],
        ]);
        ?>



        <!--จบ content-->
    </div>
    <div class="box-footer">

    </div>
</div><!-- /.box -->