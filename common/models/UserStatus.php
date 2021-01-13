<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_status}}".
 *
 * @property int $Id
 * @property string $Status
 */
class UserStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_status}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id'], 'integer'],
            [['Status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Status' => 'Status',
        ];
    }
}
