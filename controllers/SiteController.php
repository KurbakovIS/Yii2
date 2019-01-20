<?php

namespace app\controllers;

use app\models\tables\Tasks;
use Yii;
use yii\caching\DbDependency;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\PageCache;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'cache' => [
                'class' => PageCache::class,
                'only' => ['contact']
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'cabinet'],
                'rules' => [
                    [
                        'actions' => ['logout', 'cabinet'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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
        return $this->render('index');
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

    public function actionCabinet()
    {
        $userId = Yii::$app->user->identity->getId();

        $dependency = new DbDependency();
        $dependency->sql = "SELECT COUNT(*) FROM tasks";

        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()->where(['responsible_id' => $userId])
        ]);

        Yii::$app->db->cache(function () use ($dataProvider) {
            return $dataProvider->prepare();
        });

        return $this->render('cabinet', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionLang($lang)
    {
        $session = Yii::$app->session;
        $session->set('lang', $lang);
        $this->redirect(Yii::$app->request->referrer);
    }
}
