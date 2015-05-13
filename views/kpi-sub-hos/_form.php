<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cyear;
use app\models\Cmonth;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSubHos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-sub-hos-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col col-sm-3">
            <?php
            $year = ArrayHelper::map(Cyear::find()->all(), 'id', 'name');
            echo $form->field($model, 'year')->dropDownList($year, [
                'prompt' => '-- พ.ศ. --'
            ]);
            ?>
        </div>
        <div class="col col-sm-3">
            <?php
            $month = ArrayHelper::map(Cmonth::find()->all(), 'selmonth', 'month_th');
            echo $form->field($model, 'month')->dropDownList($month, [
                'prompt' => '-- เดือน --'
            ]);
            ?>
        </div>
        <div class="col col-sm-3">
            <?= $form->field($model, 'hospcode')->textInput(['maxlength' => 255]) ?>
        </div>
        <div class="col col-sm-3">
            <?= $form->field($model, 'hospname')->textInput(['maxlength' => 255]) ?>
        </div>
    </div>

    <?= $form->field($model, 'provcode')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'ampcode')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'q1')->textInput() ?>

    <?= $form->field($model, 'q2')->textInput() ?>

    <?= $form->field($model, 'q3')->textInput() ?>

    <?= $form->field($model, 'q4')->textInput() ?>

    <?= $form->field($model, 'q5')->textInput() ?>

    <?= $form->field($model, 'q6')->textInput() ?>

    <?= $form->field($model, 'q7')->textInput() ?>

    <?= $form->field($model, 'q8')->textInput() ?>

    <?= $form->field($model, 'q9')->textInput() ?>

    <?= $form->field($model, 'q10')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>

</script>



<?php
$route1 = \yii\helpers\Url::to(['ajax/get-hospname']);

$js = <<<JS
        
  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

   $('#kpisubhos-hospcode').keyup(function(event){
      if(event.keyCode == 13){
        
       
        $.ajax({
	type: "GET",
	url: "$route1",
	cache: false,
	data: "hospcode="+this.value,
	success: function(res){           
 		$('#kpisubhos-hospname').val(res.hospname);
                if(res.hospname != null){
                    $('#kpisubhos-hospname').css('background-color', '#38F05F');
                }else{
                    $('#kpisubhos-hospname').css('background-color', '#ED1C24');
                }
                $('#kpisubhos-ampcode').val(res.amphur); 
                // alert(res.amphur);
                $('#kpisubhos-provcode').val(res.province); 
        }
        });
        
        
      }
   });
         
  
JS;
?>

<?php
$this->registerJs($js);
?>
