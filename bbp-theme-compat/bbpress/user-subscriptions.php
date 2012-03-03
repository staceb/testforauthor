<?php

/**
 * User Subscriptions
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php if ( bbp_is_subscriptions_active() ) : ?>

		<?php if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ) : ?>

			<?php bbp_set_query_name( 'bbp_user_profile_subscriptions' ); ?>

			<div id="bbp-author-subscriptions" class="bbp-author-subscriptions">
				<h2 class="entry-title"><?php _e( 'Subscribed Forum Topics', 'bbpress' ); ?></h2>
				<div class="bbp-user-section">

					<?php if ( bbp_get_user_subscriptions() ) : ?>

						<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

						<?php bbp_get_template_part( 'loop',       'topics' ); ?>

						<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

					<?php else : ?>

						<p><?php bbp_is_user_home() ? _e( 'You are not currently subscribed to any topics.', 'bbpress' ) : _e( 'This user is not currently subscribed to any topics.', 'bbpress' ); ?></p>

					<?php endif; ?>

				</div>
			</div><!-- #bbp-author-subscriptions -->

			<?php bbp_reset_query_name(); ?>

		<?php endif; ?>

	<?php endif; ?>