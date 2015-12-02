<title>Log In - <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('public/must/menu'); ?>
<div class="content-wrapper">
	<div class="inner-screen">
		<div class="open-form">
			<?php echo form_open($this->uri->uri_string(), 'class="pure-form pure-form-stacked"'); ?>
				<fieldset>
				<?php if (validation_errors() || !empty($errors)): ?>
					<div class="errors">
						<?php echo validation_errors(); ?>
						<?php echo (!empty($errors)?$errors:NULL); ?>
					</div>
				<?php endif ?>
					<legend>Log In</legend>
						<label for="username">Username</label>
						<?php echo form_input('username', set_value('username'), 'placeholder="Your Username" autocomplete="off"'); ?>
						<label for="password">Password</label>
						<?php echo form_password('password', '', 'placeholder="Your Password"'); ?>
						<div class="fc">
							<button class="pure-button button-secondary">Log in</button>
							<a href="<?php echo base_url('auth/sign_up'); ?>" class="button-success pure-button">Sign up</a>
							<a style="margin-top: 5px;" href="<?php echo base_url('auth/forgot'); ?>" class="button-warning pure-button">Lost your password?</a>
						</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div> 
	</div>