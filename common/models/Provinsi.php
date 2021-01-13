<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%provinsi}}".
 *
 * @property int $Id
 * @property string $Provinsi
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%provinsi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Provinsi'], 'required'],
            [['Id'], 'integer'],
            [['Provinsi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Provinsi' => 'Provinsi',
        ];
    }
}
