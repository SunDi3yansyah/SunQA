<title>Activities - <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('public/must/menu'); ?>
    <div class="page-content">
        <div class="bg-darkBlue fg-white align-center">
            <div class="container">
                <div class="no-overflow land-bar">
                    <h1 class="text-shadow metro-title text-light land-bar-title capitalize"><?php echo $this->uri->segment(1) ?></h1>
                </div>
            </div>
        </div>
        <div class="fg-dark">
            <div class="container">
                <div class="latest-question">
                </div>
            </div>
        </div>
    </div>