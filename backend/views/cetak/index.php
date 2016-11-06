<?php
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cetak Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-index">

  <div class="row">
    <div class="col-sm-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Jurnal Pendaftaran</h3>
          
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>Menu untuk mencetak Juernal pendaftaran perhari.</p>
          <a href="<?= Url::toRoute('cetak/create'); ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-sm-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Buku Nomor Pendaftaran</h3>
          
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>Menu untuk mencetak BUku Nomor pendaftaran perhari.</p>
          <a href="<?= Url::toRoute('cetak/nomor'); ?>" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  <div class="row">
    <div class="col-sm-6">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Buku Pencabutan Berkas PDB</h3>
          
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>Menu untuk mencetak Buku Pencabutan</p>
          <a href="<?= Url::toRoute('cetak/cabut'); ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-sm-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Buku Pendaftaran Calon PDB</h3>
         
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>Menu untuk mencetak BUku pendaftaran perhari.</p>
          <a href="<?= Url::toRoute('cetak/daftar'); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  <div class="row">
    <div class="col-sm-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Pemberitahuan Diterima</h3>
          
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>Menu untuk mencetak Surat Pemberitahuan Diterima</p>
          <a href="<?= Url::toRoute('cetak/terima'); ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-sm-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Buku Daftar Ulang</h3>
         
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>Menu untuk mencetak Buku Daftar Ulang.</p>
          <a href="<?= Url::toRoute('cetak/create'); ?>" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
