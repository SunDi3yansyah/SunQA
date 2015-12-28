<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $this->uri->segment(3) ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $this->uri->segment(3) ?>
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger">
                        <?php if (isset($message)): ?>
                            <?php echo $message ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>