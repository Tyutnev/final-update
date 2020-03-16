<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class HtmlList extends ActiveRecord
{
    public static function tableName()
    {
        return 'html_list';
    }

    /**
     * Получение всех id html list'а у узла
     */
    public static function getIds($id_root)
    {
        return self::find()->where(['id_root' => $id_root])->asArray()->all();
    }
}