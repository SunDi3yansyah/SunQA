<title>Users - <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="page-content">
        <div class="bg-darkBlue fg-white align-center">
            <div class="container">
                <div class="no-overflow land-bar">
                    <h1 class="text-shadow metro-title text-light land-bar-title capitalize"><?php echo $this->uri->segment(1) ?></h1>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="warapper-border align-center" data-text="users - <?php echo $this->config->item('web_name'); ?>" style="margin: 50px 0;">
                <div class="grid">
                    <?php foreach ($user as $user): ?>
                    <div class="row cells6">
                        <div class="cell">
                            <img src="<?php echo pic_user($user->image) ?>" data-role="fitImage" data-format="cycle">
                        </div>
                        <div class="cell colspan5">
                            <div class="fl">
                                <h3><?php echo $user->nama ?></h3> <span class="tag info"><span class="mif-bookmark"></span> <?php echo $user->role_name ?></span>
                                <span class="mif-user"></span> <a class="QuestionList-author" href="<?php echo base_url('user/' . $user->username); ?>"><?php echo $user->username ?></a>
                                ─
                                <span class="mif-mail"></span> <?php echo mailto($user->email, NULL, 'class="QuestionList-author"') ?>
                                <p>Registered <?php echo dateHourIcon($user->user_date) ?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>