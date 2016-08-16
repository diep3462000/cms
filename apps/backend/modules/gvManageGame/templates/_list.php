<div class="sf_admin_list">
    <table class="datatable table table-bordered table-striped" id="table_gv_manage_game" style="margin-top: 5px !important;">
      <thead>
          <tr>
<!--                        <th Gameid="sf_admin_list_batch_actions" style="...">-->
<!--                            <input Gameid="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" />-->
<!--                        </th>-->
          
          <?php include_partial('gvManageGame/list_th_tabular', array('sort' => $sort)) ?>

                    </tr>
      </thead>
      <?php if (!$pager->getNbResults()): ?>
      <tbody>
        <tr>
          <th colspan="6">
            <?php echo __('No results', array(), 'tmcTwitterBootstrapPlugin') ?>
          </th>
        </tr>
      </tbody>
      <?php else: ?>
        <?php $results = $pager->getResults()->getRawValue() ?>
        <?php $modelname = get_class($results[0]) ?>
      <tbody>
      <!-- modify:loilv4     start - diepth2 - 06/05/2013 - fix loi STT cua ban ghi khi thuc hien thao tac xoa-->
      <?php //$currentPage  = $sf_request->getParameter('current_page', 0)?>
      <?php $currentPage =  $pager->getPage() ?>
      <!--   End diepth2   -->
        <?php foreach ($results as $i => $game): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>

          <tr class="sf_admin_row <?php echo $odd ?> {pk: <?php echo $game->getPrimaryKey() ?>}" rel="<?php echo $game->getPrimaryKey() ?>">

                            <?php #include_partial('gvManageGame/list_td_batch_actions', array('game' => $game, 'helper' => $helper)) ?>
                            <?php $orderNo = ($i) + ($currentPage - 1)*$pager->getMaxPerPage(); ?>
                <?php include_partial('gvManageGame/list_td_tabular', array('game' => $game, 'orderNo' => $orderNo)) ?>
                      </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="6">
            <?php if ($pager->haveToPaginate()): ?>
            <div style="position: relative; width: auto; float:right"><?php include_partial('gvManageGame/pagination', array('pager' => $pager)) ?></div>
            <?php slot('pagination_extra') ?>
              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'tmcTwitterBootstrapPlugin') ?>
            <?php end_slot() ?>
            <?php endif; ?>
            <div style="float: left;font-weight: bold;line-height: 34px;margin-left: 10px;position: relative;width: auto;">
                <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'tmcTwitterBootstrapPlugin') ?>
                <?php include_slot('pagination_extra') ?>
            </div>
          </th>
        </tr>
      </tfoot>
      <?php endif; ?>
    </table>
</div>
<script type="text/javascript">
/* <![CDATA[ */
$(function(){

// add multiple select / deselect functionality
    $("#sf_admin_list_batch_checkbox").click(function () {
        $('.sf_admin_batch_checkbox').attr('checked', this.checked);
    });

// if all checkbox are selected, check the selectall checkbox
// and viceversa
    $(".sf_admin_batch_checkbox").click(function(){

        if($(".sf_admin_batch_checkbox").length == $(".sf_admin_batch_checkbox:checked").length) {
            $("#sf_admin_list_batch_checkbox").attr("checked", "checked");
        } else {
            $("#sf_admin_list_batch_checkbox").removeAttr("checked");
        }

    });
});

/* ]]> */
</script>