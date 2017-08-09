<!DOCTYPE html>
<html lang="en">
<head>
        
        <!-- Title -->
        <title>Sampradaya Ruchulu</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">      
        <link href="assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">
        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>        
    </head>
    <body class="signup-page" style="height:589px;">
        
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed" style="margin-top:70px">
                <?php //include_once'header.php';?>
            </header>

            <div class="mn-content valign-wrapper">
             <main class="mn-inner container ">
                <div class="valign">
                      <div class="row">
                          <div class="col s12 m6 l4 offset-l4 offset-m3" style= "margin-left:25.333%">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Login</span>
                                       <div class="row">
                                           <form class="col s12" autocomplete="off" method="post" action="login-script.php">
                                              
                                               <div class="input-field col s12">
                                                   <input id="email" autofocus="autofocus" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" class="validate" name="admin_email" required >
                                                   <label for="email">Email</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate" required name="admin_password">
                                                   <label for="password">Password</label>
                                               </div>                                               
                                               <div class="col s12 right-align m-t-sm">
                                                   <input type="submit" name="submit" value="Sign In" class="waves-effect waves-light btn teal"> 
                                               </div>

                                           </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </main>            
           </div>
           <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>