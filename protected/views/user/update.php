<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . ' ' . $model->name;
$this->breadcrumbs[] = ['label' => 'Users', 'url' => ['index']];
//$this->breadcrumbs[] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->breadcrumbs[] = 'Update';
$this->breadcrumbs[] =  $model->id;
?>
<div class="user-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
