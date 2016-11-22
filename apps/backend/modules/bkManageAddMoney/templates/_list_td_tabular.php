  
  <td class="sf_admin_text sf_admin_list_td_userId" field="userId"><?php echo  VtHelper::truncate($add_money->getUserId(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_addCash" field="addCash"><?php echo  VtHelper::number_format($add_money->getAddCash())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_addGold" field="addGold"><?php echo  VtHelper::number_format($add_money->getAddGold())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php echo  VtHelper::truncate($add_money->getDescription(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_admin_name" field="admin_name"><?php echo  VtHelper::truncate($add_money->getAdminName(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_status_view" field="status_view"><?php echo  VtHelper::truncate($add_money->getStatusView(), 50, '...', true)  ?></td>      
  <td class="sf_admin_date sf_admin_list_td_created_at" field="created_at"><?php echo  VtHelper::truncate($add_money->getCreatedAt(), 50, '...', true)  ?></td>      
  <td class="sf_admin_date sf_admin_list_td_updated_at" field="updated_at"><?php echo  VtHelper::truncate($add_money->getUpdatedAt(), 50, '...', true)  ?></td>    