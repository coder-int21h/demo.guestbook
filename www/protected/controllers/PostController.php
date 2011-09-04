<?php

/**
 * Description of PostController
 *
 * @author coder.int21h@gmail.com
 */
class PostController extends CController
{

    public $_id;

    /**
     * @var CActiveRecord загружает данные экземпляра модели.
     */
    public $_model;

    /**
     * @var CController действие по умолчанию.
     */
    public $defaultAction = 'index';

    /**
     * Отображает текущую модель.
     */
    public function actionIndex()
    {
        $criteria = new CDbCriteria;
        $criteria->order = 'id DESC';
        $pages = new CPagination(Post::model()->count($criteria));
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        $post = Post::model()->findAll($criteria);
        $this->render('index', array(
            'post' => $post,
            'pages' => $pages,
        ));
    }

    /**
     *  Создает новую модель.
     *  Если модель успешно созданна перенаправляет на главную.
     */
    public function actionCreate()
    {
        if (Yii::app()->user->checkAccess('user'))
        {
            $post = new Post();
            if (isset($_POST['Post']))
            {
                $post->attributes = $_POST['Post'];
                $post->user_id = Yii::app()->user->id;
                if ($post->save())
                    $this->redirect(array('index'));
            }
            $this->render('create', array('post' => $post));
        }
        else
        {
            $this->redirect(array('index'));
        }
    }

    /**
     * Обновление конкретной модели.
     * Если обновление успешно, перенаправляю на главную.
     */
    public function actionUpdate()
    {
        /* Если администратор то может редактировать любой пост. */
        if (Yii::app()->user->checkAccess('administrator'))
        {

            $post = $this->loadModel();

            /* Если $_POST существует присваиваю атрибуты и запись в базу */
            if (isset($_POST['Post']))
            {
                $post->attributes = $_POST['Post'];
                if ($post->save())
                    $this->redirect(array('index', 'id' => $post->id));
                else
                {
                    $this->redirect(array('index'));
                }
            }
            $this->render('update', array('post' => $post));
            exit();
        }



        /* Если пользователь имеет статус user */
        if (Yii::app()->user->checkAccess('user'))
        {

            $post = $this->loadModel();

            /* Проверяю наличие комментария */
            if (isset($_GET['id']))
                $comment = $this->commentSearch($_GET['id']);

            /* Если $_POST существует присваиваю атриббуты */
            if (isset($_POST['Post']))
            {
                $post->attributes = $_POST['Post'];

                /* Если к посту не имеется комментариев */
                if (!isset($comment))
                {
                    /* Если user автор поста */
                    if (Yii::app()->user->id == $post->user_id)
                    {
                        if ($post->save())
                            $this->redirect(array('index', 'id' => $post->id));
                    }
                }
            }
            else
            {
                if (Yii::app()->user->id == $post->user_id)
                {
                    if (!isset($comment))
                    {
                        $this->render('update', array('post' => $post));
                        exit();
                    }
                }
            }
        }
        $this->redirect(array('index'));
    }

    /**
     * Удаление конкретной модели.
     * Если удаление прошло успешно, перенаправляю на главную.
     */
    public function actionDelete()
    {
        /* Если пользователь administrator тогда можно удадить любой Post */
        if (Yii::app()->user->checkAccess('administrator'))
        {
            $this->loadModel()->delete();
            if (!isset($_GET['ajax']))
            {
                $this->redirect(array('/post/index'));
            }
            else
                throw new CHttpException(400, 'Invalid request. Please do not
                    repeat this request again.');
        }

        /* Если пользователь user тогда может удалить собственный Post */
        /* Но только в том случае если к нему еще нету комментария */
        if (Yii::app()->user->checkAccess('user'))
        {
            if (isset($_GET['id']))
            {
                $post = $this->postSearch($_GET['id']);
                if (Yii::app()->user->id == $post->user_id)
                {
                    $this->loadModel()->delete();
                    if (!isset($_GET['ajax']))
                        $this->redirect(array('/post/index'));
                    else
                        throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
                }
            }
        }

        $this->redirect(array('index'));
    }

    /**
     * Возвращает массивом ряд из таблицы 'comment' по id = $num;
     * 
     * @param integer
     * @return Comment:array 
     */
    public function commentSearch($num)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'post_id=:postID';
        $criteria->params = array('postID' => $num);
        $comment = Comment::model()->find($criteria);
        return $comment;
    }

    /**
     * Возвращает массивом ряд из таблицы 'post' по id = $num;
     * 
     * @param integer
     * @return Post:array 
     */
    public function postSearch($num)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'id=:postID';
        $criteria->params = array('postID' => $num);
        $post = Post::model()->find($criteria);
        return $post;
    }

    /**
     * Возвращает данные модели, выбранные по первичному ключу через $_GET['id']
     * Если данные в модели не найденны, будет http исключение (404)
     * @return _model 
     */
    public function loadModel()
    {
        if ($this->_model === null)
        {
            if (isset($_GET['id']))
            {
                $condition = '';
                $this->_model = Post::model()->findByPk($_GET['id'], $condition);
            }
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

}

?>
