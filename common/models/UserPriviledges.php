<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_priviledges}}".
 *
 * @property int $Id
 * @property string|null $Priviledges
 */
class UserPriviledges extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_priviledges}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id'], 'integer'],
            [['Priviledges'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Priviledges' => 'Priviledges',
        ];
    }
}
