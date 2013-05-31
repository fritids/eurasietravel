<div class="wrap">
    <!-- Header -->
	<div id="header">

    <?php include 'languages.php' ?>

    <!-- Logo container -->
    <div id="logo"><h1><a href="<?php echo get_option('home'); ?>/" title="Eurasie Travel">Eurasie Travel</a></h1></div>    
    
    <!-- START NAVIGATION -->
    <div id="navigation">
    	<?php wp_nav_menu(array('theme_location' => 'main', 'container_id' => 'smoothmenu1', 'container_class' => 'ddsmoothmenu')); ?>        
    </div>
    <!-- END NAVIGATION -->   
    
	</div>
	<!-- End Header -->    

</div>
<!--End Wrap-->
