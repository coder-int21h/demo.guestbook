<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentController
 *
 * @author coder.int21h@gmail.com
 */
class CommentController extends CController
{

    /**
     *
     * @var type 
     */
    public $_model;
    public $_postId;

    /**
     *
     * @var type 
     */
    public $defaultAction = 'create';

    /**
     * 
     */
    public function actionCreate()
    {
        /* Если пользователь administrator то ему доступно создание комментария */
        if (Yii::app()->user->checkAccess('administrator'))
        {
            $comment = new Comment('create');
            if (isset($_GET['id']))
            {
                if (isset($_POST['Comment']))
                {
                    $comment->post_id = $_GET['id'];
                    $comment->attributes = $_POST['Comment'];
                    if ($comment->validate())
                    {
                        if ($comment->save())
                            $this->redirect(array('/post/index', 'id' => $comment->id));
                    }
                }
                $this->render('create', array('comment' => $comment));
            }
        }
    }

    /**
     * 
     */
    public function actionUpdate()
    {
        /* Если пользователь administrator то ему доступно редакция комментария */
        if (Yii::app()->user->checkAccess('administrator'))
        {
            $comment = $this->loadModel();
            if (isset($_POST['Comment']))
            {
                $comment->attributes = $_POST['Comment'];
                if ($comment->save())
                    $this->redirect(array('/post/index', 'id' => $comment->post_id));
            }
            $this->render('update', array('comment' => $comment));
        }
    }

    /**
     * 
     */
    public function actionDelete()
    {
        /* Если пользователь administrator то ему доступно удаление комментария */
        if (Yii::app()->user->checkAccess('administrator'))
        {
            $this->loadModel()->delete();
            if (!isset($_GET['ajax']))
                $this->redirect(array('/post/index'));
        }
    }

    /**
     *
     * @return type 
     */
    public function loadModel()
    {
        if ($this->_model === null)
        {
            if (isset($_GET['post_id']))
            {
                $criteria = new CDbCriteria();
                $criteria->condition = 'post_id=:postID';
                $criteria->params = array('postID' => ($_GET['post_id']));
                $this->_model = Comment::model()->find($criteria);
            }
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist777');
        }
        return $this->_model;
    }

}

?>
