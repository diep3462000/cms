  
  <td class="sf_admin_text sf_admin_list_td_roomid" field="roomid"><?php echo  VtHelper::truncate($match_log->getRoomid(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_matchindex" field="matchindex"><?php echo  VtHelper::truncate($match_log->getMatchindex(), 50, '...', true)  ?></td>      
  <td class="sf_admin_foreignkey sf_admin_list_td_gameid" field="gameid"><?php echo  VtHelper::truncate($match_log->getGameid(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_game_name" field="game_name"><?php echo  VtHelper::truncate($match_log->getGameName(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php echo  $match_log->getDescription() ?></td>