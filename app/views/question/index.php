<?php foreach ($question as $ask): ?>
<title><?php echo $ask->subject ?> - Question - <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="container page-content">
        <h1 class="title_qa"><?php echo $ask->subject ?></h1>
        <div class="example" data-text="Question">
            <div class="grid">
                <div class="row cells6">
                    <div class="cell">
                        <img src="<?php echo pic_user($ask->image) ?>" data-role="fitImage" data-format="cycle">
                    </div>
                    <div class="fl">
                        <h3><?php echo $ask->nama ?></h3>
                        <a class="QuestionList-author" href="<?php echo base_url('user/' . $ask->username); ?>">@<?php echo $ask->username ?></a>
                        <p><?php echo dateHourIcon($ask->question_date) ?></p>
                        <a href="<?php echo base_url('category/' . $ask->category_name); ?>" class="button danger"><?php echo $ask->category_name ?></a>
                    </div>
                    <div class="fr vote">
                        <a href="#"><span class="mif-thumbs-up mif-ani-bounce"></span></a>
                        <a href="#"><span class="mif-thumbs-down mif-ani-bounce"></span></a>
                        <?php if (!empty($ask->viewers)): ?>
                            <p style="margin-right: 10px; font-size: 17px;"><i class="mif-eye"></i> <?php echo $ask->viewers ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <p class="bg-grayLighter padding10" style="line-height: 25px;">
                <?php echo $ask->description_question ?>
                <hr>
                <?php if (!empty($ask->question_update)): ?>
                    <i>laste update</i> <?php echo dateHourIcon($ask->question_update) ?>
                <?php endif ?>
            </p>
        </div>
        <div class="example" data-text="Answers">
            <div class="grid">
                <div class="row ">
                    <div class="cell">
                        <ul class="step-list">
                            <li>
                                <strong class="no-margin-top">Improve user sign-in experience</strong>
                                <hr class="bg-orange">
                                <div>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea quas nihil est maiores voluptatem suscipit consequatur repellat fugiat, ipsum quos ullam aliquid aspernatur optio, voluptates molestias nam nisi esse? Quo!
                                </div>
                                    <ul class="step-list">
                                        <li>
                                            <strong class="no-margin-top">Improve user sign-in experience</strong>
                                            <hr class="bg-black">
                                            <div>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea quas nihil est maiores voluptatem suscipit consequatur repellat fugiat, ipsum quos ullam aliquid aspernatur optio, voluptates molestias nam nisi esse? Quo!
                                            </div>
                                        </li>
                                        <li>
                                            <strong class="no-margin-top">Integrate with your local directory</strong>
                                            <hr class="bg-black">
                                            <div>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, vero atque? Nam eum a dolor voluptatibus provident ad sit iusto in illum, vitae dolore amet earum tempore ipsa ex asperiores!
                                            </div>
                                        </li>
                                    </ul>
                            </li>
                            <li>
                                <strong class="no-margin-top">Integrate with your local directory</strong>
                                <hr class="bg-orange">
                                <div>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, vero atque? Nam eum a dolor voluptatibus provident ad sit iusto in illum, vitae dolore amet earum tempore ipsa ex asperiores!
                                </div>
                            </li>
                            <li>
                                <strong class="no-margin-top">Get Azure AD Premium</strong>
                                <hr  class="bg-orange">
                                <div>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique minus, tempore quod, molestiae odio nisi mollitia rerum itaque est cumque provident debitis iusto, tempora voluptates molestias ipsum a in nesciunt.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>