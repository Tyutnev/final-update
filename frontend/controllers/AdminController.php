<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Img;
use frontend\models\Html;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $img = new Img();
        $html = new Html();

        if($img->load(Yii::$app->request->post()) && $html->load(Yii::$app->request->post()))
        {
            $html->content = Yii::$app->request->post()['Html']['content'];
            $html->save();
            $html = Html::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();

            $img->src = Yii::$app->request->post()['Img']['src'];
            $img->id_html = $html->id;
            $img->id_category = Yii::$app->request->post()['Img']['id_category'];

            if($img->save())
            {
                var_dump('Save');
                die;
            }
        }

        return $this->render('index', [
            'img' => $img,
            'html' => $html
        ]);
    }
}