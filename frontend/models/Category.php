<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{category}}';
    }

    /**
     * Получение всех категорий
     */
    public static function get()
    {
        return self::find()->asArray()->all();
    }
};