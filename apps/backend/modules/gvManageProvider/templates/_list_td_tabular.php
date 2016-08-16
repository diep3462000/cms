  
  <td class="sf_admin_text sf_admin_list_td_id" field="id"><?php echo link_to( VtHelper::truncate($provider->getId(), 50, '...', true) , 'provider_edit', $provider) ?></td>      
  <td class="sf_admin_text sf_admin_list_td_code" field="code"><?php echo  VtHelper::truncate($provider->getCode(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php echo  VtHelper::truncate($provider->getDescription(), 50, '...', true)  ?></td>    