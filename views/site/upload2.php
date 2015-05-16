<?php

use yii\widgets\ActiveForm;
?>

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">ส่งข้อมูล รพ.สต/สอ/สสช</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <!--เริ่ม content-->

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($model, 'file')->fileInput() ?>

        <button><i class="fa fa-dot-circle-o"></i> ส่งข้อมูล</button>

        <?php ActiveForm::end() ?>



        <!--จบ content-->
    </div>
    <div class="box-footer">
         <?php if ($filename_old <> ''): ?>
            <h2>ท่านส่งข้อมูล <span style="background-color: red;color: whitesmoke"><?= $filename_old ?> </span>เรียบร้อยแล้ว !!!</h2>
        <?php else: ?>
            แบบรายงานตัวชี้วัดสำหรับ รพศ/รพท/รพช 
            
            <a href="pcu.xlsx" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i> ดาวน์โหลด</a>
        <?php endif; ?>
    </div>
</div><!-- /.box -->