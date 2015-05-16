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
        <hr>
        <div id="show">
            
        </div>
        
        

        <!--จบ content-->
    </div>
    <div class="box-footer">

    </div>
</div><!-- /.box -->

<?php

$route1 = \yii\helpers\Url::to(['ajax/find']);

$js = <<<JS
  
    $('#find').keyup(function(event){
        if(event.keyCode == 13){
            //alert(this.value);
            
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "$route1",
            cache: false,
            data: "word="+this.value,
            success: function(data){ 
                    var d='';
                    $.each(data, function(i){
                        //alert(data[i].hosname);
                        d += '<b>'+data[i].hoscode+'</b> , <b>'+data[i].hosname+'</b> , '+data[i].changwatname+' , '+data[i].ampurname+'<br>';
                    });
                   // 
                   $('#show').html(d);                       
              
            }
        });
        
        }
    });
        
   
JS;
$this->registerJs($js);
?>