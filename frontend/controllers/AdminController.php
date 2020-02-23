<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Img;
use frontend\models\Html;
use yii\web\UploadedFile;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $img = new Img();
        $html = new Html();

        if (Yii::$app->request->isPost && $html->load(Yii::$app->request->post())) {
            
            if(!$html->save()) return;

            $id_html = Html::getLast()->id;

            $img->file = UploadedFile::getInstance($img, 'file');
            if ($path = $img->upload()) {
                $img->src = $path;
                $img->id_html = $id_html;
                $img->load(Yii::$app->request->post());
                if($img->save())
                {
                    var_dump('Шаблон загружен');
                    return;
                }
            }
        }

        return $this->render('index', [
            'img' => $img,
            'html' => $html
        ]);
    }
}