<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PomiaryData;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $pomiaryData = new PomiaryData();
  
        return $this->render('index',[
            'temp_wew' => $pomiaryData->zwrocDaneDoWykresuGodziny('temp_wew', 'Temp wew', 24),
            'aktual_wew' => $pomiaryData->zwrocNajnowszaWartosc('temp_wew', '&#x2103'),
            'tab_wew' => $pomiaryData->zwrocDaneDoTabelki('temp_wew', 24),
            'temp_zew' => $pomiaryData->zwrocDaneDoWykresuGodziny('temp_zew', 'Temp zew', 24),
            'aktual_zew' => $pomiaryData->zwrocNajnowszaWartosc('temp_wew', '&#x2103'),
            'tab_zew' => $pomiaryData->zwrocDaneDoTabelki('temp_zew', 24),
            'cisnienie' => $pomiaryData->zwrocDaneDoWykresuGodziny('cisnienie', 'Cisnienie', 24),
            'aktual_cis' => $pomiaryData->zwrocNajnowszaWartosc('cisnienie', 'hPa'),
            'tab_cis' => $pomiaryData->zwrocDaneDoTabelki('cisnienie', 24),
            'wilgotnosc' => $pomiaryData->zwrocDaneDoWykresuGodziny('wilgotnosc', 'Wilgotnosc', 24),
            'aktual_wil' => $pomiaryData->zwrocNajnowszaWartosc('wilgotnosc',  '%'),
            'tab_wil' => $pomiaryData->zwrocDaneDoTabelki('wilgotnosc', 24),
        ]);
     }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
