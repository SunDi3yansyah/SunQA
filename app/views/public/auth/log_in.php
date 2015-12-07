<title>Log In - <?php echo $this->config->item('web_name'); ?></title>
<style>
.footer {
    display: none;
}
</style>
<script>
$(function() {
    var form = $(".login-form");
    form.css({
        opacity: 1,
        "-webkit-transform": "scale(1)",
        "transform": "scale(1)",
        "-webkit-transition": ".5s",
        "transition": ".5s"
    });
});
</script>
</head>
<body>
<body class="bg-darkTeal">
<div class="login-form padding20 block-shadow">
    <?php echo form_open($this->uri->uri_string()); ?>
        <h1 class="text-light">Log In</h1>
        <hr class="thin">
        <br>
		<?php if (validation_errors() || !empty($errors)): ?>
			<div class="padding10 bg-red fg-white text-accent">
				<?php echo validation_errors(); ?>
				<?php echo (!empty($errors)?$errors:NULL); ?>
			</div>
			<br>
		<?php endif ?>
        <div class="input-control text full-size" data-role="input">
            <label for="username">Username</label>
            <?php echo form_input('username', set_value('username'), 'placeholder="Your Username" autocomplete="off"'); ?>
            <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br>
        <br>
        <div class="input-control password full-size" data-role="input">
            <label for="password">Password</label>
            <?php echo form_password('password', '', 'placeholder="Your Password"'); ?>
            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
        </div>
        <br>
        <br>
        <div class="form-actions">
            <div class="fc">
            	<button type="submit" class="button primary">Log In</button>
            	<hr class="thin">
            	<a href="<?php echo base_url('auth/sign_up'); ?>" class="button success"><span class="mif-user-plus"></span> Sign Up</a>
            	<a style="margin-top: 5px;" href="<?php echo base_url('auth/forgot'); ?>" class="button warning"><span class="mif-lock"></span> Lost your password?</a>
            </div>
        </div>
    <?php echo form_close(); ?>
</div>