<?php

class Render_Block_Navigation_Test extends WP_UnitTestCase {

	/**
	 * @covers ::block_core_navigation_get_post_ids_from_block
	 */
	public function test_block_core_navigation_get_post_ids_from_block() {
		$parsed_blocks = parse_blocks(
			'<!-- wp:navigation-link {"label":"Sample Page","type":"page","kind":"post-type","id":755,"url":"http://localhost:8888/?page_id=755"} /-->'
		);
		$parsed_block  = $parsed_blocks[0];
		$context       = array();
		$block         = new WP_Block( $parsed_block, $context, $this->registry );

		$post_ids = block_core_navigation_get_post_ids_from_block( $block );
		$this->assertEqualSets( array( 755 ), $post_ids );
	}

	/**
	 * @covers ::block_core_navigation_get_post_ids_from_block
	 */
	public function test_block_core_navigation_get_post_ids_from_block_with_submenu() {
		$parsed_blocks = parse_blocks( '<!-- wp:navigation-submenu {"label":"Test","type":"post","id":789,"url":"http://localhost/blog/test-3","kind":"post-type","isTopLevelItem":true} -->\n<!-- wp:navigation-link {"label":"(no title)","type":"post","id":755,"url":"http://localhost/blog/755","kind":"post-type","isTopLevelLink":false} /-->\n<!-- /wp:navigation-submenu -->' );
		$parsed_block  = $parsed_blocks[0];
		$context       = array();
		$block         = new WP_Block( $parsed_block, $context, $this->registry );

		$post_ids = block_core_navigation_get_post_ids_from_block( $block );
		$this->assertEqualSets( array( 755, 789 ), $post_ids );
	}


}
