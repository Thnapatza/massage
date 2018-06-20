<?php

namespace common\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "hangout".
 *
 * @property integer $id
 * @property string $topic
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $sport_id
 * @property string $sportcomplex
 * @property integer $started_at
 * @property integer $finished_at
 * @property integer $maxjoin
 * @property integer $createdby_id
 * @property string $cost
 * @property User $createdby
 * @property Sport $sport
 * @property string $status
 * @property integer $location
 * @property double $lat
 * @property double $lng
 */
class Hangout extends \yii\db\ActiveRecord
{
    const STATUS_SHOW = 'show';
    const STATUS_WAIT = 'wait';
    const STATUS_HIDDEN = 'hidden';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hangout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic', 'description', 'sport_id', 'sportcomplex','started_at','finished_at'], 'required'],
            [['description','status','location'], 'string'],
            [['created_at', 'updated_at', 'sport_id', 'maxjoin', 'createdby_id'], 'integer'],
            [['cost','lat','lng'], 'number'],
            [['topic'], 'string', 'max' => 50],
            [['sportcomplex'], 'string', 'max' => 45],
            [['createdby_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdby_id' => 'id']],
            [['sport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sport::className(), 'targetAttribute' => ['sport_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic' => 'ชื่อห้อง',
            'description' => 'รายละเอียด',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'sport_id' => 'ชนิดกีฬา',
            'sportcomplex' => 'สถานที่ออกกำลังกาย',
            'started_at' => 'เวลาเริ่มนัดหมาย',
            'finished_at' => 'เวลาสิ้นสุดนัดหมาย',
            'maxjoin' => 'จำนวนผู้เข้าร่วมมากสุด',
            'createdby_id' => 'ผู้ริเริ่มชักชวน',
            'cost' => 'ค่าใช้จ่าย',
            'status' => 'สถานะ',
            'location' => 'Location',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedby()
    {
        return $this->hasOne(User::className(), ['id' => 'createdby_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSport()
    {
        return $this->hasOne(Sport::className(), ['id' => 'sport_id']);
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
