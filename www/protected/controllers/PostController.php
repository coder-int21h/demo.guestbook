<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostController
 *
 * @author coder.int21h@gmail.com
 */
class PostController extends CController
{

    public $_id;
    public $_model;
    public $defaultAction = 'index';

    public function actionIndex()
    {
        $criteria = new CDbCriteria;
        $criteria->order = 'created DESC';
        $pages = new CPagination(Post::model()->count($criteria));
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $post = Post::model()->findAll($criteria);
        $this->render('index', array(
            'post' => $post,
            'pages' => $pages,
        ));
    }

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
                    $this->redirect(array('index', 'id' => $post->id));
            }
            $this->render('create', array('post' => $post));
        }
    }

    public function actionUpdate()
    {
        if (Yii::app()->user->checkAccess('user'))
        {
            $post = $this->loadModel();
            if (isset($_POST['Post']))
            {
                $post->attributes = $_POST['Post'];

                if ($post->save())
                    $this->redirect(array('index', 'id' => $post->id));
            }
            $this->render('update', array('post' => $post));
        }
    }

    public function actionDelete()
    {
        $this->loadModel()->delete();
        if (!isset($_GET['ajax']))
            $this->redirect(array('/post/index'));
    }

    /**
     * Возвращает массивом ряд из таблицы 'comment' по id = $num;
     * 
     * @param integer
     * @return  array 
     */
    public function commentSearch($num)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'post_id=:postID';
        $criteria->params = array('postID' => $num);
        $comment = Comment::model()->find($criteria);
        return $comment;
    }
    
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
