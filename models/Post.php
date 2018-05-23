<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property string $post_id
 * @property string $detail
 * @property string $user_id
 *
 * @property User $user
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'detail', 'user_id'], 'required'],
            [['post_id', 'user_id'], 'string', 'max' => 4],
            [['detail'], 'string', 'max' => 100],
            [['post_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_is']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'detail' => 'Detail',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_is' => 'user_id']);
    }
}
