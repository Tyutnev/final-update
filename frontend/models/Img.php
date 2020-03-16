<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use frontend\models\HtmlList;

class Img extends ActiveRecord
{
    public $file;
    public $files;

    const DEFAULT_LIMIT = 30;

    /**
     * Лимит выборки изображений
     */
    public const LIMIT = 10;

    public static function tableName()
    {
        return '{{img}}';
    }

    public function rules()
    {
        return [
            ['id_category', 'safe']
        ];
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
        $sqlState = self::find()->where(['id_category' => $id_category])->andWhere(['!=', 'is_node_in_list', 1]);
        if($pivot) $sqlState->andWhere(['<', 'id', $pivot]);

        return $sqlState->orderBy(['id' => SORT_DESC])->limit(self::LIMIT)->asArray()->all();
    }

    public static function get($pivot = null)
    {
        $state = self::find();

        if($pivot) $state->where(['<', 'id', $pivot]);

        return $state->limit(self::DEFAULT_LIMIT)->
                       orderBy(['id' => SORT_DESC])->
                       all();
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

    public static function getAllByIds($ids)
    {
        return self::find()->where(['id' => $ids])->asArray()->all();
    }

    public static function templateHasList($id)
    {
        return !!HtmlList::getIds($id);
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/' . $this->file->baseName . '.' . $this->file->extension;
            $this->file->saveAs($path);
            return $path;
        } else {
            return false;
        }
    }

    public function uploadResources()
    {
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
};