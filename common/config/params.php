<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
	
	/* sesuaikan dengan alamat real */
	'baseUrl' => 'http://localhost/soa',
	
		/* parameter default jangan diubah */
	'imagePath' => Yii::getAlias('@frontend').'/images',
	'imageNewsPath' => Yii::getAlias('@frontend').'/images/articles',
	'resourcesPath' => Yii::getAlias('@frontend').'/images/resources',
	'uploadPath' => Yii::getAlias('@frontend').'/uploads',
	'documentPath' => Yii::getAlias('@frontend').'/uploads/documents',
];
