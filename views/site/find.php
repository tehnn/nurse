<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">ค้นหา</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <!--เริ่ม content-->
        ชื่อสถานบริการ: <input type="text" id="find" name="find">
        <div id="result">
            sss
            
        </div>
        
        

        <!--จบ content-->
    </div>
    <div class="box-footer">

    </div>
</div><!-- /.box -->

<?php
$js = <<<JS
  
    $('#find').keyup(function(event){
        if(event.keyCode == 13){
            alert(this.value);
        }
    });
        
   
JS;
$this->registerJs($js);
?>