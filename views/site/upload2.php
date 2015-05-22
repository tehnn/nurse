<?php

use yii\widgets\ActiveForm;
use app\models\Onoof;
use app\models\News;
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
        <div class="alert alert-success">
            <h3>
            <?php
            $news = News::find()->asArray()->one();
            echo $news['message'];
            ?>
            </h3>
        </div>
        <?php
        $status = Onoof::find()->asArray()->one();
        $status=$status['status']=='on';
        if ($status):
            ?>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

            <?= $form->field($model, 'file')->fileInput() ?>

            <button><i class="fa fa-dot-circle-o"></i> ส่งข้อมูล</button>

            <?php ActiveForm::end() ?>
        <?php endif; ?>


        <!--จบ content-->
    </div>
    <div class="box-footer">
        <?php if ($filename_old <> ''): ?>
            <h2>ท่านส่งข้อมูล <span style="background-color: red;color: whitesmoke"><?= $filename_old ?> </span>เรียบร้อยแล้ว !!!</h2>
        <?php else: ?>
            แบบรายงานตัวชี้วัดสำหรับ รพ.สต/สอ/สสช            
            <a href="pcux.xlsx"  target="_blank">ดาวน์โหลด</a>
        <?php endif; ?>
        <hr>
        <p style="color : orangered">***หากมีข้อติดขัด ประสานผู้พัฒนาโปรแกรมโดยตรง นายอุเทน จาดยางโทน 0812841147 ,tehnnn@gmail.com</p>
    </div>
</div><!-- /.box -->