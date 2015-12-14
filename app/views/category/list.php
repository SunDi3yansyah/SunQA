<title>Categories - <?php echo $this->config->item('web_name'); ?></title>
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
            <div class="align-center" style="padding-top: 40px; padding-bottom: 10px;">
                <div class="grid">
                    <div class="row cells2">
                    <?php foreach ($categories as $cat): ?>
                        <div class="cell no-overflow" style="margin: 0;">
                            <div class="bg-random fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 10px;">
                                <h2 class="text-light"><a class="fg-white" href="<?php echo base_url($this->uri->segment(1) .'/'. uri_encode($cat->category_name)) ?>"><?php echo $cat->category_name ?></a></h2>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>