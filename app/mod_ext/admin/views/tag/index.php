<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(2) ?>
                <div class="pull-right">
                    <a href="<?php echo base_url($this->uri->segment(1) .'/'. $this->uri->segment(2) .'/create') ?>" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> New Create</a>
                </div>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data <?php echo $this->uri->segment(2) ?>
                    <div class="pull-right">
                        <button type="button" id="fnReloadAjax" class="btn btn-success btn-xs">Refresh</button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="qa-dataTables">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tag</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>