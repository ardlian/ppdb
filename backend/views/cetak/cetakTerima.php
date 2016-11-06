<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model backend\models\KepalaKel */


Yii::$app->formatter->locale = 'id-ID';
Yii::$app->language ='id-ID';
?>
<div class="container">
<div class="row">
      <div class="box box-primary">
        <div class="box-header with-border">
          <span class="label label-primary pull-right">
		 
		  </span>
        </div><!-- /.box-header -->
        <div class="box-body">
        
	<div class="row">
	 		 <div class="col-xs-2 text-center">
		 <br/>
		 
			<?php echo Html::img('@web/img/btg.png') ?>
	   </div>
	   <div class="col-xs-8 text-center">
	   PEMERINTAH KABUPATEN BATANG<br/>
	   DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA<br/>
		  <strong>SMA NEGERI 1 WONOTUNGGAL<br/> </strong>
								Terakreditasi : B<br/>
		 Jl. Raya Wates Wonotunggal (0285) 4466287 Batang Kodepos 51253<br/>
		 website: http://smanggal.sch.id  Email : sman1wonotunggal@yahoo.co.id
	   </div>
	</div>
	
      <!-- / end client details section -->

<?php echo Html::img('@web/img/line3.png') ?>

	<div class="row">
  <div class="col-xs-1">
		Nomor 
            <br/>
			Hal
  </div>
  <div class="col-xs-5">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 422.1/405/2016
            <br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>Pemberitahuan</b>
  </div>
  <div class="col-xs-4 text-right">Batang, 25 Juni 2016</div>
	</div>	
	
	 <br/> <br/> 
	 
<table style="width:100%">
  <tr>
    <td class="col-xs-2"></td>
    <td >Kepada <br/> Yth. Bapak/Ibu Orang Tua/ Wali Siswa Baru<br/> SMA Negeri 1 Wonotunggal<br/>di tempat</td> 
  </tr>
    <tr>
    <td> <br/> <br/> <br/></td>
    <td></td> 

  </tr>
  <tr>
    <td></td>
    <td>Berdasarkan peringkat PPDB SMAN 1 Wonotunggal Tahun Pelajaran 2016/2017 bahwa : <br/> 

	</td> 
  </tr>
</table>	
<table style="width:100%">
   <tr>
      <td class="col-xs-2"></td>
    <td class="col-xs-2"></td>

	<td></td> 
  </tr>
  <tr>
      <td></td>
    <td>Nama </td>

	<td>: <?= ucwords(strtolower($calon->nama)) ?></td> 
  </tr>
    <tr>
	    <td></td> 
<td>No Pendaftar</td> 

	<td>: <?= $calon->no_daftar ?></td> 
  </tr>
  <tr>
  <td></td> 
    <td>dinyatakan</td>
<td> <h3><b>: DITERIMA</b></h3></td>

  </tr>
</table>
<table style="width:100%">
  <tr>
    <td class="col-xs-2"></td>
    <td ><br/>Selanjutnya diharapkan melakukan Daftar Ulang pada :</td> 
  </tr>
</table>	
<table style="width:100%">
   <tr>
      <td class="col-xs-2"></td>
    <td class="col-xs-2"></td>

	<td></td> 
  </tr>
  <tr>
      <td></td>
    <td>Hari </td>

	<td>: Senin - Rabu</td> 
  </tr>
   <tr>
      <td></td>
    <td>Tanggal </td>

	<td>: 27 - 29 Juni 2016</td> 
  </tr>
    <tr>
	    <td></td> 
<td>Waktu</td> 

	<td>: 08.00 - 12.00 WIB</td> 
  </tr>
  <tr>
  <td></td> 
    <td>Tempat</td>
<td> : SMA Negeri 1 Wonotunggal</td>

  </tr>
</table>
<table style="width:100%">
  <tr>
    <td class="col-xs-2"></td>
    <td ><br/>Demikian pemberitahuan ini kami sampaikan. Atas perhatiannya, diucapkan terimakasih.</td> 
  </tr>
</table>	
<br/>
<br/>
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-xs-6 text-left">
		
            <br/>
        <br/>
          <br/>
		  <br/>
           <br/>
         <br/>
          <br/>
        </div>
        <div class="col-xs-4 col-sm-10">
					 <br/>
					Kepala SMA Negeri 1 Wonotunggal<br/>
				   <br/>
				   <?php echo Html::img('@web/img/ttd-pak-slamet.png') ?>
					<br/>
					<?= $tapel->kepsek ?><br/>
				 NIP <?= $tapel->nip_kepsek ?> <br/>
        </div>
           </div>
 </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
  </div><!-- /.row -->
 </div>


