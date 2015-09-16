<?php

	///////////////////////////////////////////////////////////////
	// [col nmb="half"]
	function client_func( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'name' => '',
			'where' => '',
			'link' => ''
		), $atts );
		
		$tmpName = '<span>'.esc_attr($a['name']).'</span>';
		$tmpWhere = '<span>'.esc_attr($a['where']).'</span>';
		if (esc_attr($a['link'])) {
			$tmpLinkStart = '<a href="'.esc_attr($a['link']).'" target="_blank">';
			$tmpLinkEnd = '</a>';
		} else {
			$tmpLinkStart = '';
			$tmpLinkEnd = '';
		}
		
		$tmpVar = '';
		$tmpVar .= '<div class="cd-container client">'.$tmpLinkStart.$tmpName.$tmpWhere.$tmpLinkEnd.'</div>';
		return $tmpVar;
	}
	add_shortcode('client', 'client_func');
	
	///////////////////////////////////////////////////////////////
	function row_func( $atts, $content = null ) {
		$tmpVar = '';
		$tmpVar .= '<div class="cd-wrapper">';
		return $tmpVar;
	}
	add_shortcode('row', 'row_func');
	/////////////////////////////
	function row_end_func( $atts, $content = null ) {
		$tmpVar = '';
		$tmpVar .= '</div>';
		return $tmpVar;
	}
	add_shortcode('row-end', 'row_end_func');


	///////////////////////////////////////////////////////////////
	// [col nmb="half"]
	function col_func( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'nmb' => ''
		), $atts );
		$tmpVar = '';
		$tmpVar .= '<div class="cd-container '. esc_attr($a['nmb']) .'">';
		return $tmpVar;
	}
	add_shortcode('col', 'col_func');
	/////////////////////////////
	function col_end_func( $atts, $content = null ) {
		$tmpVar = '';
		$tmpVar .= '</div>';
		return $tmpVar;
	}
	add_shortcode('col-end', 'col_end_func');


	///////////////////////////////////////////////////////////////
	/////////////////////////////
	function br_func( $atts, $content = null ) {
		$tmpVar = '';
		$tmpVar .= '<br><br>';
		return $tmpVar;
	}
	add_shortcode('br', 'br_func');


?>