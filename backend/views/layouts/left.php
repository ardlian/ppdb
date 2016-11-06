<?php
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Administrator', 'options' => ['class' => 'header']],
                 
                ],
            ]
        ) ?>
		<?php 
			echo Nav::widget([
				'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
			]);
		?> 
    </section>

</aside>
