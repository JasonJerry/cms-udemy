<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <!-- <li><a href="">Users now online: <?php 
                                //echo usersOnline();
                            ?> </a></li> -->



                <li><a href="">Users now online: <span class="usersonline"> </span> </a></li>
            <li><a href="../index.php">Home page</a></li>
            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 
                                echo $_SESSION['username'];
                            ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>


<?php
                        $post_class = '';
                        $dash_class = '';
                        $cat_class = '';

                        $comment_class = '';

                        $user_class = '';

                        $profile_class = '';

                        $pageName = basename($_SERVER['PHP_SELF']);
                        $cat = 'categories.php';
                        $post = 'posts.php';
                        $dash = 'index.php';
                        $comm = 'comments.php';
                        $prof = 'profile.php';
                        $user = 'users.php';
                        if($pageName == $cat)
                        {
                            $cat_class = 'active';
                        }

                        elseif($pageName == $comm)
                        {
                            $comment_class = 'active';
                        }

                        elseif($pageName == $prof)
                        {
                            $profile_class = 'active';
                        }

                        elseif($pageName == $dash)
                        {
                            $dash_class = 'active';
                        }
                        elseif($pageName == $post)
                        {
                            $post_class = 'active';
                        }
                        elseif($pageName == $user)
                        {
                            $user_class = 'active';
                        }
                        //echo "<li class='$category_class'> <a href='category.php?category={$cat_id}'> {$cat_title}</a></li>";

                        ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php echo $dash_class; ?>">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li class="<?php echo $post_class; ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php">View all posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add posts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $cat_class; ?>">
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    <!-- <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="<?php echo $comment_class; ?>">
                        <a href="./comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li class="<?php echo $user_class; ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add Users</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $profile_class; ?>">
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>