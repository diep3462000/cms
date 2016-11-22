  
  <td class="sf_admin_text sf_admin_list_td_created_date" field="created_date"><?php echo  VtHelper::truncate($purchase_money_log->getCreatedDate(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_partner_name" field="partner_name"><?php echo  VtHelper::truncate($purchase_money_log->getPartnerName(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_type" field="type"><?php echo  $purchase_money_log->getType() == 2? "SMS" : "Thẻ cào"  ?></td>
  <td class="sf_admin_text sf_admin_list_td_sum_money" field="sum_money"><?php echo  VtHelper::number_format($purchase_money_log->getSumMoney())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_sum_casj" field="sum_cash"><?php echo  VtHelper::number_format($purchase_money_log->getSumCash())  ?></td>