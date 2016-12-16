<?php use_helper('I18N', 'Date') ?>
<?php include_partial('bkManageDoanhThuNgay/assets') ?>
<?php include_partial('bkManageDoanhThuNgay/header') ?>



<div class="container-fluid">
    <div class="span6">
        <!-- ID Vẽ biểu đồ loại hệ điều hành -->
        <div id="piechart_pub_type" style="width: 600px; height: 280px; top: -600px;"></div>
    </div>
    <!--    <div class="span6">-->
    <!--        <!-- ID Vẽ biểu đồ trạng thái thông tin về developer -->-->
    <!--        <div id="piechart_pub_status" style="width: 600px; height: 280px; top: -240px;"></div>-->
    <!--    </div>-->
    <div class="span12">
        <!-- ID Vẽ biểu đồ đăng ký tài khoản -->
        <div id="piechart_pub_register" style="width: 100%; height: 500px"></div>
    </div>
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('bkManageDoanhThuNgay/list_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            
            <div class="span12">
            <h1 style="display: inline"><?php echo __('Doanh thu tổng hợp', array(), 'messages') ?></h1>
            </div>
            <div class="row-fluid">
                <div class="span9">
                                  <?php include_partial('bkManageDoanhThuNgay/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
                                </div>
                <div class="span3">
                    <div class="pull-right"><?php include_partial('bkManageDoanhThuNgay/list_actions', array('helper' => $helper)) ?></div>
                </div>
            </div>
            

            <?php include_partial('bkManageDoanhThuNgay/flashes') ?>
            
            <div id="sf_admin_header">
                <?php include_partial('bkManageDoanhThuNgay/list_header', array('pager' => $pager)) ?>
            </div>

            <div id="sf_admin_content">
                
                <?php include_partial('bkManageDoanhThuNgay/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>

                <div>
                    <?php include_partial('bkManageDoanhThuNgay/list_batch_actions', array('helper' => $helper)) ?>
                </div>
                
                <form class="form-inline" method="get" action="<?php echo url_for('doanh_thu_ngay_linh') ?>">
                    <div class="well pull-right">
                      <?php echo __('Số bản ghi/trang: ')?>
                        <?php $select = new sfWidgetFormChoice(array(
                                        'multiple' => false,
                                        'expanded' => false,
                                        'choices' => array('10' => __('10', null, 'tmcTwitterBootstrapPlugin'), 20 => 20, 30 => 30, 50 => 50, 100 => 100)
                                    ),
                                    array('class' => 'input-medium')); echo $select->render('max_per_page', $sf_user->getAttribute('bkManageDoanhThuNgay.max_per_page', null, 'admin_module')) ?>
                        <input type="submit" class="btn btn-inverse btn-small" value="<?php echo __('Go', array(), 'tmcTwitterBootstrapPlugin') ?>" />
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>

            <?php include_partial('bkManageDoanhThuNgay/list_footer', array('pager' => $pager)) ?>
        </div>
    </div>
</div>

<?php include_partial('bkManageDoanhThuNgay/footer') ?>

<script type="text/javascript" src="/css/jsapi.css"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var formatter = new google.visualization.NumberFormat({
            pattern: '###,###'
        });

        //Hình 1: Loại nhà phát triển
        var array_type = new Array(['Task', '<?php echo __('Loại hệ điều hành')?>']);
        <?php foreach ($total_by_type as $value) {?>
        array_type.push(['<?php echo $value['type'] == 1? "Thẻ cào" : "SMS"?>', <?php echo $value['sum_money']; ?>]);
        <?php } ?>
        var data_api = google.visualization.arrayToDataTable(array_type);
        formatter.format(data_api, 1);
        var options_api = {
            title: '<?php echo __('Doanh thu theo loại')?>',
            is3D: true
        };
        var chart_api = new google.visualization.PieChart(document.getElementById('piechart_pub_type'));
        chart_api.draw(data_api, options_api);

        //Hình 3: Thông tin doanh thu theo ngay
        var array_develop_info = new Array(["<?php echo __('Ngày') ?>", "<?php echo __('SMS') ?>", "<?php echo __('Thẻ cào') ?>", "<?php echo __('Tổng Ken nạp vào game') ?>"]);
        <?php foreach($purchase_arr as $day => $value):?>
            array_develop_info.push(['<?php echo $day;  ?>', Number('<?php echo $value[2][0] ?>'), Number('<?php echo $value[1][0] ?>'), Number('<?php echo (int)$value[1][1] + (int)$value[2][1]  ?>') ]);
        <?php endforeach ?>
        var data_develop_info = google.visualization.arrayToDataTable(array_develop_info);
        formatter.format(data_develop_info, 1);
        var options_develop_info = {
            title: '<?php echo __('Thống kê doanh thu theo ngày') ?>',
            is3D: true,
            hAxis: {title: 'BIGKEN',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };
        var chart_develop_info = new google.visualization.ColumnChart(document.getElementById('piechart_pub_register'));
        chart_develop_info.draw(data_develop_info, options_develop_info);
    }
</script>
