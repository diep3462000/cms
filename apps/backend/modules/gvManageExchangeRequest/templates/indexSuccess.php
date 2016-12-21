<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gvManageExchangeRequest/assets') ?>
<?php include_partial('gvManageExchangeRequest/header') ?>



<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('gvManageExchangeRequest/list_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            
            <div class="span12">
            <h1 style="display: inline"><?php echo __('Thống kê đổi thưởng: ', array(), 'messages') ?></h1>


            </div>
            <div class="row-fluid">
                <div class="span6">
                                  <?php include_partial('gvManageExchangeRequest/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
                                </div>

                <div class="span6">
                    <!-- ID Vẽ biểu đồ đăng ký tài khoản -->
                    <div id="piechart_pub_register" style="width: 100%; height: 500px"></div>
                </div>
<!--                <div class="span3">-->
<!--                    <div class="pull-right">--><?php //include_partial('gvManageExchangeRequest/list_actions', array('helper' => $helper)) ?><!--</div>-->
<!--                </div>-->
            </div>


            <h3 style="display: inline"><?php echo __('Tổng tiền nạp: ', array(), 'messages') ?><?php echo VtHelper::number_format($sum_ken_nap["sum_money"]) ?> VNĐ</h3></br>
            <h3 style="display: inline"><?php echo __('Tổng Ken nạp: ', array(), 'messages') ?><?php echo VtHelper::number_format($sum_ken_nap["sum_cash"]) ?> Ken</h3></br>
            <h3 style="display: inline"><?php echo __('Tổng đổi thưởng: ', array(), 'messages') ?><?php echo VtHelper::number_format($sum_money) ?> VNĐ(<?php echo number_format($sum_ken_nap["sum_cash"] != 0 ? $sum_money / $sum_ken_nap["sum_cash"] * 100 : 0, 2, '.', '') ?>%)</h3></br>
            <h3 style="display: inline"><?php echo __('Tổng Ken trong game: ', array(), 'messages') ?><?php echo VtHelper::number_format($sum_xu_ken["sum_cash"]) ?> Ken</h3></br>
            <h3 style="display: inline"><?php echo __('Tổng Xu: ', array(), 'messages') ?><?php echo VtHelper::number_format($sum_xu_ken["sum_gold"]) ?> Xu</h3>
            <?php include_partial('gvManageExchangeRequest/flashes') ?>
            
            <div id="sf_admin_header">
                <?php include_partial('gvManageExchangeRequest/list_header', array('pager' => $pager)) ?>
            </div>

            <div id="sf_admin_content">
                
                <?php include_partial('gvManageExchangeRequest/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>

                <div>
                    <?php include_partial('gvManageExchangeRequest/list_batch_actions', array('helper' => $helper)) ?>
                </div>
                
                <form class="form-inline" method="get" action="<?php echo url_for('exchange_asset_request') ?>">
                    <div class="well pull-right">
                      <?php echo __('Số bản ghi/trang: ')?>
                        <?php $select = new sfWidgetFormChoice(array(
                                        'multiple' => false,
                                        'expanded' => false,
                                        'choices' => array('10' => __('10', null, 'tmcTwitterBootstrapPlugin'), 20 => 20, 30 => 30, 50 => 50, 100 => 100)
                                    ),
                                    array('class' => 'input-medium')); echo $select->render('max_per_page', $sf_user->getAttribute('gvManageExchangeRequest.max_per_page', null, 'admin_module')) ?>
                        <input type="submit" class="btn btn-inverse btn-small" value="<?php echo __('Go', array(), 'tmcTwitterBootstrapPlugin') ?>" />
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>

            <?php include_partial('gvManageExchangeRequest/list_footer', array('pager' => $pager)) ?>
        </div>
    </div>
</div>

<?php include_partial('gvManageExchangeRequest/footer') ?>
<script type="text/javascript" src="/css/jsapi.css"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var formatter = new google.visualization.NumberFormat({
            pattern: '###,###'
        });

        //Hình 3: Thông tin rút thẻ theo ngày
        var array_develop_info = new Array(["<?php echo __('Ngày') ?>", "<?php echo __('Tổng tiền rút ra') ?>"]);
        <?php foreach($purchase_arr as $day => $value):?>
        array_develop_info.push(['<?php echo $day;  ?>', Number('<?php echo $value ?>') ]);
        <?php endforeach ?>
        var data_develop_info = google.visualization.arrayToDataTable(array_develop_info);
        formatter.format(data_develop_info, 1);
        var options_develop_info = {
            title: '<?php echo __('Tổng tiền rút ra') ?>',
            is3D: true,
            hAxis: {title: 'BIGKEN',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };
        var chart_develop_info = new google.visualization.ColumnChart(document.getElementById('piechart_pub_register'));
        chart_develop_info.draw(data_develop_info, options_develop_info);
    }
</script>
