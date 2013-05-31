<?php get_header(); 
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
  
    
    <div class="inner-wrap">
    	
    	<!--Col 1-->
        <?php get_sidebar(); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <div class="page-detail"> 
            <h2><?php echo $term->name ?></h2>
            
            <?php 
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				if ( $paged > 1 )
	 				$args['paged'] = $paged;
				
				query_posts( array('post_type' => 'people', 'people_area' => $term->slug, 'ignore_sticky_posts' => 1, 'paged' => $paged, 'posts_per_page' => '5') );
				
				//query_posts("posts_per_page=3&post_type=people&people_area=$term->name&order=desc&ignore_sticky_posts=1&paged=$paged");
			?>
            
            <?php get_template_part( 'loop', 'people_area' ); ?>         

           	<!--<a href="javascript:history.go(-1)" title="Return to all location">&lsaquo;&lsaquo; Back</a>-->
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>