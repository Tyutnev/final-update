<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Img extends ActiveRecord
{
    /**
     * Лимит выборки изображений
     */
    public const LIMIT = 10;

    public static function tableName()
    {
        return '{{img}}';
    }

    /**
     * Получение изображений определенной категории
     * 
     * @param int $id_category
     * @param int $pivot
     * 
     * @return array
     */
    public static function findImgByCategory($id_category, $pivot = null)
    {
        $sqlState = self::find()->where(['id_category' => $id_category]);
        if($pivot) $sqlState->andWhere(['<', 'id', $pivot]);

        return $sqlState->orderBy(['id' => SORT_DESC])->limit(self::LIMIT)->asArray()->all();
    }

    /**
     * @param int $id
     * 
     * @return string
     */
    public static function getById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
};