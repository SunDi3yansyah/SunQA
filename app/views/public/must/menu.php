<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="<?php echo base_url(); ?>"><?php echo $this->config->item('web_name'); ?></a>
        <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="<?php echo base_url('activities'); ?>" class="pure-menu-link">All Activities</a></li>
            <li class="pure-menu-item"><a href="<?php echo base_url('question'); ?>" class="pure-menu-link">Question</a></li>
            <li class="pure-menu-item"><a href="<?php echo base_url('unanswered'); ?>" class="pure-menu-link">Unanswered</a></li>
            <li class="pure-menu-item"><a href="<?php echo base_url('auth/sign_up'); ?>" class="pure-menu-link">Sign up</a></li>
            <li class="pure-menu-item"><a href="<?php echo base_url('log_in'); ?>" class="pure-menu-link">Log in</a></li>
        </ul>
    </div>
</div>