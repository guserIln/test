<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Добавить резюме';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
     <?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php if (Yii::$app->session->getFlash('success')): ?>
        <p>Данные формы прошли валидацию</p>
    <?php else: ?>
        <p>Данные формы не прошли валидацию</p>
    <?php endif; ?>
<?php endif; ?>
<br>

<div class="page-feedback">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'addresume-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'name')->textInput(); ?>
          <?= $form->field($model, 'fam')->textInput(); ?>
          <?= $form->field($model, 'otch')->textInput(); ?>
           <?= $form->field($model, 'tel')->textInput(['type' => 'tel']); ?>
        <?= $form->field($model, 'email')->textInput(); ?>
         <?= $form->field($model, 'salary')->textInput(); ?>
          <?= $form->field($model, 'city')->textInput(); ?>
              <?= $form->field($model, 'age')->textInput(['type' => 'int']); ?>
               <?PHP
        $zanlist=[
        1=>'1.6.9.3.1.  Полная занятость',
        2=>'1.6.9.3.2.  Частичная занятость',
        3=>'1.6.9.3.3.  Проектная/Временная работа',
        4=>'1.6.9.3.4.  Волонтёрство',
        5=>'1.6.9.3.5.  Стажировка'
      ];
        $grafik = [
   1 =>   '1.6.9.4.1.  Полный день',
   2 =>   '1.6.9.4.2.  Сменный график',
   3 =>   '1.6.9.4.3.  Гибкий график',
   4 =>   '1.6.9.4.4.  Удалённая работа',
   5 =>   '1.6.9.4.5.  Вахтовый метод'];

        $dropdown = [
          1 => '3.1.1.  Администратор баз данных', 
          2 => '3.1.2.  Аналитик', 
          3 => '3.1.3.  Арт-директор',
          4 => '3.1.4.  Инженер', 
          5 => '3.1.5.  Компьютерная безопасность', 
          6 => '3.1.6.  Контент',
          7 =>  '3.1.7.  Маркетинг',
          8 => '3.1.8.  Мультимедиа',
          9 => '3.1.9.  Оптимизация сайта (SEO)',
          10 => '3.1.10. Передача данных и доступ в интернет',
          11 => '3.1.11. Программирование, Разработка',
          12 => '3.1.12. Продажи',
          13 => '3.1.13. Продюсер',
          14=>'3.1.14. Развитие бизнеса',
          15=>'3.1.15. Системный администратор',
          16=>'3.1.16. Системы управления предприятием (ERP)',
          17=>'3.1.17. Сотовые, Беспроводные технологии',
          18=>'3.1.18. Стартапы',
          19=>'3.1.19. Телекоммуникации',
          20=>'3.1.20. Тестирование',
          21=>'3.1.21. Технический писатель',
          22=>'3.1.22. Управление проектами',
          23=>'3.1.23. Электронная коммерция',
          24=>'3.1.24. CRM системы',
          25=>'3.1.25. Web инженер',
          26=>'3.1.26. Web мастер']
          ?>
             <?= $form->field($model, 'zan')->dropDownList(
            $zanlist,
            [
                'prompt' => '...',
            ]
        ); ?>
                <?= $form->field($model, 'spec')->dropDownList(
            $dropdown,
            [
                'prompt' => '...',
            ]
        ); ?>
                  <?= $form->field($model, 'grafik')->dropDownList(
            $grafik,
            [
                'prompt' => '...',
            ]
        ); ?>
             <?= $form->field($model, 'date')->textInput(['type' => 'date']); ?>
           <?= $form->field($model, 'foto')->label(null,['class'=>'btn btn-primary'])
                                ->fileInput(['class'=>'sr-only']) ; ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 5]); ?>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>
    <br><br><br>
</div>
</div>
