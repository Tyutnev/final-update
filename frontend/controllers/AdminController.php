<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Img;
use frontend\models\Html;
use yii\web\UploadedFile;

class AdminController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index', [
            'imgs' => Img::get()
        ]);
    }

    public function actionDetail($id)
    {
        $img = Img::getById($id);
        $html = Html::getById($img->id_html);

        return $this->render('detail', [
            'img' => $img,
            'html' => $html
        ]);
    }

    public function actionCreate()
    {
        $img = new Img();
        $html = new Html();

        if (Yii::$app->request->isPost && $html->load(Yii::$app->request->post())) {
            
            if(!$html->save()) return;

            $id_html = Html::getLast()->id;

            $img->file = UploadedFile::getInstance($img, 'file');
            $img->files = UploadedFile::getInstances($img, 'files');
            $img->uploadResources();
            
            if ($path = $img->upload()) {
                $img->src = $path;
                $img->id_html = $id_html;
                $img->show_order = (int)Img::find()->max('show_order') + 1;

                $img->load(Yii::$app->request->post());
                if($img->save())
                {
                    var_dump('Шаблон загружен');
                    return;
                }
            }
        }

        return $this->render('create', [
            'img' => $img,
            'html' => $html
        ]);
    }

    public function actionUpdate()
    {
        if(Yii::$app->request->isAjax)
        {
            $html = Html::getById((int)Yii::$app->request->post('id'));

            $html->content = htmlspecialchars_decode(Yii::$app->request->post('content'));
            echo $html->save() ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
            return;
        }
    }

    public function actionDelete()
    {
        if(Yii::$app->request->isAjax)
        {
            $img = Img::getById((int)Yii::$app->request->post('id'));
            $html = Html::getById($img->id_html);

            $img->delete();
            $html->delete();
        } 
    }

    public function actionSwap()
    {
        if(Yii::$app->request->isAjax)
        {
            Img::swap(
                Yii::$app->request->get('show_one'),
                Yii::$app->request->get('show_two')
            );
        }
    }
}