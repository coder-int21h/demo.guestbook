<div id="content">

    <div class="profil">

        <h2>user profil:</h2>

        <div class="mini-decor">
        </div><!-- mini-decor (End) -->

        <div class="profil-data">



            <!-- поле id -->
            <div class="data-row">

                <div class="data-name">
                    <p>id :</p>
                </div><!-- data-name (End) -->

                <div class="data-value">

                    <p>&nbsp;#<?php echo Yii::app()->user->id; ?></p>
                </div><!-- data-value (End) -->

            </div><!-- data-row (End) -->



            <!-- поле username -->
            <div class="data-row">

                <div class="data-name">
                    <p>username : </p>
                </div><!-- data-name (End) -->

                <div class="data-value">
                    <p>&nbsp;<?php echo Yii::app()->user->name; ?></p>
                </div><!-- data-value (End) -->

            </div><!-- data-row (End) -->



            <!-- поле status -->
            <div class="data-row">

                <div class="data-name">
                    <p>status :</p>
                </div><!-- data-name (End) -->


                <?php if ($user->role === 'administrator'): ?>

                    <div class="data-value-admin">
                        <p>&nbsp;<?php echo $user->role; ?></p>
                    </div><!-- data-value (End) -->

                <?php else: ?>
                    
                    <div class="data-value-user">
                        <p>&nbsp;<?php echo $user->role; ?></p>
                    </div><!-- data-value (End) -->
                    
                <?php endif; ?>

            </div><!-- data-row (End) -->



            <!-- поле data registration -->
            <div class="data-row">

                <div class="data-name">
                    <p>data registration : </p>
                </div><!-- data-name (End) -->

                <div class="data-value">
                    <p>&nbsp;<?php echo $user->created; ?></p>
                </div><!-- data-value (End) -->

            </div><!-- data-row (End) -->



            <!-- поле create posts -->
            <div class="data-row">

                <div class="data-name">
                    <p>create posts : </p>
                </div><!-- data-name (End) -->

                <div class="data-value">
                    <p>&nbsp;<?php echo $post; ?></p>
                </div><!-- data-value (End) -->

            </div><!-- data-row (End) -->




        </div><!-- profil-data (End) -->

    </div><!--  profil (End) -->

</div><!-- content (End) -->
