<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author coder.int21h@gmail.com
 */
class Post extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'post';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'author' => array(self::BELONGS_TO, 'User', 'user_id'),
            
        );
    }

    public function rules()
    {
        return array(
            array('content', 'required'),
            array('content', 'length', 'max' => 1000, 'min' => 5),
        );
    }
    
    public function safeAttributes()
    {
        return array('content');
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
