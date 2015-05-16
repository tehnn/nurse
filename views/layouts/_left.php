<?php

use yii\helpers\Url;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $themes ?>/img/nurse.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            
            <li class="header">รายการ</li>
            <li><a href="<?= Url::to(['template']) ?>"><i class="fa fa-circle-o text-red"></i> <span>แบบรายงาน</span></a></li>
            <li><a href="<?= Url::to(['upload']) ?>"><i class="fa fa-circle-o text-yellow"></i> <span>ส่งข้อมูล</span></a></li>

            <li class="header">ค้นหา</li>
            <li><a href="#"><i class="fa fa-circle-o text-primary"></i> <span>สถานบริการ</span></a></li>
            
            <li class="header">จังหวัด</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>พิษณุโลก</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>อุตรดิตถ์</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>เพชรบูรณ์</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i> <span>สุโขทัย</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> <span>ตาก</span></a></li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
