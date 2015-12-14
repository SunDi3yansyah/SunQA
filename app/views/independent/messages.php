<title><?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="page-content">
        <div class="bg-darkBlue fg-white align-center">
            <div class="container">
                <div class="no-overflow land-bar">
                    <h1 class="text-shadow metro-title text-light land-bar-title capitalize"><?php echo $this->config->item('web_name') ?></h1>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="fg-dark">
            <div class="container">
                <div class="latest-question">
                    <div class="panel success">
                        <div class="heading">
                            <span class="icon mif-bell"></span>
                            <span class="title">Messages - <?php echo $this->config->item('web_name') ?></span>
                        </div>
                        <div class="content messages">
                            <?php if (!empty($messages)): ?>
                                <?php echo $messages ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>