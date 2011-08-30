<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 * Создает экземпляр Post класса CActiveRecord
 * Модель таблицы Post 
 *
 * @author coder.int21h@gmail.com
 */
class Post extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Возвращает название таблицы
     * @return string; 
     */
    public function tableName()
    {
        return 'post';
    }

    /**
     * Возвращает масивом релятивные связи с таблицей User
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'author' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * Возвращает массивом правила проверки
     * @return array validation rules; 
     */
    public function rules()
    {
        return array(
            array('content', 'required'),
            array('content', 'length', 'max' => 1000, 'min' => 5),
        );
    }

    /**
     * Список безопасно присваиваемых атрибутов 
     * @return array;
     */
    public function safeAttributes()
    {
        return array('id', 'content');
    }

    /**
     * До записи создает текущие дата/время, id автора записи; и добавляет к атрибутам
     * @return boolean;
     */
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
