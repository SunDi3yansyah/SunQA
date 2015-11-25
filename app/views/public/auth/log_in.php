<?php $this->load->view('public/must/head'); ?>
<title>Log in - <?php echo $this->config->item('web_name'); ?></title>
<style>

.inner-screen {
  background: #1abc9d;
  margin: 0px auto;
  padding: 10em 0;
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

/*input[type="text"] {
  display: block;
  width: 309px;
  height: 35px;
  margin: 15px auto;
  background: #fff;
  border: 0px;
  padding: 5px;
  font-size: 16px;
   border: 2px solid #fff;
  transition: all 0.3s ease;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
}

input[type="text"]:focus{
  border: 2px solid #1abc9d;
}

input[type="submit"] {
  display: block;
  background: #1abc9d;
  width: 314px;
  padding: 12px;
  cursor: pointer;
  color: #fff;
  border: 0px;
  margin: auto;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  font-size: 17px;
  transition: all 0.3s ease;
}

input[type="submit"]:hover {
  background: #09cca6;
}*/
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
                    <fieldset>
        <legend>Log in</legend>
                        <label for="email">Your Email</label>
                        <input id="email" type="email" placeholder="Your Email">
                        <label for="password">Your Password</label>
                        <input id="password" type="password" placeholder="Your Password">
                        <div class="fc">
                            <button type="submit" class="pure-button button-secondary">Log in</button>
                            <a href="<?php echo base_url('auth/sign_up'); ?>" class="button-success pure-button">Sign up</a>
                            <a style="margin-top: 5px;" href="<?php echo base_url('auth/forgot'); ?>" class="button-warning pure-button">Lost your password?</a>
                        </div>
                    </fieldset>
                <?php echo form_close(); ?>
      </div> 
    </div>

    <div class="footer l-box is-center">
        Copyright &copy; <?php echo date('Y'); ?> <?php echo $this->config->item('web_name'); ?>, All Right Reserved.
    </div>

</div>
<?php $this->load->view('public/must/footer'); ?>