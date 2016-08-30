<?php

namespace app\controllers;

use yii\web\Controller;

class CssController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionOuter() {
        return $this->render('html/outer.html');
    }

    public function actionInter() {
        return $this->render('html/inter.html');
    }
}

