<header class="app-bar fixed-top" data-role="appbar">
    <div class="container">
        <a href="<?php echo base_url(); ?>" class="app-bar-element branding"><img src="<?php echo base_url('assets/images/qa.png'); ?>" style="height: 28px; display: inline-block; margin-right: 10px;"> <?php echo $this->config->item('web_name'); ?></a>
        <ul class="app-bar-menu">
            <li>
                <a href="<?php echo base_url('activities'); ?>">Activities</a>
            </li>
            <li>
                <a href="<?php echo base_url('questions'); ?>">Questions</a>
            </li>
            <li>
                <a href="<?php echo base_url('unanswereds'); ?>">Unanswereds</a>
            </li>
        </ul>
        <?php if ($this->qa_libs->logged_in()): ?>
            <?php $this->load->view('public/must/login'); ?>
        <?php else: ?>
            <?php $this->load->view('public/must/not_login'); ?>
        <?php endif ?>
    </div>
</header>
