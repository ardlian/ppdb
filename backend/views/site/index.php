<?php
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use miloschuman\highcharts\Highstock;
use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<div class="site-index">
   
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
		  <!-- Apply any bg-* class to to the icon to color it -->
		  <span class="info-box-icon bg-green"><i class="fa fa-user-plus"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Jumlah Pendaftar</span>
			<span class="info-box-number"><?php
                echo $cs->jmlPendaftar;
                ?></span>
		  </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
    </div><!-- /.col -->
	
    <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
		  <!-- Apply any bg-* class to to the icon to color it -->
		  <span class="info-box-icon bg-red"><i class="fa fa-user-times"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Jumlah Pencabutan</span>
			<span class="info-box-number"><?php
                echo $cs->jmlCabut;
                ?></span>
		  </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
    </div><!-- /.col -->
	
    <div class="col-md-3 col-sm-6 col-xs-12">
     <div class="info-box">
		  <!-- Apply any bg-* class to to the icon to color it -->
		  <span class="info-box-icon bg-green"><i class="fa fa-thumbs-up"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Nilai Tertinggi</span>
			<span class="info-box-number"><?= $nilai->nilaiTertinggi ?></span>
		  </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
     <div class="info-box">
		  <!-- Apply any bg-* class to to the icon to color it -->
		  <span class="info-box-icon bg-red"><i class="fa fa-thumbs-down"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Nilai Terendah</span>
			<span class="info-box-number"><?= $nilai->nilaiTerendah ?></span>
		  </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

<div class="row">

    <div class="col-sm-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Sebaran Asal Sekolah</h3>
          <span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php
                echo Highcharts::widget([
                    'options' => [
                        'credits' => ['enabled' => false],
                        'chart' => [
                            'type' => 'column',
                        ],
                        'title' => ['text' => 'Asal Sekolah'],
                        'xAxis' => [
                            'categories' =>  $labelsekolah
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Jumlah Pendaftar']
                        ],
                        'series' => [
                            ['name' => 'Jumlah Pendaftar', 'data' => $datasiswa],
                        ]
                    ]
                ]);
                ?>
          
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

<div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Jenis Kelamin Pendaftar</h3>
          <span class="label label-primary pull-right"><i class="fa fa-html5"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php
                // $dataini = ArrayHelper::map($model->totalPenduduk, 'ket', 'jmlTotal');
				

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],

                    'options' => [
                        'credits' => ['enabled' => false],
                        'title' => [
                            'text' => 'Jenis Kelamin',
                        ],
                        'labels' => [
                            'items' => [
                                [
                                    'html' => 'Total Pendaftar',
                                ],
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Jumlah Pendaftar',
                                'data' => $kelamin,
                                'allowPointSelect' => true,
                                'cursor' => 'pointer',
                                'showInLegend' => false,
                                'dataLabels' => [
                                    'enabled' => true,

                                    'style' => [
                                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                                    ],
                                    'connectorColor' => 'silver',
                                ],
                            ],
                        ],
                    ]
                ]);
                ?>
          
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    
  </div><!-- /.row -->

<div class="row">

    <div class="col-sm-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Pendidikan Ortu Calon Siswa</h3>
          <span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php
                echo Highcharts::widget([
                    'options' => [
                        'credits' => ['enabled' => false],
                        'chart' => [
                            'type' => 'column',
                        ],
                        'title' => ['text' => 'Pendidikan Ortu Calon Siswa'],
                        'xAxis' => [
                            'categories' =>  $penlabel
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Jumlah Pendaftar']
                        ],
                        'series' => [
                            ['name' => 'Total', 'data' => $rowpend],
                            ['name' => 'Ibu', 'data' => $pendibu],
                            ['name' => 'Ayah', 'data' => $penayah],
							['name' => 'Wali', 'data' => $pendwali],
                        ]
                    ]
                ]);
                ?>
          
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->  
  
  <div class="row">

    <div class="col-sm-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Pendidikan Ortu Calon Siswa</h3>
          <span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php
                echo Highcharts::widget([
                    'options' => [
                        'credits' => ['enabled' => false],
                        'chart' => [
                            'type' => 'column',
                        ],
                        'title' => ['text' => 'Pekerjaan Ortu/Wali Calon Siswa'],
                        'xAxis' => [
                            'categories' =>  $label
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Jumlah Pendaftar']
                        ],
                        'series' => [
                            ['name' => 'Total', 'data' => $rowdata],
							['name' => 'Ayah', 'data' => $data1],
                            ['name' => 'Ibu', 'data' => $data2],
                            ['name' => 'Wali', 'data' => $data3],
                        ]
                    ]
                ]);
                ?>
          
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->  