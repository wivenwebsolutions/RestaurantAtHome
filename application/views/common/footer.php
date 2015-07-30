<?php /** * Restaurant At Home * * This file contains: * - The footer tags and main js * * @package RestoAtHome * @author A collaboration of: WiVen Web Solutions - VDW Web - KolorFlux * @copyright Copyright (c) 2014 - 2015 * @copyright * @license * * @link http://restaurantathome.be * @since Version 1.0.0 */ defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>
</div>
<!-- close container fluid -->
</div>
<!-- end wrap -->

<footer class="footer hidden-xs hidden-sm">
	<div class="container">
		<p class="text-muted" style="line-height: 60px; margin-bottom: 0;">
			&COPY; Restaurant At Home &mdash;
			<a href="<?php echo base_url(); ?>contact">Contact</a> &mdash;
			<a href="<?php echo base_url(); ?>privacy">Privacy Charter</a>
		</p>
	</div>
</footer>

<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="border: 0; padding: 15px 15px 0 15px">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Login via</h4>
			</div>
			<div class="modal-body">
				<div class="social-buttons clearfix">
					<a href="#" class="btn btn-fb col-xs-5"><i class="fa fa-facebook"></i> Facebook</a>
					<a href="#" class="btn btn-tw col-xs-5 col-xs-offset-2"><i class="fa fa-twitter"></i> Twitter</a>
				</div>
				<span style="margin: 15px 0 15px;display: block;">OF</span>
				<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">E-mail</label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="E-mail" required>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputPassword2">Paswoord</label>
						<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Paswoord" required>
						<div class="help-block text-right"><a href="<?php echo base_url(); ?>user/passwordrecovery">Paswoord vergeten?</a>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Log in</button>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Hou me ingelogd
						</label>
					</div>
				</form>

				<div class="bottom text-center">
					Nieuw hier? <a href="<?php echo base_url(); ?>register"><b>Registreer nu</b></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo public_url(); ?>js/jquery-1.11.3.js"></script>
<script src="<?php echo public_url(); ?>js/bootstrap-3.3.2.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-backstretch-2.0.4.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-placeholder.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-password-check.js"></script>
<script src="<?php echo public_url(); ?>js/parsley.js"></script>
<script src="<?php echo public_url(); ?>js/parsley-nl.js"></script>
<script src="<?php echo public_url(); ?>js/script.js"></script>

<?php echo (isset($additional_scripts) ? $additional_scripts : '') ?>
</body>

</html>

<?php //EOF - 'It all ends here'- ?>
