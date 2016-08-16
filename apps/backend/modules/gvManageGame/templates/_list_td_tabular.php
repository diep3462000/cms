  
  <td class="sf_admin_text sf_admin_list_td_gameid" field="gameid"><?php echo link_to( VtHelper::truncate($game->getGameid(), 50, '...', true) , 'game_edit', $game) ?></td>      
  <td class="sf_admin_text sf_admin_list_td_name" field="name"><?php echo  VtHelper::truncate($game->getName(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php echo  VtHelper::truncate($game->getDescription(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_help" field="help"><?php echo  VtHelper::truncate($game->getHelp(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_status" field="status"><?php echo  VtHelper::truncate($game->getStatus(), 50, '...', true)  ?></td>    