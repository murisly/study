<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'show params';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="show">
    get: <?= print_r($get) ?><br>
    post:<?= print_r($post) ?><br>
</div>
