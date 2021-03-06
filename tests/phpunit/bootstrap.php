<?php

// Define our constants
echo "Defining constants...\n";
require( dirname( __FILE__ ) . '/includes/define-constants.php' );

echo "Ensure bbPress is an active plugin...\n";
$GLOBALS['wp_tests_options'] = array(
	'active_plugins' => array( 'bbpress/bbpress.php' ),
);

// Bail if test suite cannot be found
if ( ! file_exists( WP_TESTS_DIR . '/includes/functions.php' ) ) {
	die( "The WordPress PHPUnit test suite could not be found.\n" );
} else {
	echo "Loading WordPress PHPUnit test suite...\n";
	require( WP_TESTS_DIR . '/includes/functions.php' );
}

/**
 * Load bbPress's PHPUnit test suite loader
 */
function _load_loader() {

	// Check if we're running the BuddyPress test suite
	if ( defined( 'BBP_TESTS_BUDDYPRESS' ) ) {

		// If BuddyPress is found, set it up and require it.
		if ( defined( 'BP_TESTS_DIR' ) ) {
			require BP_TESTS_DIR . '/includes/loader.php';
		}
	}

	require( BBP_TESTS_DIR . '/includes/loader.php' );
}
tests_add_filter( 'muplugins_loaded', '_load_loader' );

echo "Loading WordPress bootstrap...\n";
require( WP_TESTS_DIR . '/includes/bootstrap.php' );

echo "Loading bbPress testcase...\n";
require( BBP_TESTS_DIR . '/includes/testcase.php' );
require( BBP_TESTS_DIR . '/includes/factory.php' );

if ( defined( 'BBP_TESTS_BUDDYPRESS' ) ) {
	echo "Loading BuddyPress testcase...\n";
	if ( defined( 'BP_TESTS_DIR' ) ) {
		require( BP_TESTS_DIR . '/includes/testcase.php' );
	}
} else {
	echo "Not running BuddyPress tests. To execute these, use -c tests/phpunit/buddypress.xml\n";
}
