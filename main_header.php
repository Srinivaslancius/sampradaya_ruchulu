    <?php
ob_start();
include "admin/includes/config.php";
include "admin/includes/functions.php"; 
$getSiteSettingsData = getIndividualDetails('1',"site_settings","id"); 
$getMenus = getAllDataCheckActive('categories',0);
$getMenus1 = getAllDataCheckActive('categories',0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">

    <title><?php echo $getSiteSettingsData['admin_title']; ?></title>    

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet">
    <!-- main css -->
    <link href="css/main.css" rel="stylesheet">    
    <!-- mobile css -->
    <link href="css/responsive.css" rel="stylesheet">    
    <!-- FontAwesome Support -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <!-- FontAwesome Support -->    
    <!-- Btns -->
    <link rel="stylesheet" type="text/css" href="css/btn.css" />
    <!-- Btns -->    
    <!-- Superfish menu -->
    <link rel="stylesheet" type="text/css" href="css/superfish/superfish.css" />
    <!-- Superfish menu -->    
    <!-- Theme Color selector -->
    <link href="js/theme-color-selector/theme-color-selector.css" type="text/css" rel="stylesheet">
    <!-- Theme Color selector -->    
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.carousel.css" />
    <!-- Owl Carousel -->    
    <!-- Twitter feed -->
    <link rel="stylesheet" type="text/css" href="css/twitterfeed.css" />
    <!-- Twitter feed -->    
    <!-- Typicons -->
    <link rel="stylesheet" type="text/css" href="css/typicons/typicons.min.css" />
    <!-- Typicons -->    
    <!-- WOW animations -->
    <link rel="stylesheet" type="text/css" href="js/wow/css/libs/animate.css" />
    <!-- WOW animations -->    
    <!-- Forms -->
    <link rel="stylesheet" type="text/css" href="css/forms.css" />
    <!-- Forms -->    
    <!-- Flickr feed -->
    <link rel="stylesheet" type="text/css" href="css/flickrfeed.css" />
    <!-- Flickr feed -->    
    <!-- Pulse Slider -->
    <link rel="stylesheet" type="text/css" href="js/pulse/pm-slider.css" />
    <!-- Pulse Slider -->        
    <!-- Development Google Fonts -->    
    <link href='http://fonts.googleapis.com/css?family=Cantata+One%7COpen+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- Development Google Fonts -->    
 </head>

  <body>
  
  <!-- Mobile Menu -->
  <div class="pm-mobile-menu-overlay" id="pm-mobile-menu-overlay"></div>
  
  <div class="pm-mobile-global-menu">
                    
    <div class="pm-mobile-global-menu-logo">
        <a href="index.php"><img src="uploads/logo/<?php echo $getSiteSettingsData['logo']; ?>" alt="Sampradaya Ruchulu Restaurant"></a> 
    </div>   
    
    <ul class="sf-menu pm-nav">
                        
        <li><a href="index.php">Home</a></li>
        <li>
            <a href="#">Menus</a>
            <ul>
                <?php while($getAllMenus1 = $getMenus1->fetch_assoc()) { ?>
                    <li><a href="menus.php?id=<?php echo $getAllMenus1['id']; ?>"><?php echo $getAllMenus1['category_name']; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="gallery.php">Gallery</a></li>    
        <li><a href="catering.php">Catering</a></li>
    
    </ul>
        
  </div><!-- /pm-mobile-nav-overlay -->    

    
        <!-- Sub-header -->
        <div class="pm-sub-menu-container">
        
            <div class="container">
            
                <div class="row">
                    
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        
                        <div class="pm-sub-menu-info">
                            <!-- <p class="pm-address"><i class="fa fa-map-marker"></i> 4 Main Street, New York, NY 02489</p> -->
                            <p class="pm-contact"><i class="fa fa-mobile-phone"></i> <?php echo $getSiteSettingsData['mobile']; ?> </p>
                        </div>
                                                
                    </div>
                    
                    <div class="col-lg-2 col-md-2 col-sm-6 visible-lg visible-md pm-book-event">
                        <div class="pm-sub-menu-book-event">
                            <a href="book-an-event.php">Book a Table <i class="fa fa-calendar"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <ul class="pm-sub-navigation">
                            <li>
                                <div class="pm-dropdown pm-language-selector-menu">
                                   
                            </li>
                            <li><a href="about_us.php">About Us</a></li>
                            <li><a href="contact_us.php">Contact Us</a></li>

                            <?php if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') { ?>
                                <li class="pm-cart-btn-li"><a href="cart.php" class="pm-cart-btn"><i class="fa fa-shopping-cart"></i> (<?php echo $getCount = getRowsCountWithUsermobile('cart',$_SESSION['session_mobile']);  ?>)</a></li>
                                <li>| <a>Guest</a></li>
                                <li>| <a href="logout.php">Logout</a></li>
                            <?php } else { ?>
                            <li class="pm-cart-btn-li"><a href="cart.php" class="pm-cart-btn"><i class="fa fa-shopping-cart"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                    
                </div>
            
            </div>
            
        </div>
        <!-- /Sub-header -->
    
        <!-- Main navigation -->
        <header>
                
            <div class="container">
            
                <div class="row">
                    
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        
                        <div class="pm-header-logo-container">
                            <a href="index.php"><img src="uploads/logo/<?php echo $getSiteSettingsData['logo']; ?>" class="img-responsive pm-header-logo" alt="Sampradaya Ruchulu Restaurant"></a> 
                        </div>
                        
                        <div class="pm-header-mobile-btn-container">
                            <!--<button type="button" class="navbar-toggle pm-main-menu-btn" id="pm-main-menu-btn" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>-->
                            <button type="button" class="navbar-toggle pm-main-menu-btn" id="pm-mobile-menu-trigger" ><i class="fa fa-bars"></i></button>
                        </div>
                    
                    </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 pm-main-menu">
                                        
                        <nav class="navbar-collapse collapse">
                        
                            <ul class="sf-menu pm-nav">
                        
                                <li><a href="index.php">Home</a></li>
                                <li>
                                    <a href="#">Menus</a>
                                    <ul>
                                        <?php while($getAllMenus = $getMenus->fetch_assoc()) { ?>
                                            <li><a href="menus.php?id=<?php echo $getAllMenus['id']; ?>"><?php echo $getAllMenus['category_name']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="gallery.php">Gallery</a></li>                                                            
                                <li><a href="catering.php">Catering</a></li>
                            
                            </ul>
                        
                        </nav>  
                                              
                    </div>
                    
                </div>
            
            </div>
                    
        </header>
        <!-- /Main navigation -->
