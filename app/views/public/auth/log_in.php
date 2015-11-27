<title>Log in - <?php echo $this->config->item('web_name'); ?></title>
<style>
.inner-screen {
	background: #1abc9d;
	margin: 0px auto;
	padding: 8em 0;
}
.inner-screen .pure-form-stacked legend {
	color: #AB1E1E;
	text-align: center;
	font-weight: normal;
	font-size: xx-large;
}
.form {
	width: 400px;
	background: #edeff1;
	margin: 0px auto;
	padding: 20px;
	border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
}
.fc {
		text-align: center;
		margin: 0 auto;
}
</style>
</head>
<body>
<?php $this->load->view('public/must/menu'); ?>
<div class="content-wrapper">
	<div class="inner-screen">
		<div class="form">
			<?php echo form_open($this->uri->uri_string(), 'class="pure-form pure-form-stacked"'); ?>
			<?php echo validation_errors(); ?>
			<?php if (isset($error)): ?>
				<?php echo $error; ?>
			<?php endif ?>
				<fieldset>
					<legend>Log in</legend>
						<label for="username">Your Username</label>
						<?php echo form_input('username', set_value('username'), 'placeholder="Your Username"'); ?>
						<label for="password">Your Password</label>
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