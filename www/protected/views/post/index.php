<?php
    if (!empty($post))
        foreach ($post as $key => $val)
        {
            $this->renderPartial('_list', array(
                'post' => $val,
            ));
        }
?>
