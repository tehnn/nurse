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
        <hr>
        <h4>รหัสพื้นที่</h4>
        <table class="table table-bordered table-striped table-hover">
            <tr><th>รหัสจังหวัด</th><th>จังหวัด</th><th>รหัสอำเภอ</th><th>อำเภอ</th></tr>
            <?php
            $sql = "SELECT a.changwatcode as 'รหัสจังหวัด',p.changwatname as 'จังหวัด',a.ampurcode as 'รหัสอำเภอ',a.ampurname as 'อำเภอ' FROM campur a INNER JOIN cchangwat p 
on a.changwatcode = p.changwatcode and p.zonecode = 02
ORDER BY a.changwatcode asc,a.ampurcode asc";
            $raw = \Yii::$app->db->createCommand($sql)->queryAll();
            ?>
            <?php foreach ($raw as $value): ?>
            <tr>
                <td><?=$value['รหัสจังหวัด']?></td><td><?=$value['จังหวัด']?></td>
                <td><?=$value['รหัสอำเภอ']?></td><td><?=$value['อำเภอ']?></td>
            </tr>
            <?php endforeach; ?>
        </table>
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
        $('#show').html('กำลังค้นหา...');   
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