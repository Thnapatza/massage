<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "garantee".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $joinhangout_id
 * @property integer $user_id
 *
 * @property Hangout $hangout
 * @property User $user
 */
class Garantee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'garantee';
    }
    
    
    public  function behaviors(){
        return [
            ['class'=> TimestampBehavior::className(),
                
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT=>['created_at'],
                   
                    
                ],
                
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'hangout_id', 'user_id'], 'integer'],
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
            'created_at' => 'Created At',
            'hangout_id' => 'Hangout ID',
            'user_id' => 'User ID',
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
}
