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
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
        );
    }

    public function rules()
    {
        return array(
            array('content, title', 'required'),
            array('title', 'length', 'max' => 64, 'min' => 3),
            array('content', 'length', 'max' => 1000, 'min' => 10),
        );
    }

}

?>
