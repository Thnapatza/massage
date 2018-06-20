<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'ติดต่อเรา';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <h4> สามารถติดต่อเราได้ทางเฟซบุ๊คแฟนเพจ Massage of Service </h4>
       <a class="btn btn-primary" href="https://www.facebook.com/Massage-of-Service-180889485955457/?modal=admin_todo_tour">Facebook Fanpage</a>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?php // $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?php // $form->field($model, 'email') ?>

                <?php // $form->field($model, 'subject') ?>

                <?php // $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?php // $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    // 'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
               // ]) ?>

                <div class="form-group">
                    <?php // Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
