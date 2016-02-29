<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

include 'app/models/header.php';
?>
    <body>
        <div class="navbar navbar-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="<?php echo MAIN_URL; ?>"><img src="<?php echo ADMIN_URL.'img/cms.png'; ?>" /></a>
                    <!-- the new toggle buttons -->
                    <ul class="nav pull-right">
                        <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary">
                            <button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button>
                        </li>
                        <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top">
                            <button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="span4 offset4">
                <div class="padded" style="margin-top: 40px;">
                    <div class="text-center">
                        <img src="<?php echo ADMIN_URL.'images/cms2.png'; ?>" />
                    </div>
                    <?php alert(); ?>
                    <div class="login box" style="margin-top: 40px;">
                        <div class="box-header">
                            <span class="title"><?php _e("sign in", true); ?></span>
                        </div>
                        <div class="box-content padded">
                            <form class="separate-sections" method="post" action="">
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                        <i class="icon-user"></i>
                                    </span>
                                    <input type="text" name="user" placeholder="<?php _e("username"); ?>">
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                        <i class="icon-key"></i>
                                    </span>
                                    <input type="password" name="password" placeholder="<?php _e("password"); ?>">
                                </div>
                                <div class="input-prepend" style="height: 20px;">
                                    <label>
                                        <input type="checkbox" name="stay" value="1" /> <?php _e("keep me logged in", true); ?>
                                    </label>
                                </div>
                                <div>
                                    <button class="btn btn-blue btn-block">
                                        <?php _e("sign in", true); ?> <i class="icon-signin"></i>
                                    </button>
                                </div>
                            </form>
                            <div>
                                <a href="#">
                                    <?php _e("forgot your password?", true); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>