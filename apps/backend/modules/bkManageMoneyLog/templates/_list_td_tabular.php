
  <td class="sf_admin_foreignkey sf_admin_list_td_userId" field="userId"><?php echo  VtHelper::truncate($purchase_money_log->getUserId(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_userName" field="userName"><?php echo  VtHelper::truncate($purchase_money_log->getUserName(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_userName" field="userName"><?php echo  VtHelper::truncate($purchase_money_log->getDisplayName(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_parValue" field="parValue"><?php echo  VtHelper::number_format($purchase_money_log->getParValue())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_cashValue" field="cashValue"><?php echo  VtHelper::number_format($purchase_money_log->getCashValue())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_currentCash" field="currentCash"><?php echo  VtHelper::number_format($purchase_money_log->getCurrentCash())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_purchasedTime" field="purchasedTime"><?php echo  VtHelper::truncate($purchase_money_log->getPurchasedTime(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_type" field="type"><?php echo  $purchase_money_log->getType() == 2? "SMS" : "Thẻ cào"   ?></td>
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php echo  VtHelper::truncate($purchase_money_log->getDescription(), 50, '...', true)  ?></td>