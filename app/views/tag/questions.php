<?php foreach ($tag as $tag): ?>
<title><?php echo $tag->tag_name ?> - <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="page-content">
        <div class="bg-darkBlue fg-white align-center">
            <div class="container">
                <div class="no-overflow land-bar">
                    <h1 class="text-shadow metro-title text-light land-bar-title capitalize"><?php echo $tag->tag_name ?></h1>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="fg-dark">
            <div class="container">
                <div class="latest-question">
                    <?php foreach ($questions as $q): ?>
                    <section class="QuestionList">
                        <header class="QuestionList-header">
                            <img class="QuestionList-avatar" alt="" height="48" width="48" src="<?php echo pic_user($q->image) ?>">
                            <h3 class="QuestionList-title"><a href="<?php echo base_url('question/' . $q->url_question) ?>"><?php echo $q->subject ?></a></h3>
                            <p class="QuestionList-meta">
                                By <a class="QuestionList-author" href="<?php echo base_url('user/' . $q->username); ?>"><?php echo $q->nama ?></a> under <a class="QuestionList-category QuestionList-category-js" href="<?php echo base_url('category/' . $q->category_name); ?>"><?php echo $q->category_name ?></a>
                            </p>
                        </header>
                        <div class="QuestionList-description">
                            <p>
                                <?php echo qa_remove_html_limit($q->description_question, 100) ?>
                            </p>
                        </div>
                    </section>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>