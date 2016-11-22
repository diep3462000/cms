  
  <td class="sf_admin_text sf_admin_list_td_roomid" field="roomid"><?php echo  VtHelper::truncate($match_log->getRoomid(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_matchindex" field="matchindex"><?php
    echo  VtHelper::truncate($match_log->getMatchindex(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php
//    $tring = "{\"changeMoney\":{\"1000014\":-20,\"1000012\":19},\"winner\":1000012,\"minbet\":20,\"vipRoom\":true,\"originalCard\":{\"1000014\":\"17,14,18,26,3,23,27,43,4\",\"1000012\":\"1,5,9,29,22,11,39,47,51,28\"},\"startTime\":\"Tue Oct 04 19:22:26 ICT 2016\",\"turn\":[[{\"data\":\"29\",\"action\":1,\"userId\":1000012},{\"data\":\"38\",\"action\":2,\"userId\":1000014},{\"data\":\"43\",\"action\":1,\"userId\":1000014},{\"data\":\"43\",\"action\":3,\"userId\":1000012},{\"data\":\"28\",\"action\":1,\"userId\":1000012},{\"data\":\"28\",\"action\":3,\"userId\":1000014},{\"data\":\"38\",\"action\":1,\"userId\":1000014},{\"data\":\"36\",\"action\":2,\"userId\":1000012},{\"data\":\"36\",\"action\":1,\"userId\":1000012},{\"data\":\"50\",\"action\":2,\"userId\":1000014},{\"data\":\"23\",\"action\":1,\"userId\":1000014},{\"data\":\"7\",\"action\":2,\"userId\":1000012},{\"data\":\"22\",\"action\":1,\"userId\":1000012},{\"data\":\"22\",\"action\":3,\"userId\":1000014},{\"data\":\"50\",\"action\":1,\"userId\":1000014},{\"data\":\"52\",\"action\":2,\"userId\":1000012},{\"data\":\"52\",\"action\":1,\"userId\":1000012},{\"data\":\"35\",\"action\":2,\"userId\":1000014},{\"data\":\"14-18-22,26-27-28\",\"action\":6,\"userId\":1000014},{\"data\":\"35\",\"action\":1,\"userId\":1000014},{\"data\":\"16\",\"action\":2,\"userId\":1000012},{\"data\":\"39-43-47-51,1-5-9\",\"action\":6,\"userId\":1000012},{\"data\":\"16\",\"action\":1,\"userId\":1000012}]],\"endTime\":\"Tue Oct 04 19:23:43 ICT 2016\",\"firstTurnPlayer\":1000012,\"player\":[{\"ip\":\"27.67.28.243\",\"userId\":1000012},{\"ip\":\"14.175.53.199\",\"userId\":1000014}]}";
      $tring = $match_log->getDescriptionArr();
//      $tring = str_replace('"', "\"",$tring);
      var_dump($tring);die;
//      var_dump($tring->winner);die;

            $arr_call =  (array) json_decode($tring, true);
      var_dump($arr_call);die;
      foreach ($tring as $a => $b) {
      echo $a . "|" . $b . "|";
    } ?></td>