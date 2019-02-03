<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


$gl_options = get_option('xoo-el-general-options');
$en_reg   	= $gl_options['m-en-reg'];
?>

<div class="xoo-el-container">

	<div class="xoo-el-opac"></div>

	<div class="xoo-el-modal">

		<div class="xoo-el-inmodal">

			<div class="xoo-el-srcont">

				<span class="xoo-el-close xoo-el-icon-cancel-circle"></span>

				<div class="xoo-el-wrap">
					<div class="xoo-el-sidebar"></div>
					<div class="xoo-el-main">
						
						<?php do_action('xoo_el_popup_start'); ?>

						<div class="xoo-el-section xoo-el-section-login xoo-el-active">
							<?php wc_get_template('xoo-el-login-section.php',$args,'',XOO_EL_PATH.'/templates/'); ?>
						</div>

						<?php if($en_reg === "yes"): ?>
							<div class="xoo-el-section xoo-el-section-register">
								<?php wc_get_template('xoo-el-signup-section.php',$args,'',XOO_EL_PATH.'/templates/'); ?>
							</div>
						<?php endif; ?>

						<div class="xoo-el-section xoo-el-section-lostpw">
							<?php wc_get_template('xoo-el-lostpw-section.php',$args,'',XOO_EL_PATH.'/templates/'); ?>
						</div>

						<?php do_action('xoo_el_popup_end'); ?>

						<span class="xoo-el-footer-note"><?php _e('We do not share your personal details with anyone.','easy-login-woocommerce'); ?></span>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>