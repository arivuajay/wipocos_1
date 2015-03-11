<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model application\models\MasterRole */

$this->title = 'Create Role';
$this->breadcrumbs[] = ['label' => 'Security Roles', 'url' => ['index']];
$this->breadcrumbs[] = $this->title;
?>
<div class="master-role-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
