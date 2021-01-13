<?php

namespace common\models;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "{{%user_detail}}".
 *
 * @property int $Id
 * @property int $IdM
 * @property string $Nama
 * @property int $IdCard
 * @property string $CardNo
 * @property string $Jk
 * @property string $Alamat
 * @property string $Kota
 * @property int $IdProv
 * @property string $Pos
 * @property string $Telepon
 * @property string $HP
 * @property string $Lahir
 * @property string $TglLahir
 * @property int $IdStat
 * @property int $IsAdmin
 * @property string $Created_at
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['IdCard', 'IdProv', 'IdStat', 'IsAdmin'], 'integer'],
            [['JK'], 'string'],
            [['TglLahir'], 'safe'],
            [['IdM', 'Telepon'], 'string', 'max' => 25],
            [['Nama', 'Lahir'], 'string', 'max' => 160],
            [['CardNo'], 'string', 'max' => 50],
            [['Alamat', 'Avatar'], 'string', 'max' => 255],
            [['Kota'], 'string', 'max' => 100],
            [['Pos'], 'string', 'max' => 5],
            [['HP'], 'string', 'max' => 16],
            [['SKPD'], 'string', 'max' => 18],
            [['IdM'], 'unique'],
            [['Created_at'], 'date']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdM' => 'Id M',
            'Nama' => 'Nama',
            'IdCard' => 'Id Card',
            'CardNo' => 'Card No',
            'Jk' => 'Jk',
            'Alamat' => 'Alamat',
            'Kota' => 'Kota',
            'IdProv' => 'Id Prov',
            'Pos' => 'Pos',
            'Telepon' => 'Telepon',
            'HP' => 'Hp',
            'Lahir' => 'Lahir',
            'TglLahir' => 'Tgl Lahir',
            'IdStat' => 'Id Stat',
            'IsAdmin' => 'Is Admin',
            'Created_at' => 'Created At',
        ];
    }
	
	 public function getStatus()
    {
        return $this->hasOne(UserStatus::className(), ['Id' => 'IdStat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Refcard::className(), ['Id' => 'IdCard']);
    }
	

	
	public function getUser()
    {
        return $this->hasOne(User::className(), ['IdM' => 'IdM']);
    }
	
	public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['Id' => 'IdProv']);
    }
	
	public function genIdM()
	{
		$prefix=date('Y');
		$max = $this::find()->select('max(IdM)')->andFilterWhere(['like','IdM',$prefix])->scalar(); 
		
		if ($max != ''){
			$last=substr($max,5,8)+1;
			if($last<10){
				$id=$prefix.'000000'.$last;}
			elseif($last<100){
				$id=$prefix.'00000'.$last;}
			elseif($last<1000){
				$id=$prefix.'0000'.$last;}
			elseif($last<10000){
				$id=$prefix.'000'.$last;}
			elseif($last<100000){
				$id=$prefix.'00'.$last;}
			elseif($last<1000000){
				$id=$prefix.'0'.$last;}
			elseif($last<10000000){
				$id=$prefix.$last;}
		}
		else{
			$id=$prefix.'0000001';
		}
		
		return $this->IdM=$id;
	}

   
}


