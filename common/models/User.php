<?php

namespace common\models;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $UserId
 * @property string $Username
 * @property string $Authkey
 * @property string $Password
 * @property string|null $PasswordResetToken
 * @property string $Email
 * @property int $IdPriv
 * @property int $Login
 * @property string $LastLogin
 * @property string|null $IdM
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPriv', 'Login', 'Enabled','IsLogin'], 'integer'],
            [['LastLogin'], 'safe'],
            [['Username'], 'string', 'max' => 160],
            [['Authkey'], 'string', 'max' => 32],
            [['Password', 'PasswordResetToken', 'Email'], 'string', 'max' => 255],
            [['IdM'], 'string', 'max' => 11],
            [['LastIP'], 'string', 'max' => 25],
            [['Username'], 'unique'],
			[['Username', 'Password'], 'required'],
            [['Email'], 'unique'],
            [['PasswordResetToken'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UserId' => 'User ID',
            'Username' => 'Username',
            'Authkey' => 'Authkey',
            'Password' => 'Password',
            'PasswordResetToken' => 'Password Reset Token',
            'Email' => 'Email',
            'IdPriv' => 'Id Priv',
            'Login' => 'Login',
			'LastIP' => 'Last IP',
            'LastLogin' => 'Last Login',
            'IdM' => 'Id M',
        ];
    }
	

	public function getPriviledges()
    {
        return $this->hasOne(UserPriviledges::className(), ['Id' => 'IdPriv']);
    }
	public function getDetail()
    {
        return $this->hasOne(UserDetail::className(), ['IdM' => 'IdM']);
    }
	
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}
	
	public static function findIdentityByAccessToken($token,$type=null)
	{
		return static::findOne(['access_token'=>$token]);
	}
	
	public static function findByUsername($username)
	{
		return static::findOne(['Username'=>$username]);
	}
	
	public static function findbyPasswordResetToken($token)
	{
		$expire = \Yii::$app->params['user.PasswordResetTokenExpire'];
		$parts = explode('_',$token);
		$timestamp = (int) end($parts);
		if ($timestamp + $expire < time()){
			//token expired
			return null;
		}
		return static::findOne(['PasswordResetToken' => $token]);
	}
	
	 public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.PasswordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
	
	public function getId()
	{
		return $this->getPrimaryKey();
	}
	
	public function getAuthKey()
	{
		return $this->Authkey;
	}
	
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey()==$authKey;
	}
	
	public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->Password);
    }
	
	public function setPassword($password)
    {
        $this->Password= Yii::$app->security->generatePasswordHash($password);
    }
	
	public function generateAuthKey()
    {
        $this->Authkey = Yii::$app->security->generateRandomString();
    }
	
	public function generatePasswordResetToken()
    {
        $this->PasswordResetToken = Yii::$app->security->generateRandomString() . '_' . time();
    }
	
	public function removePasswordResetToken()
	{
		$this->PasswordResetToken = null;
	}
	
	
	public function setLoggedIn(){
		$this->IsLogin=1;
		$this->LastIP=Yii::$app->getRequest()->getUserIP();
		$this->save();
	}
	
	public function setLoggedOut(){
		$this->IsLogin=0;
		$this->save();
	}

}


