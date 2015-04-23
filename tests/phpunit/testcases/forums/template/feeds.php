<?php

/**
 * Tests for the `bbp_*_form_forum_*_feed_link()` functions.
 *
 * @group forums
 * @group template
 * @group feeds
 */
class BBP_Tests_Forums_Template_Feeds extends BBP_UnitTestCase {

	/**
	 * @covers ::bbp_forum_topics_feed_link
	 * @covers ::bbp_get_forum_topics_feed_link
	 */
	public function test_bbp_get_forum_topics_feed_link() {
		$f = $this->factory->forum->create();

		$feed_link = bbp_get_forum_topics_feed_link( $f );
		$this->expectOutputString( $feed_link );
		bbp_forum_topics_feed_link( $f );

		$feed_link = bbp_get_forum_topics_feed_link( $f );
		$this->assertSame( '<a href="http://example.org/?feed=rss2&#038;forum=forum-1" class="bbp-forum-rss-link topics"><span>Topics</span></a>', $feed_link );
	}

	/**
	 * @covers ::bbp_forum_replies_feed_link
	 * @covers ::bbp_get_forum_replies_feed_link
	 */
	public function test_bbp_get_forum_replies_feed_link() {
		$f = $this->factory->forum->create();

		$feed_link = bbp_get_forum_replies_feed_link( $f );
		$this->expectOutputString( $feed_link );
		bbp_forum_replies_feed_link( $f );

		$feed_link = bbp_get_forum_replies_feed_link( $f );
		$this->assertSame( '<a href="http://example.org/?type=reply&#038;feed=rss2&#038;forum=forum-1" class="bbp-forum-rss-link replies"><span>Replies</span></a>', $feed_link );
	}
}