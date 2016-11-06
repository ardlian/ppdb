<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ChatController extends Controller
{

    public function actionIndex()
    {
        $this->layout = 'playground';
        return $this->render('index', ['name' => Yii::$app->profile->name]);
    }

    public function actionChat()
    {
        Yii::$app->getResponse()->format = 'json';
        $profile = Yii::$app->profile;
        $profile->lastSeen = microtime(true);
        Yii::$app->getDb()->createCommand()->insert('{{%chat}}', [
            'time' => microtime(true),
            'user_id' => $profile->id,
            'username' => $profile->name,
            'text' => Yii::$app->getRequest()->post('chat', '')
        ])->execute();

        return true;
    }

    public function actionLastSeen()
    {
        Yii::$app->profile->lastSeen = microtime(true);
    }

    public function actionSetName()
    {
        Yii::$app->getResponse()->format = 'json';
        $var = Yii::$app->getRequest()->post('name');
        if ($var) {
            Yii::$app->profile->name = $var;
            return $var;
        }
        return Yii::$app->profile->name;
    }

    public function actionMessage($notifOnly = false)
    {
        $MAX_CONN = 15; // 15 times
        $sse = new SSE();
        try {
            $lastTime = Yii::$app->getRequest()->getHeaders()->get('last-event-id', 0);
            $user_id = Yii::$app->profile->id;
            $lastSeen = Yii::$app->profile->lastSeen ? : 0;

            $chats = (new \yii\db\Query())
                ->select(['time', 'user_id', 'username', 'text'])
                ->from(['chat'])
                ->where('[[time]]>:ctime')
                ->orderBy(['time' => SORT_DESC])
                ->limit(150);

            $unread = (new \yii\db\Query())
                ->from(['chat'])
                ->where('[[time]]>:ctime')
                ->andWhere(['<>', 'user_id', $user_id]);

            $lastCount = -1;
            for ($i = 0; $i <= $MAX_CONN; $i++) {
                // message belum terbaca
                $count = $unread->params([':ctime' => $lastSeen])->count();
                if ($count != $lastCount || ($i % 4 == 0)) {
                    $lastCount = $count;
                    $sse->event('unread', ['count' => $count]);
                    $sse->flush();
                }

                // load message
                if (!$notifOnly) {
                    $rows = $chats->params([':ctime' => $lastTime])->all();
                    $lastTime = microtime(true);
                    $msgs = [];
                    foreach (array_reverse($rows) as $row) {
                        $self = $row['user_id'] == $user_id;

                        if ($row['time'] < ($lastTime - 86400)) { // lebih dari sehari
                            $formatTime = date('d M H:i', $row['time']);
                        } else {
                            $formatTime = date('H:i:s', $row['time']);
                        }
                        $msgs[] = [
                            'self' => $self,
                            'time' => $formatTime,
                            'name' => $self ? 'Me' : "{$row['username']}({$row['user_id']})",
                            'text' => $row['text']
                        ];
                    }
                    if (count($msgs) || ($i % 4 == 2)) {
                        $sse->event('chat', ['msgs' => $msgs]);
                        $sse->flush();
                    }
                }
                sleep(1);
            }
        } catch (\Exception $exc) {
            $sse->event('msgerror', ['msg' => $exc->getMessage()]);
            $sse->flush();
        }
        $sse->id($lastTime);
        $sse->flush();
        exit();
    }
}