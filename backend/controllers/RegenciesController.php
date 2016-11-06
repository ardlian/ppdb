<?php

namespace backend\controllers;
use backend\models\Regencies;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

class RegenciesController extends \yii\web\Controller
{
    public function actionKabList($q = null, $id = null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$out = ['results' => ['id' => '', 'text' => '']];
		if (!is_null($q)) {
			$query = new \yii\db\Query();
			$query->select('id, name AS text')
				->from('regencies')
				->where(['like', 'name', $q])
				->limit(20);
			$command = $query->createCommand();
			$data = $command->queryAll();
			$out['results'] = array_values($data);
		}
		elseif ($id > 0) {
			$out['results'] = ['id' => $id, 'text' => Regencies::find($id)->name];
		}
		return $out;
    }

}
