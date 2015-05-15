<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

$themes = yii::getAlias("@themes") . "/adminlte2";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <title>NurseKPI เขต 2</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link href="<?php echo $themes; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= $themes ?>/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= $themes ?>/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />


    </head>
    <body class="skin-green-light sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <?php echo $this->render('_header', ['themes' => $themes]) ?>            
            <?php echo $this->render('_left', ['themes' => $themes]); ?>          


            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ตัวชี้วัด
                        <small>คุณภาพการพยาบาลเขตสุขภาพที่ 2</small>
                    </h1>


                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="box-body">
                        <?= $content ?>
                        </div><!-- /.box-body -->
                        <div class="box-footer">

                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div>

            <?php echo $this->render('_footer', ['themes' => $themes]); ?>     
            <?php echo $this->render('_control_menu', ['themes' => $themes]); ?>


        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?= $themes ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?= $themes ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?= $themes ?>/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='<?= $themes ?>/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="<?= $themes ?>/js/app.min.js" type="text/javascript"></script>

        <!-- Demo -->
        <script src="<?= $themes ?>/js/demo.js" type="text/javascript"></script>
    </body>
</html>