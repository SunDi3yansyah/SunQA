<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(2) ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Data <?php echo $this->uri->segment(2) ?>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#question" data-toggle="tab">Question</a></li>
                        <li><a href="#answer" data-toggle="tab">Answer</a></li>
                        <li><a href="#comment" data-toggle="tab">Comment</a></li>
                        <li><a href="#vote" data-toggle="tab">Vote</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile">
                        <?php foreach ($this->qa_libs->user() as $user): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%;">Atribut</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Username</td>
                                            <td><?php echo $user->username ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?php echo $user->nama ?></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><i>Hide</i></td>
                                        </tr>
                                        <tr>
                                            <td>Activated</td>
                                            <td>
                                                <?php if ($user->activated === '1'): ?>
                                                    Activated
                                                <?php else: ?>
                                                    Not Activated
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Web</td>
                                            <td><a href="http://<?php echo $user->web ?>" target="_blank"><?php echo $user->web ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td><?php echo $user->lokasi ?></td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td><?php echo $user->role_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Registered</td>
                                            <td><?php echo dateHourIcon($user->user_date) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Login</td>
                                            <td><?php echo dateHourIcon($user->last_login) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last IP</td>
                                            <td><?php echo $user->last_ip ?></td>
                                        </tr>
                                        <tr>
                                            <td>Modified</td>
                                            <td><?php echo dateHourIcon($user->modified) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Lost Password</td>
                                            <td><?php if ($user->lost_password != NULL): ?>
                                                    <?php echo $user->lost_password ?>
                                                <?php else: ?>
                                                    <i>Nothing</i>
                                                <?php endif ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Bio
                                </div>
                                <div class="panel-body">
                                    <p><?php echo $user->bio ?></p>
                                </div>
                            </div>
                            <a href="<?php echo base_url('account/settings'); ?>" class="btn btn-outline btn-primary">Update Profile</a>
                            <a href="<?php echo base_url('account/settings'); ?>" class="btn btn-outline btn-info">Change Username or Email</a>
                            <a href="<?php echo base_url('account/settings'); ?>" class="btn btn-outline btn-warning">Change Password</a>
                        <?php endforeach ?>
                        </div>
                        <div class="tab-pane fade" id="question">
                            <h4>Profile Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="answer">
                            <h4>Messages Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="comment">
                            <h4>Settings Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="vote">
                            <h4>Settings Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>