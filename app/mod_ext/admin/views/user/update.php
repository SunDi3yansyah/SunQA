<?php foreach ($record_join as $data): ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(3) ?> <?php echo $this->uri->segment(2) ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Informations
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-7">
                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif ?>
                            <?php echo form_open($this->uri->uri_string(), 'role="form"'); ?>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <?php echo form_input('nama', $data->nama, 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <?php
                                    foreach ($role as $r)
                                    {
                                        $role_id[] = array(
                                            $r->id_role => $r->role_name,
                                            );
                                    }
                                    ?>
                                    <?php echo form_dropdown('role_id', $role_id, $data->role_id, 'class="form-control"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Activated</label>
                                    <?php $activated = array('0' => 'Not Activated','1' => 'Activated'); ?>
                                    <?php echo form_dropdown('activated', $activated, $data->activated, 'class="form-control"'); ?>
                                </div>
                                    <label>Web</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                    <?php echo form_input('web', $data->web, 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <?php echo form_input('lokasi', $data->lokasi, 'class="form-control" autocomplete="off"') ?>
                                </div>
                                <div class="form-group">
                                    <label>Bio</label>
                                    <?php echo form_textarea('bio', $data->bio, 'class="form-control"'); ?>
                                </div>
                                <?php echo form_submit(NULL, 'Submit', 'class="btn btn-success"'); ?>
                                <?php echo form_reset(NULL, 'Reset', 'class="btn btn-warning"'); ?>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-5">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Other Informations
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Registered : <b><?php echo dateHourStripe($data->user_date) ?></b></li>
                                        <li>Last Login : <b><?php echo dateHourStripe($data->last_login) ?></b></li>
                                        <li>Last IP Address : <b><?php echo $data->last_ip ?></b></li>
                                        <li>Last Modified : <b><?php echo dateHourStripe($data->modified) ?></b></li>
                                        <li>Lost Password : <?php if ($data->lost_password != NULL): ?><?php echo $data->lost_password ?><?php else: ?><b>Nothing</b><?php endif ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="fc">
                                <a href="<?php echo base_url('user/' . $data->username) ?>" target="_blank" class="btn btn-primary btn-lg">See <?php echo $this->uri->segment(2) ?></a>
                                <hr>
                                <a href="<?php echo base_url($this->uri->segment(1) . '/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/username'); ?>" class="btn btn-outline btn-info">Change Username</a>
                                <a href="<?php echo base_url($this->uri->segment(1) . '/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/email'); ?>" class="btn btn-outline btn-info">Change Email</a>
                                <a href="<?php echo base_url($this->uri->segment(1) . '/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/password'); ?>" class="btn btn-outline btn-warning">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>