<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Html extends ActiveRecord
{
    public static function tableName()
    {
        return '{{html}}';
    }

    public static function getById($id)
    {
        return self::find()->where(['id' => $id])->one();
    } 
};