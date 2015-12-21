<?php foreach ($this->qa_libs->user() as $user): ?>
<title>Account - <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="page-content">
        <div class="container">
            <div class="align-left" style="padding-top: 40px; padding-bottom: 10px;">
                <div class="grid">
                    <div class="row cells12">
                        <?php $this->load->view('auth/menu'); ?>
                        <div class="cell colspan9">
                            <div class="panel">
                                <div class="heading">
                                    <span class="icon mif-home"></span>
                                    <span class="title">Account Information</span>
                                </div>
                                <div class="content messages">
                                    <div class="grid">
                                        <div class="row cells4">
                                            <div class="cell">
                                                <img src="<?php echo pic_user($user->image) ?>" data-role="fitImage" data-format="cycle">
                                            </div>
                                            <div class="cell colspan3">
                                                <h3><?php echo $user->nama ?></h3>
                                                <span class="mif-user"></span> <a href="<?php echo base_url('user/'. $user->username); ?>"><?php echo $user->username ?></a>
                                                <br>
                                                <span class="mif-envelop"></span> <a href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table hovered">
                                        <tbody>
                                            <tr>
                                                <td>Web</td>
                                                <td><span class="mif-home"></span> <a href="<?php echo qa_domain($user->web) ?>" target="_blank"><?php echo $user->web ?></a></td>
                                            </tr>
                                            <tr>
                                                <td>Location</td>
                                                <td><span class="mif-earth"></span> <?php echo $user->lokasi ?></td>
                                            </tr>
                                            <tr>
                                                <td>Registration</td>
                                                <td><?php echo dateHourIcon($user->user_date) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Last Login</td>
                                                <td><?php echo dateHourIcon($user->last_login) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Last IP</td>
                                                <td><span class="mif-vpn-lock"></span> <?php echo $user->last_ip ?></td>
                                            </tr>
                                            <tr>
                                                <td>Last Modified</td>
                                                <td><?php echo dateHourIcon($user->modified) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div style="margin-left: 15px;">
                                        <blockquote>
                                            <p><?php echo $user->bio ?></p>
                                            <small><i><?php echo $user->nama ?></i></small>
                                        </blockquote>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>