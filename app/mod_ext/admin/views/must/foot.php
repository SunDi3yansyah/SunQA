    </div>
<script src="<?php echo base_url($this->config->item('private_js') . 'jquery.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'metisMenu.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'raphael-min.js'); ?>"></script>
<?php if (isset($dataTables) == TRUE): ?>
<script src="<?php echo base_url($this->config->item('private_js') . 'jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'dataTables.bootstrap.min.js'); ?>"></script>
<?php endif ?>
<?php if (isset($morrisjs) == TRUE): ?>
<script src="<?php echo base_url($this->config->item('private_js') . 'morris.min.js'); ?>"></script>
<script src="<?php echo base_url($this->uri->segment(1) . '/javascript/jsmorris_data'); ?>"></script>
<?php endif ?>
<script src="<?php echo base_url($this->config->item('private_js') . 'script.js'); ?>"></script>
<?php if (isset($dataTables) == TRUE): ?>
<script>
$(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    $("#qa-dataTables").DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/ajax'); ?>",
        "columns": [
<?php for ($i=0; $i < count($dtFields); $i++): ?>
            { "data": "<?php echo $dtFields[$i] ?>" },
<?php endfor ?>
            {
                "class": "text-center",
                "data": "action"
            }
        ],
        "order": [[1, "asc"]],
        "rowCallback": function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $("td:eq(0)", row).html(index);
        }
    });
});
</script>
<?php endif ?>
</body>
</html>