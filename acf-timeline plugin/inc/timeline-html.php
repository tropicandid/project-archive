<?php
/**
*
* Custom Timeline component
*
**/

function build_timeline(){
	$htmlscript = 	"<div id=\"timeline\" class=\"timeline\">
						<h2>".get_field('timeline_headline','options')."</h2>
						<p>".get_field('timeline_subtext','options')."</p>
					<div id=\"acf-carousel\" class=\"acf-carousel\">";

	if( have_rows('timeline_blocks','options') ) { 

	    // Loop through rows.
	    while ( have_rows('timeline_blocks','options') ) {
	     	the_row();
	     	$colorChange = "";
	     	if (get_sub_field('color_change')) {
	     		$colorChange = get_sub_field('color_change')[0];
	     	}

	        // Case: Paragraph layout.
	        if( get_row_layout() == 'image_with_text_overlay' ) {
	        	if (get_sub_field('timeline_sources') ) {
	        		while ( have_rows('timeline_sources') ) {
	        			the_row();
	        			if (get_row_index() == 1 ) {
	        				$htmlscript = $htmlscript."<a class=\"timeline-card\"href=\"". get_sub_field('link_button')['url'] . "\" target=\"". get_sub_field('link_button')['target'] . "\">";
	        			}
	        		}
	        	} else {
	        		$htmlscript = $htmlscript."<div class=\"timeline-card block\">";
	        	}
	        	$htmlscript = $htmlscript.	"<div class=\"card-flex-wrapper datalayer-" . str_replace(' ', '_', strtolower(get_sub_field('block_year')) ) . "\" 
	        								data-key=\"" . str_replace(' ', '_', strtolower(get_sub_field('block_year')) ) . "\"
	        								data-year=\"" . get_sub_field('number_year') . "\" 
	        								data-val-1=\"" . get_sub_field('number_value_1') . "\" 
	        								data-val-2=\"" . get_sub_field('number_value_2') . "\"
	        								data-change=\"" . $colorChange . "\"
	        								data-tagline=\"" . get_sub_field('year_tagline') . "\" >
	        									<div class=\"image\" style=\"background-image: url(".get_sub_field('image').")\" >
		        									<div class=\"year-wrapper\" >
		        										<span class=\"year\">".get_sub_field('block_year')."</span>
		        									</div>
		        								</div>
	        								
		        								<div class=\"text-wrapper\">
		        									<span class=\"superscript\">".get_sub_field('block_superscript')."</span>
		        									<span class=\"subtext\">".get_sub_field('block_subtext')."</span>";

	        	if (get_sub_field('timeline_sources') ) {

	        		$htmlscript = $htmlscript."<div class=\"sources\">";

	        		while ( have_rows('timeline_sources') ) {
	        			the_row();
	        			$htmlscript = $htmlscript."<span class=\"source\" href=\"". get_sub_field('link_button')['url'] . "\" target=\"". get_sub_field('link_button')['target'] . "\">". get_sub_field('link_button')['title'] . "</span>";
	        		} 
	        		$htmlscript = $htmlscript."</div>";
	        	}

	        	$htmlscript = $htmlscript.	"</div></div>";

	        	if (get_sub_field('timeline_sources') ) {
	        		$htmlscript = $htmlscript."</a>";
	        	} else {
	        		$htmlscript = $htmlscript."</div>";
	        	}

	        }
	    }

	 
		$htmlscript = $htmlscript.	"</div>
										<div class=\"timeline-data\">
											
											<div class=\"numbers-bar\">
												<div class=\"numbers-bar__color-wrap\">
													<div id=\"data-color-1\" class=\"data-color-1\">
														<span id=\"number-1\" class=\"number number-1\"></span>
													</div>
													<span id=\"data-label-1\" class=\"data-label data-label-1\">".get_field('timeline_graph_1','options')."</span>
												</div>

												<div class=\"numbers-bar__color-wrap\">
													<div id=\"data-color-2\" class=\"data-color-2\">
														<span id=\"number-2\" class=\"number number-2\"></span>
													</div>
													<span id=\"data-label-2\" class=\"data-label data-label-2\">".get_field('timeline_graph_2','options')."</span> 
												</div>
											</div>

											<span class=\"tagline\"></span>
											
										</div>";

		$htmlscript = $htmlscript."<div id=\"timeline-ticks\" class=\"timeline-ticks\">
									</div>";
	}

	$htmlscript = $htmlscript."</div>";
    return $htmlscript;
}

add_shortcode('timeline', 'build_timeline');
