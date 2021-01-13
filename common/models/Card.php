<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%card}}".
 *
 * @property int $Id
 * @property string $Card
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%card}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id'], 'integer'],
            [['Card'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Card' => 'Card',
        ];
    }
	
	  public function getUserDetails()
    {
        return $this->hasMany(UserDetail::className(), ['IdCard' => 'Id']);
    }
}
