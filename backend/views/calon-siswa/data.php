<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
//use yii\widgets\DetailView
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use backend\models\Pekerjaan;
use backend\models\Pendidikan;
use backend\models\Agama;

/* @var $this yii\web\View */
/* @var $model backend\models\CalonSiswa */

$this->title = 'No Pendaftaran: ' .$model->no_daftar;
$this->params['breadcrumbs'][] = ['label' => 'Calon Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calon-siswa-view">
 
  <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail Data Calon Siswa</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"><?= Html::encode($this->title) ?></span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  <?= DetailView::widget([
        'model' => $model2,
		'mode'=>DetailView::MODE_VIEW,
        'attributes' => [
		[
        'group'=>true,
        'label'=>'Nilai UN, Prestasi, Domisili',
        'rowOptions'=>['class'=>'info']
		],
		[
			'columns' =>[
			[
                'attribute'=>'b_ina',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model2->b_ina != null ? $model2->b_ina : '',
				],
			[
                'attribute'=>'b_ing',
				'value' => $model2->b_ing != null ? $model2->b_ing : '',
				],	
			],
		 ],	
		 [
			'columns' =>[
			[
                'attribute'=>'mat',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model2->mat != null ? $model2->mat : '',
			],
			[
                'attribute'=>'ipa',
				'value' => $model2->ipa != null ? $model2->ipa : '',
			],	
			],
		 ],
          [
			'columns' =>[
			
			[
                'attribute'=>'domisili',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model2->domisili != null ? $model2->domisili : '',
			],		
			[
                'attribute'=>'prestasi',
				'value' => $model2->prestasi != null ? $model2->prestasi : '',	
			],	
			],
		],  
 [
			'columns' =>[
			[
                'attribute'=>'total',
				'label'=>'Total',
				'valueColOptions'=>['style'=>'width:30%'],
				'format'=>'raw', 
				'value' => $model2->total != null ? '<h4><span class="label label-warning">'.$model2->total.'</span></h4>' : '',
				],
				[
                'attribute'=>'total',
				'label'=>'Rangking ',

				'format'=>'raw', 
				'value' => $rangking != null ? '<h4><span class="label label-warning">'.ArrayHelper::getValue($rangking, 'rank').'</span></h4>' : '',
				],
                
        ],
		],
		],
    ]) ?>
   <?= DetailView::widget([
        'model' => $model,
		'mode'=>DetailView::MODE_VIEW,
		'hideIfEmpty'=>true,
		'striped' => true,
		'responsive' => true,
		'condensed' => true,
        'attributes' => [
		[
        'group'=>true,
        'label'=>'Bagian 1: Data Siswa',
        'rowOptions'=>['class'=>'info']
		],
         //   'kd_tapel',
         //   'id_calon',
		 [
			'columns' =>[
				[
                'attribute'=>'no_daftar',
                'format'=>'raw', 
                'value'=>'<kbd>'.$model->no_daftar.'</kbd>',
                'displayOnly'=>true,
				'valueColOptions'=>['style'=>'width:30%']
				],
				
				[
                'attribute'=>'tgl_daftar',
				 'type'=>DetailView::INPUT_DATE,
				 'format'=>'date',
				 'widgetOptions' => [
						'pluginOptions'=>['format'=>'dd-mm-yyyy']
					],
				],
			],
		 ],
		 [
			'columns' =>[
				[
                'attribute'=>'nama',
				'valueColOptions'=>['style'=>'width:30%']
				],
				
				[
                'attribute'=>'kelamin',
                'label'=>'Jenis Kelamin',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->kelamin ? '<span class="label label-success">Laki-Laki</span>' : '<span class="label label-primary">Perempuan</span>',
            ],
			],
		 ],
		  [
			'columns' =>[
			[
                'attribute'=>'tmpat_lahir',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model->tmpat_lahir != null ? $model->kabupaten->name : '',
				],
				[
                'attribute'=>'tgl_lahir',
				 'type'=>DetailView::INPUT_DATE,
				 'format'=>'date',
				 'widgetOptions' => [
						'pluginOptions'=>['format'=>'dd-mm-yyyy']
					],
				],
				
			],
		 ],
		  [
			'columns' =>[
			[
                'attribute'=>'agama',
				'valueColOptions'=>['style'=>'width:30%'],
				'value'=>$model->agama0->ket,
				'format'=>'raw',
				'type'=>DetailView::INPUT_SELECT2, 
				'widgetOptions'=>[
				'data'=>ArrayHelper::map(Agama::find()->orderBy('id_agama')->asArray()->all(), 'id_agama', 'ket'),
				],
			],	
            'anak_ke',
			],
		 ],
		 [
			'columns' =>[
			[
                'attribute'=>'tb',
				'valueColOptions'=>['style'=>'width:30%'],
				'label'=>'Tinggi Badan (cm)',
				],
			[
                'attribute'=>'bb',
				'valueColOptions'=>['style'=>'width:30%'],
				'label'=>'Berat Badan (kg)',
				],	
            
			],
		 ],					
		[
			'columns' =>[
			[
                'attribute'=>'no_sttb',
				'valueColOptions'=>['style'=>'width:30%']
				],
				
            'nisn',
			],
		 ],	
			[
			'columns' =>[
			[
                'attribute'=>'hp',
				'valueColOptions'=>['style'=>'width:30%']
				],
				
             'alamat',
			],
		 ],	
            
            
           
				[
        'group'=>true,
        'label'=>'Bagian 2: Sekolah Asal',
        'rowOptions'=>['class'=>'info']
		],	
		      'sekolah_asal',
            'alamat_sekolah',
            'thn_lulus',
			[
                'attribute'=>'status_sekolah',
                'label'=>'Status Sekolah',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->status_sekolah ? '<span class="label label-success">Negeri</span>' : '<span class="label label-primary">Swasta</span>',
            ],
			
		[
        'group'=>true,
        'label'=>'Bagian 3: Data Orang Tua',
        'rowOptions'=>['class'=>'info']
		],
		[
			'columns' =>[
			[
                'attribute'=>'nama_ayah',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model->nama_ayah != null ? $model->nama_ayah : '',
				],
			[
                'attribute'=>'nama_ibu',
				'value' => $model->nama_ibu != null ? $model->nama_ibu : '',
				],	
			],
		 ],	
		 [
			'columns' =>[
			[
                'attribute'=>'kerja_ayah',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model->kerja_ayah != null ? $model->kerjaAyah->ket : '',
			],
			[
                'attribute'=>'kerja_ibu',
				'value' => $model->kerja_ibu != null ? $model->kerjaIbu->ket : '',
			],	
			],
		 ],
          [
			'columns' =>[
			
			[
                'attribute'=>'pen_ayah',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model->pen_ayah != null ? $model->pendidikanAyah->ket : '',
			],		
			[
                'attribute'=>'pend_ibu',
				'value' => $model->pend_ibu != null ?$model->pendidikanIbu->ket : '',
				
			],	
            
			],
		 ],  
           [
			'columns' =>[
			[
                'attribute'=>'alamat_ortu',
				'valueColOptions'=>['style'=>'width:30%'],
				'value' => $model->alamat_ortu != null ? $model->alamat_ortu : '',
				],
							[
                'attribute'=>'hp_ortu',
				'value' => $model->hp_ortu != null ? $model->hp_ortu : '',
				
			],	
            
			],
		 ],  
		[
        'group'=>true,
        'label'=>'Bagian 4: Data Wali',
        'rowOptions'=>['class'=>'info']
		],
            
            [
                'attribute'=>'nama_wali',
				'value' => $model->nama_wali != null ? $model->nama_wali : '',
			],	
			[
                'attribute'=>'kerja_wali',
				'value' => $model->kerja_wali != null ? $model->kerjaWali->ket : '',
			],	
			[
                'attribute'=>'pend_wali',
				'value' => $model->pend_wali != null ? $model->pendidikanWali->ket : '',
			],
            
            'alamat_wali',
            'hp_wali',
         //   'status_daftar',
         //   'status_diterima',
         //   'pencabutan',
         //   'validasi',
         //   'id_pendaftar',
         //   'id_validator',
		 		[
        'group'=>true,
        'label'=>'Bagian 5: Dokumen Persyaratan',
        'rowOptions'=>['class'=>'info']
		],
		[
			'columns' =>[
			[
                'attribute'=>'syarat_foto',
                'label'=>'Syarat Foto 3x4 ?',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->syarat_foto ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                'valueColOptions'=>['style'=>'width:30%']
            ],
				[
                'attribute'=>'syarat_sttb',
                'label'=>'Syarat STTB ?',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->syarat_sttb ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                'valueColOptions'=>['style'=>'width:30%']
            ],		
            
			],
		 ],	
		 [
			'columns' =>[
			[
                'attribute'=>'syarat_skhus',
                'label'=>'Syarat SKHUS ?',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->syarat_skhus ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                'valueColOptions'=>['style'=>'width:30%']
            ],
			[
                'attribute'=>'syarat_sertifikat',
                'label'=>'FC Sertifikat ?',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->syarat_sertifikat ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                'valueColOptions'=>['style'=>'width:30%']
            ],	
            
			],
		 ],	
		 [
			'columns' =>[
			[
                'attribute'=> 'syarat_kk',
                'label'=>'Syarat Kartu Keluarga ?',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->syarat_kk ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                'valueColOptions'=>['style'=>'width:30%']
            ],
			[
                'attribute'=>'syarat_akta',
                'label'=>'Syarat Akta Kelahiran ?',
                'format'=>'raw',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ],
                'value'=>$model->syarat_akta ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                'valueColOptions'=>['style'=>'width:30%']
            ],	
             
			],
		 ],	
     
        ],
    ]) ?>

  </div><!-- /.box-body -->
  <div class="box-footer">
 <p>

    </p>
  </div><!-- box-footer -->
</div><!-- /.box -->
   

    
</div>
