  
  <td class="sf_admin_text sf_admin_list_td_roomid" field="roomid"><?php echo  VtHelper::truncate($match_log->getRoomid(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_matchindex" field="matchindex"><?php
    echo  VtHelper::truncate($match_log->getMatchindex(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_description" field="description">
    <?php
    $arr_des = explode("+",$match_log->getDescriptionArr());
    foreach ($arr_des as $des) {
      echo $des; ?>
        </br>
    <?php
    }
    ?>
  </td>
  <td class="sf_admin_text sf_admin_list_td_createdTime" field="type"><?php echo $match_log->getType() ?></td>
  <td class="sf_admin_text sf_admin_list_td_createdTime" field="createdTime"><?php echo $match_log->getCreatedTime() ?></td>
