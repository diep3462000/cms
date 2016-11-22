  
  <td class="sf_admin_text sf_admin_list_td_content" field="content"><?php echo  VtHelper::truncate(VtHelper::htmlToView($notify->content), 1000, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_status" field="status"><?php echo  VtHelper::truncate($notify->getStatus(), 50, '...', true)  ?></td>      
  <td class="sf_admin_date sf_admin_list_td_created_at" field="created_at"><?php echo  VtHelper::truncate($notify->getCreatedAt(), 50, '...', true)  ?></td>    