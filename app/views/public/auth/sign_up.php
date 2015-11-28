<title>Sign Up - <?php echo $this->config->item('web_name'); ?></title>
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
			<?php if (validation_errors()): ?>
				<?php echo validation_errors(); ?>
			<?php endif ?>
				<fieldset>
					<legend>Sign Up</legend>
						<label for="nama">Name</label>
						<?php echo form_input('nama', set_value('nama'), 'placeholder="Your Full Name" autocomplete="off"'); ?>
						<label for="username">Username</label>
						<?php echo form_input('username', set_value('username'), 'placeholder="Your Username" autocomplete="off"'); ?>
						<label for="email">E-Mail</label>
						<?php echo form_input('email', set_value('email'), 'placeholder="Your E-Mail Address" autocomplete="off"'); ?>
						<label for="password">Password</label>
						<?php echo form_password('password', set_value('password'), 'placeholder="Your Password"'); ?>
						<label for="passconf">Password Confirmation</label>
						<?php echo form_password('passconf', '', 'placeholder="Your Password Confirmation"'); ?>
						<div class="fc">
							<button class="pure-button button-secondary">Log up</button>
							<a href="<?php echo base_url('log/in'); ?>" class="button-success pure-button">Log in</a>
							<a style="margin-top: 5px;" href="<?php echo base_url('auth/forgot'); ?>" class="button-warning pure-button">Lost your password?</a>
						</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div> 
	</div>