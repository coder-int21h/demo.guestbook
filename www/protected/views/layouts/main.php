<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" media="screen" href="../../../css/reset-min.css" type="text/css"/>
        <link rel="stylesheet" media="screen" href="../../../css/style.css" type="text/css"/>
        <title>demo.guestbook</title>
    </head>

    <body>

        <div id="title">

            <div class="user-blok">

                <?php if (Yii::app()->user->isGuest): ?>
                    <!-- Если пользователь гость то ему доступна форма авторизации -->
                    <?php $this->renderPartial('/post/_login'); ?>

                <?php else : ?>
                    <!-- Если залогинен то видит свой status-bar -->
                    <?php $this->renderPartial('/post/_statusbar') ?>

                <?php endif; ?>

            </div><!-- user-blok (End) -->

            <div class="logo">
                <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
            </div><!-- logo (End) -->

        </div><!-- title (End) -->

        
        <div class ="decor">
        </div><!-- decor (End) -->


        <?php echo $content; ?>


        <div class ="decor">
        </div><!-- decor (End) -->

        <div id="footer">
            <div class="ft-icons">
                <p>
                    <a href="http://jigsaw.w3.org/css-validator/check/referer">
                        <img style="border:0;width:88px;height:31px"
                             src="http://jigsaw.w3.org/css-validator/images/vcss"
                             alt="Правильный CSS!" />
                    </a>
                </p>
                <p>
                    <a href="http://validator.w3.org/check?uri=referer">
                        <img style="border:0;width:88px;height:31px;"  
                             src="http://www.w3.org/Icons/valid-xhtml11"
                             alt="Valid XHTML 1.1" /></a>
                </p>
            </div><!-- ft-icons (End) -->
        </div><!-- footer (End) -->

    </body>
</html>