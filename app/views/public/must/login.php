<?php foreach ($this->qa_libs->user() as $user): ?>
<div class="app-bar-element place-right">
    <a class="dropdown-toggle fg-white"><?php echo $user->username; ?></a>
    <ul class="d-menu place-left" data-role="dropdown">
        <li><a href="<?php echo base_url('auth/account'); ?>"><span class="mif-user"></span> Account</a></li>
        <li><a href="<?php echo base_url('log/out'); ?>"><span class="mif-exit"></span> Logout</a></li>
    </ul>
</div>
<?php endforeach ?>