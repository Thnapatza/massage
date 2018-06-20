<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property string $messen
 * @property integer $user_id
 * @property integer $hangout_id
 * @property string $time
 * @property string $fb_id 
 * @property Hangout $hangout
 * @property User $user
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['messen'], 'string'],
            [['user_id', 'hangout_id'], 'integer'],
            [['time'], 'safe'],
            [['fb_id'], 'string', 'max' => 50], 
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
            'messen' => 'Messen',
            'user_id' => 'User ID',
            'hangout_id' => 'Hangout ID',
            'time' => 'Time',
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
