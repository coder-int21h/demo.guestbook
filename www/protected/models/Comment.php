<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author coder.int21h@gmail.com
 */
class Comment extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return array(
            array('content', 'required'),
            array('content', 'length', 'max' => 1000, 'min' => 5),
            array('post_id', 'required', 'on' => 'create'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'posts' => array(self::BELONGS_TO, 'Post', 'post_id'),
        );
    }

    public function safeAttributes()
    {
        return array('content', 'post_id');
    }

    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            if ($this->isNewRecord)
            {
                $this->created = date('d M Y H:i');
                $this->user_id = Yii::app()->user->id;
            }
            return true;
        }
        else
        {
            return false;
        }
    }

}

?>
