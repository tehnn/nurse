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
            <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-circle-o text-orange"></i> <span>ภาพรวมเขต</span></a></li>

            <li><a href="<?= Url::to(['site/upload1']) ?>"><i class="fa fa-circle-o text-primary"></i> <span>ส่งข้อมูล (รพศ/รพท/รพช.)</span></a></li>
            <li><a href="<?= Url::to(['site/upload2']) ?>"><i class="fa fa-circle-o text-yellow"></i> <span>ส่งข้อมูล (รพ.สต/สอ/สสช.)</span></a></li>

            <li class="header">ช่วยเหลือ</li>
            <li><a href="<?= Url::to(['site/find']) ?>"><i class="fa fa-circle-o text-primary"></i> <span>ค้นหารหัส</span></a></li>
            <li class="divider"></li>
            <li><a href="description.xlsx" target="_blank"><i class="fa fa-circle-o text-green"></i> <span>นิยามตัวชี้วัด</span></a></li>
           <li class="divider"></li>
            <li><a href="https://youtu.be/SX8ThX_ZBFs" target="_blank"><i class="fa fa-circle-o text-yellow"></i> <span>วิธีการส่งข้อมูล</span></a></li>
           
            
            
            <li class="header">จังหวัด</li>

        
            <li><a href="<?= Url::to(['phitlok/index']) ?>"><i class="fa fa-circle-o text-red"></i> <span>พิษณุโลก</span></a></li>
            <li><a href="<?= Url::to(['uddit/index']) ?>"><i class="fa fa-circle-o text-yellow"></i> <span>อุตรดิตถ์</span></a></li>
            <li><a href="<?= Url::to(['phetchaboon/index']) ?>"><i class="fa fa-circle-o text-aqua"></i> <span>เพชรบูรณ์</span></a></li>
            <li><a href="<?= Url::to(['sukotai/index']) ?>"><i class="fa fa-circle-o text-blue"></i> <span>สุโขทัย</span></a></li>
            <li><a href="<?= Url::to(['tak/index']) ?>"><i class="fa fa-circle-o text-danger"></i> <span>ตาก</span></a></li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
