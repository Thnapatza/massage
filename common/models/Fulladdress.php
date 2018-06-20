<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fulladdress".
 *
 * @property integer $id
 * @property string $location
 * @property double $lat
 * @property double $lng
 */
class Fulladdress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fulladdress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location'], 'string'],
            [['lat', 'lng'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location' => 'Location',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }
}
