<title>Welcome to <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('public/must/menu'); ?>
    <div class="page-content">
        <div class="bg-lightBlue fg-white align-center">
            <div class="container">
                <div class="no-overflow land-bar">
                    <div class="padding10 sub-leader text-light">
                        <?php echo $this->lang->line('welcome') ?>
                    </div>
                    <h1 class="text-shadow metro-title text-light land-bar-title"><?php echo $this->config->item('web_name') ?></h1>
                    <p class="padding10 land-bar-description">
                        <?php echo $this->config->item('description_home') ?>
                    </p>
                    <div class="margin50">
                        <div class="clear-float">
                            <a href="<?php echo base_url('question/create'); ?>"><button class="button big-button block-shadow success"><span class="mif-question mif-ani-shuttle"></span> Getting Started Question</button></a>
                        </div>
                    </div>
                    <div class="grid no-margin-bottom" id="g1">
                        <div class="row cells3">
                            <div class="cell no-overflow" style="height: 85px">
                                <div class="bg-yellow fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 85px;">
                                    <h2 class="text-light">easy to use</h2>
                                </div>
                            </div>
                            <div class="cell no-overflow" style="height: 85px">
                                <div class="bg-green fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 85px;">
                                    <h2 class="text-light">less source</h2>
                                </div>
                            </div>
                            <div class="cell no-overflow" style="height: 85px">
                                <div class="bg-red fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 85px;">
                                    <h2 class="text-light">mit license</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function(){
                            setTimeout(function(){
                                $("#g1 .cell > div:eq(0)").animate({
                                    'margin-top': 0
                                }, 500, 'easeOutBounce');
                                $("#g1 .cell > div:eq(1)").animate({
                                    'margin-top': 0
                                }, 1000, 'easeOutBounce');
                                $("#g1 .cell > div:eq(2)").animate({
                                    'margin-top': 0
                                }, 1500, 'easeOutBounce');
                            }, 500);
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="fg-dark">
            <div class="container">
                <div style="padding-top: 40px; padding-bottom: 10px;">
                    <div class="grid">
                        <div class="row cells3">
                            <div class="cell no-phone">
                                <div class="image-container bordered">
                                    <div class="frame">
                                        <img src="<?php echo assets_img('qa.png'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="cell colspan2" style="padding-left: 20px">
                                <h1 class="">Whats is <?php echo $this->config->item('web_name'); ?></h1>
                                <ol class="numeric-list square-marker">
                                    <li>compatible with <strong>Angular<span class="fg-red">JS</span></strong> and <strong>Require<span class="fg-red">JS</span></strong></li>
                                    <li>full code refactoring &amp; new components</li>
                                    <li>declarative approach to the definition of components</li>
                                    <li>framework itself monitors components, pressure via ajax</li>
                                    <li>create cool page without knowledge of javascript</li>
                                    <li>support classic approach to definition of components</li>
                                </ol>
                                <p class="no-display">
                                The main feature in version 3 is: a declarative approach to the definition and initialization of components, and the framework itself monitors components, pressure via ajax. When a declarative definition of all component parameters are set via data-* attributes, including methods and events of the component. This approach allows to further separate html and javascript code. Now that would determine which component do not need to know javascript :). It is still possible to determine which component directly via javascript.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-question">
                    <h2>Latest Question</h2>
                    <hr class="thin">
                    <?php foreach ($latest_question as $lq): ?>
                    <section class="QuestionList">
                        <header class="QuestionList-header">
                            <img class="QuestionList-avatar" alt="" height="48" width="48" src="<?php echo pic_user($lq->image) ?>">
                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $lq->url_question) ?>"><?php echo $lq->subject ?></a></h3>
                            <p class="QuestionList-meta">
                                By <a class="QuestionList-author" href="<?php echo base_url('user/' . $lq->username); ?>"><?php echo $lq->nama ?></a> under <a class="QuestionList-category QuestionList-category-js" href="<?php echo base_url('category/' . $lq->category_name); ?>"><?php echo $lq->category_name ?></a>
                            </p>
                        </header>
                        <div class="QuestionList-description">
                            <p>
                                <?php echo qa_remove_html_limit($lq->description_question, 100) ?>
                            </p>
                        </div>
                    </section>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="bg-steel no-tablet-portrait no-phone">
            <div class="container padding20 fg-white">
                <div class="carousel bg-transparent" data-role="carousel" data-controls="false" data-markers="false" data-effect="fade" data-height="200">
                    <div class="slide fg-white">
                        <div class="place-left" style="margin-right: 20px">
                            <img src="<?php echo assets_img('qa.png'); ?>" style="height: 200px">
                        </div>
                        <h1>Developed with advice</h1>
                        <p>Metro UI CSS developed with the advice of Microsoft to build the user interface and include: general styles, grid, layouts, typography, 20+ components, 300+ built-in icons.</p>
                        <p>Metro UI CSS build with {LESS}. Metro UI CSS is open source and has MIT licensing model.</p>
                    </div>
                    <div class="slide fg-white">
                        <div class="place-left" style="margin-right: 20px">
                            <img src="<?php echo assets_img('qa.png'); ?>" style="height: 200px">
                        </div>
                        <h1>BizSpark Startup</h1>
                        <p>Metro UI CSS is a BizSpark Startup. Microsoft BizSpark is a global program that helps software startups succeed by giving them access to software development tools, connecting them with key industry players, and providing marketing visibility.</p>
                        <p>BizSpark provides free software, support, and visibility to help startups succeed. Join BizSpark and become part of a global community that has over 50,000 members in 100+ countries.</p>
                        <a class="button primary" href="http://bizspark.com">Join the BizSpark Program now</a>
                    </div>
                    <div class="slide fg-white">
                        <div class="place-left" style="margin-right: 20px">
                            <img src="<?php echo assets_img('qa.png'); ?>" style="height: 200px">
                        </div>
                        <h1>Thanks to JetBrains</h1>
                        <p>Thanks to the company JetBrains for supporting the project in the form of a license for a great product PhpStorm.</p>
                        <a class="button success" href="http://www.jetbrains.com/phpstorm/">Get PhpStorm now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>