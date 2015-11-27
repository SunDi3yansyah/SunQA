<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="<?php echo base_url(); ?>"><?php echo $this->config->item('web_name'); ?></a>
        <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="<?php echo base_url('activities'); ?>" class="pure-menu-link">Activities</a></li>
            <li class="pure-menu-item"><a href="<?php echo base_url('questions'); ?>" class="pure-menu-link">Questions</a></li>
            <li class="pure-menu-item"><a href="<?php echo base_url('unanswereds'); ?>" class="pure-menu-link">Unanswereds</a></li>
            <?php if ($this->qa_libs->logged_in()): ?>
                <?php $this->load->view('public/must/login'); ?>
            <?php else: ?>
                <?php $this->load->view('public/must/not_login'); ?>
            <?php endif ?>
        </ul>
    </div>
</div>