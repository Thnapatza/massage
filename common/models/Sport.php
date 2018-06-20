<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sport".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Hangout[] $hangouts
 */
class Sport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อกีฬา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHangouts()
    {
        return $this->hasMany(Hangout::className(), ['sport_id' => 'id']);
    }
}
