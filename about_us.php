<?php include_once 'main_header.php'; ?>
<?php $getAboutData = getIndividualDetails('1',"content_pages","id");  ?>        
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><span>View Cart</span></p>
                <p class="pm-sub-header-message">Meet the Sampradaya Ruchulu team</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-60">
        	<div class="row">
            
            	<div class="col-lg-12">
                	
                    <h2><?php echo $getAboutData['title']; ?></h2>
                    
                    <?php echo $getAboutData['description']; ?>
                    
                </div>
            
            </div>
        </div>
        
        <!-- Staff filter system -->
        <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-60">
        	<div class="row">
             
            </div>
        </div>
        <!-- Staff filter system end -->
        
        <!-- BODY CONTENT end -->
    <?php include_once "footer_sub_content.php"; ?>
        
   <?php include_once 'footer.php'; ?>
