    </div>
<script src="<?php echo base_url($this->config->item('private_js') . 'jquery.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'select2.min.js'); ?>"></script>
<script>
$(document).ready(function()
{
    $("select").select2();
});
</script>
<script src="<?php echo base_url($this->config->item('private_js') . 'metisMenu.min.js'); ?>"></script>
<?php if (isset($dataTables) == TRUE): ?>
<script src="<?php echo base_url($this->config->item('private_js') . 'jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'fnReloadAjax.js'); ?>"></script>
<script>
$(document).ready(function()
{
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
    {
        return {
            "iStart"         : oSettings._iDisplayStart,
            "iEnd"           : oSettings.fnDisplayEnd(),
            "iLength"        : oSettings._iDisplayLength,
            "iTotal"         : oSettings.fnRecordsTotal(),
            "iFilteredTotal" : oSettings.fnRecordsDisplay(),
            "iPage"          : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages"    : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    $("#qa-dataTables").DataTable(
    {
        "responsive"        : true,
        "processing"        : true,
        "serverSide"        : true,
        "ajax"              : "<?php echo base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.(isset($param_ajax)?$param_ajax:'ajax')); ?>",
        "columns"           : [
<?php for ($i=0; $i < count($dtFields); $i++): ?>
            { "data" : "<?php echo $dtFields[$i] ?>" },
<?php endfor ?>
            {
                "class"     : "text-center",
                "data"      : "action",
                "orderable" : false
            }
        ],
        "order"             : [[1, "desc"]],
        "rowCallback"       : function (row, data, iDisplayIndex)
        {
            var info   = this.fnPagingInfo();
            var page   = info.iPage;
            var length = info.iLength;
            var index  = page * length + (iDisplayIndex + 1);
            $("td:eq(0)", row).html(index);
        },
        "bLengthChange"     : false,
        "bInfo"             : false,
        "oLanguage"         : { "sSearch" : "Pencarian " }
    });
    $("#fnReloadAjax").click(function() {
        var table = $("#qa-dataTables").dataTable();
        table.fnReloadAjax("<?php echo base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.(isset($param_ajax)?$param_ajax:'ajax')); ?>");
        table.fnReloadAjax();
    });
});
</script>
<?php endif ?>
<?php if (isset($morrisjs) == TRUE): ?>
<script src="<?php echo base_url($this->config->item('private_js') . 'raphael-min.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('private_js') . 'morris.min.js'); ?>"></script>
<script src="<?php echo base_url($this->uri->segment(1) . '/javascript/jsmorris_data'); ?>"></script>
<?php endif ?>
<script src="<?php echo base_url($this->config->item('private_js') . 'script.js'); ?>"></script>
</body>
</html>