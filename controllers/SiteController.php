<?php

namespace app\controllers;

use app\common\helper\MathTest;
use app\common\helper\SetTest;
use app\models\Country;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = 'hello!') {
        $message = Yii::$app->request->bodyParams;
        $test = Yii::$app->session;
        return $this->render('say', [
            'message' => json_encode($message),
            'test' => json_encode($test),
        ]);
    }

    public function actionEntry() {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionEntryTest() {
        $model = new EntryForm(['scenario' => 'register']);
        $model['name'] = "jam";
        $model['password'] = "123";

        return json_encode($model->attributes);

        if ($model->validate()) {
            return 'success';
        } else {
            return json_encode($model->errors);
        }

        // 快赋值
        //$model = new EntryForm();
        //$model = Yii::$app->request->post("EntryForm");

        // 返回所有属性
        // return json_encode($model->attributes);
    }

    public function actionSettest() {
        $test = new SetTest();
        $test->param2 = 3;

        return $test->param2;
    }

    public function actionCountry() {
        $item = new Country();
        $item->loadDefaultValues();

        $item->population = 5000;
        $item->name = 'japan';
        $item->save();

        return $item->population;
    }

    public function actionShow() {
        return $this->render("show", [
            'get' => ($_GET),
            'post'=> ($_POST),
            ]);
    }

    public function actionLearn() {
        $path = __DIR__."/../common/helper/MathTest.php";
        $math = new MathTest();
        $result = $math->add(3, 123);
        return $this->render('learn', [
            'path' => $path,
            'result' => $result,
        ]);
    }

    public function actionConstant() {
        return $this->render('constant', [
            'dir' => __DIR__,
            'method' => __METHOD__,
            'file' => __FILE__,
            'class' => __CLASS__,
        ]);
    }

    public function actionImage() {
        return $this->renderPartial("html/image.html");
    }

    public function actionLink() {
        return $this->renderPartial("html/link.html");
    }

    public function actionFont() {
        return $this->renderPartial("html/font.html");
    }

    public function actionInput() {
        return $this->renderPartial("html/input.html");
    }

    public function actionJs() {
        return $this->renderPartial('html/js.html');
    }

    public function actionTable() {
        return $this->renderPartial('html/table.html');
    }

    public function actionForm() {
        return $this->renderPartial('html/form.html');
    }

    public function actionFile() {
        return $this->renderPartial('html/file.html');
    }

    public function actionCanvas() {
        return $this->renderPartial('html/canvas.html');
    }
}
