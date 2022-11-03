<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pomiary $model */

$this->title = 'Create Pomiary';
$this->params['breadcrumbs'][] = ['label' => 'Pomiaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pomiary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
