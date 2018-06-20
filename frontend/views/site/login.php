<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient\widgets\AuthChoice;

$this->title = 'เข้าสู่ระบบ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            		<h4>เข้าสู่ระบบด้วยเฟซบุ๊ก</h4>
				<?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['site/auth']
                    ]) ?>          		

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?php // $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                     <?php // Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
              
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
		
		
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
        		
        </div>
    </div>
</div>
