<?php

/**
 * Description of Comment
 * Создает экземпляр Comment класса CActiveRecord
 * Модель таблицы Comment 
 *
 * @author coder.int21h@gmail.com
 */
class Comment extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Возвращает название таблицы
     * @return string; 
     */
    public function tableName()
    {
        return 'comment';
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
            array('post_id', 'required', 'on' => 'create'),
        );
    }

    /**
     * Возвращает масивом релятивные связи с таблицей Post
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'posts' => array(self::BELONGS_TO, 'Post', 'post_id'),
        );
    }

    /**
     * Список безопасно присваиваемых атрибутов 
     * @return array;
     */
    public function safeAttributes()
    {
        return array('content', 'post_id', 'created');
    }

    /**
     * До записи создает текущие дата/время и добавляет к атрибутам
     * @return boolean;
     */
    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            if ($this->isNewRecord)
            {
                $this->created = date('d M Y H:i');
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
