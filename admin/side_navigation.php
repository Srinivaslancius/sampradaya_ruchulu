            <?php 
                $currentFile = $_SERVER["PHP_SELF"];
                $parts = Explode('/', $currentFile);
                $page_name = $parts[count($parts) - 1];
            ?>
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <?php $getLoginData = getIndividualDetails( $_SESSION['admin_user_id'],"admin_users","id");?>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <p><?php echo $getLoginData['admin_name']; ?></p>
                                <span><?php echo $getLoginData['admin_email']; ?><i class="material-icons right">arrow_drop_down</i></span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>                            
                            <li class="divider"></li>
                            <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

                    <li class="no-padding <?php if($page_name == 'dashboard.php') { echo "active"; } ?>"><a class="waves-effect waves-grey active" href="dashboard.php"><i class="material-icons">dashboard</i>Dashboard</a></li>
                    <li class="no-padding <?php if($page_name == 'site_settings.php') { echo "active"; } ?>"><a class="waves-effect waves-grey active" href="site_settings.php"><i class="material-icons">settings</i>Site Settings</a></li>
                    <!-- <li class="no-padding <?php if($page_name == 'web_menus.php') { echo "active"; } ?>"><a class="waves-effect waves-grey active" href="web_menus.php"><i class="material-icons">open_with</i>Menu</a></li> -->
                    <li class="no-padding ">
                        <a class="collapsible-header waves-effect waves-grey <?php if($page_name == 'admin_users.php' || $page_name == 'users.php') { echo "active"; } ?>"><i class="material-icons">apps</i>Users <i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                               <li><a href="admin_users.php">Admin Users</a></li>
                               <!-- <li><a href="users.php">Users</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding <?php if($page_name == 'banners.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="banners.php"><i class="material-icons">collections</i>Banners</a></li>

                    <li class="no-padding <?php if($page_name == 'gallery.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="gallery.php"><i class="material-icons">collections</i>Gallery</a></li>

                    <li class="no-padding <?php if($page_name == 'categories.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="categories.php"><i class="material-icons">settings_input_svideo</i>Categories</a></li>

                    <li class="no-padding <?php if($page_name == 'event_types.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="event_types.php"><i class="material-icons">settings_input_svideo</i>Event Types</a></li>

                    <li class="no-padding <?php if($page_name == 'catering_types.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="catering_types.php"><i class="material-icons">settings_input_svideo</i>Catering Types</a></li>

                    <li class="no-padding ">
                        <a class="collapsible-header waves-effect waves-grey <?php if($page_name == 'events.php' || $page_name == 'events.php') { echo "active"; } ?>"><i class="material-icons">apps</i>Events <i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                               <li><a href="book_an_event.php">Booked Events</a></li>
                               <li><a href="book_an_catering.php">Booked Caterings</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="no-padding <?php if($page_name == 'content_pages.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="content_pages.php"><i class="material-icons">content_copy</i>Content Pages</a></li>

                    <li class="no-padding <?php if($page_name == 'products.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="products.php"><i class="material-icons">cloud_upload</i>Products</a></li>

                    <li class="no-padding <?php if($page_name == 'customer_enqueries.php') { echo "active"; } ?>"><a class="waves-effect waves-grey" href="customer_enqueries.php"><i class="material-icons">contact_mail</i>Customer Enqueries</a></li>

                </ul>
                
                <div class="footer">
                    <p class="copyright">Lancius IT Solutions</p>
                    <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
                </div>
                </div>
            </aside>