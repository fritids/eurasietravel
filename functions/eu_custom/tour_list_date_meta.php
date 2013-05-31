<div class="my_meta_control">
 
	<p>
	  	
	  	<table>
	  		<tr>
	  			<td>
	  					<?php while( $mb->have_fields_and_multi( 'group_tour_date_links' ) ) : ?>
							<?php $mb->the_group_open(); ?>
	  					<table class="form-table">
	  						<tbody>
									<tr>
						  			<td class="w25">
						  			  <label><?php echo __( 'Departure Date' , 'framework' ); ?></label>
						  			  <?php $mb->the_field( 'departure_date' ); ?>
						  			  <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                                      <span><?php echo date("Y/m/d"); ?> (YYYY/m/d)</span>
						  			</td>
						  			<td class="w50">
						  			  <label><?php echo __( 'End Date' , 'framework' ); ?></label>
						  			  <?php $mb->the_field( 'end_date' ); ?>
						  			  <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                                      <span><?php echo date("Y/m/d"); ?> (YYYY/m/d)</span>
						  			</td>
										<td class="w25">
											<div class="textright" style="margin: 5px 0;">
												<label>&nbsp;</label>
												<input style="margin-left: 5px; border: none" type="button" class="dodelete deletion right" value="<?php echo __( 'Remove Date', 'framework' ); ?>" />
											</div>
										</td>
									</tr>	  			
	  						</tbody>
	  					</table>
							<?php $mb->the_group_close(); ?>
						<?php endwhile; ?>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td class="textright">
						<input type="button" class="docopy-group_tour_date_links button" value="<?php echo __( 'Add Tour Date', 'framework' ); ?>" onClick="Increment()" />
	  			</td>
	  		</tr>
	  	</table>
	  </p>

</div>

<style type="text/css">
	.form-table{
		width:100%;
	}
	
	.form-table td{
		font-size: 12px;
		line-height: 10px;
		margin-bottom: 9px;
		padding: 3px 10px;	
		vertical-align:middle;
	}
	
	.form-table td span{
		font-size:11px;
		color:#999;
	}
	
	.form-table td.w25, .form-table td.w50{
		width:25%;	
	}
	
</style>