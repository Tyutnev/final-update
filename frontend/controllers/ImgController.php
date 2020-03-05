<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Img;
use frontend\models\Category;
use frontend\models\Html;
use common\models\Font;

class ImgController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * Получение изображений
     */
    public function actionIndex()
    {
        if(Yii::$app->request->isAjax)
        {
            $imgs = Img::findImgByCategory(
                (int)Yii::$app->request->post('id_category'),
                (int)Yii::$app->request->post('pivot')
            );

            echo json_encode($imgs);
        }
    }

    /**
     * Получение категорий изображений
     */
    public function actionCategory()
    {
        if(Yii::$app->request->isAjax)
        {
            echo json_encode(Category::get());
        }
    }

    /**
     * Контроллер для получения html
     */
    public function actionHtml()
    {
        if(Yii::$app->request->isAjax)
        {
            $img = Img::getById((int)Yii::$app->request->get('id'));
            $html = Html::getById($img->id_html);
            echo json_encode($html->content);
            die;
        }
    }

    /**
     * Загрузка шрифтов
     */
    public function actionFont()
    {
        if(Yii::$app->request->isAjax)
        {
            $pivot = Yii::$app->request->get('pivot');
            echo json_encode(Font::getPopular($pivot));
        }
    }
};