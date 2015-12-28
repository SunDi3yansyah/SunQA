<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(2) ?>
                <div class="pull-right">
                    <a href="<?php echo base_url('user/' . $this->qa_libs->username()) ?>" target="_blank" class="btn btn-primary"><i class="fa fa-user"></i> See My Profile on Public</a>
                </div>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Data <?php echo $this->uri->segment(2) ?>
                </div>
                <div class="panel-body">
                    <?php foreach ($this->qa_libs->user() as $user): ?>
                        <div class="table-responsive table-bordered">
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
                                        <td><?php echo dateHourIconPrivate($user->user_date) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last Login</td>
                                        <td><?php echo dateHourIconPrivate($user->last_login) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last IP</td>
                                        <td><?php echo $user->last_ip ?></td>
                                    </tr>
                                    <tr>
                                        <td>Modified</td>
                                        <td><?php echo dateHourIconPrivate($user->modified) ?></td>
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
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Bio
                            </div>
                            <div class="panel-body">
                                <p><?php echo $user->bio ?></p>
                            </div>
                        </div>
                        <a href="<?php echo base_url($this->uri->segment(1) . '/user/update/' . $this->qa_libs->id_user()); ?>" class="btn btn-outline btn-primary">Update Profile</a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>