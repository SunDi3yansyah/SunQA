$(function()
{
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "User",
            value: <?php echo $this->qa_libs->count_user() ?>
        }, {
            label: "Administrator",
            value: <?php echo $this->qa_libs->count_admin() ?>
        }, {
            label: "Not Active",
            value: <?php echo $this->qa_libs->count_not_activated() ?>
        }],
        resize: true
    });

});
