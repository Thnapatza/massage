<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "joinhangout".
 *
 * @property integer $id
 * @property integer $hangout_id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Hangout $hangout
 * @property User $user
 */
class Joinhangout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'joinhangout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hangout_id', 'user_id'], 'required'],
            [['hangout_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['hangout_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hangout::className(), 'targetAttribute' => ['hangout_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hangout_id' => 'กิจกรรมที่เข้าร่วม',
            'user_id' => 'ผู้เข้าร่วม',
            'created_at' => 'วันที่เข้าร่วม',
            'updated_at' => 'เวลาแก้ไข',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHangout()
    {
        return $this->hasOne(Hangout::className(), ['id' => 'hangout_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public  function behaviors(){
        return [
            ['class'=> TimestampBehavior::className(),
                
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT=>['created_at','updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE=>['updated_at'],
                    
                ],
                
            ],
        ];
    }
    
}
