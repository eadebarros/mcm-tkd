        <!-- navbar start -->
        <div class="navbar navbar-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="<?php echo ADMIN_URL;?> "><img src="<?php echo ADMIN_URL.'img/cms.png'; ?>" /></a>
                    <!-- the new toggle buttons -->
                    <ul class="nav pull-right">
                        <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>
                        <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
                    </ul>
                    <div class="nav-collapse nav-collapse-top collapse">
                        <ul class="nav full pull-right">
                            <li class="dropdown user-avatar">
                                <!-- the dropdown has a custom user-avatar class, this is the small avatar with the badge -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>
                                        <img class="menu-avatar" src="images/avatars/<?php echo ($Admin->picture != "") ? $Admin->picture : "avatar-".$Admin->sex.".jpg" ; ?>" /> <span><?php echo $Admin->first_name; ?> <i class="icon-caret-down"></i></span>
                                        <span class="badge badge-dark-red">5</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- the first element is the one with the big avatar, add a with-image class to it -->
                                    <li class="with-image">
                                        <div class="avatar">
                                            <img src="images/avatars/<?php echo ($Admin->picture != "") ? $Admin->picture : "avatar-".$Admin->sex.".jpg" ; ?>" />
                                        </div>
                                        <span><?php echo $Admin->full_name; ?> </span>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="?a=settings"><i class="icon-cog"></i> <span><?php _e("settings"); ?></span></a></li>
                                    <li><a href="?a=messages"><i class="icon-envelope"></i> <span><?php _e("messages"); ?></span> <span class="label label-dark-red pull-right">5</span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="?a=logout"><i class="icon-off"></i> <span><?php _e("sign out"); ?></span></a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li class="active"><a href="#" title="Go home"><i class="icon-home"></i> Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar end -->
