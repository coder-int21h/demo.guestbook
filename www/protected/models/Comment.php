<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author Admin
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
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'post' => array(self::HAS_MANY, 'Post', 'post_id'),
        );
    }

}

?>
