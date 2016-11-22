  
  <td class="sf_admin_text sf_admin_list_td_display_name" field="display_name"><?php echo  VtHelper::truncate($exchange_asset_request->getDisplayName(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_requestId" field="requestId"><?php echo link_to($exchange_asset_request->getRequestUserId(), url_for("money_log", array('userId' => $exchange_asset_request->getRequestUserId())))  ?></td>
  <td class="sf_admin_text sf_admin_list_td_requestUserName" field="requestUserName"><?php echo  VtHelper::truncate($exchange_asset_request->getRequestUserName(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_assetId" field="assetId"><?php echo  VtHelper::truncate($exchange_asset_request->getAssetId(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_amount" field="amount"><?php echo  VtHelper::number_format($exchange_asset_request->getAmount())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_totalCash" field="totalCash"><?php echo  VtHelper::number_format($exchange_asset_request->getTotalCash())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_totalParValue" field="totalParValue"><?php echo  VtHelper::number_format($exchange_asset_request->getTotalParValue())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_status" field="status"><?php echo  VtHelper::truncate($exchange_asset_request->getStatusView(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php echo  VtHelper::truncate($exchange_asset_request->getDescription(), 50, '...', true)  ?></td>      
  <td class="sf_admin_date sf_admin_list_td_checkedTime" field="checkedTime"><?php echo  VtHelper::truncate($exchange_asset_request->getCheckedTime(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_responseData" field="responseData"><?php echo  VtHelper::truncate($exchange_asset_request->getResponseData(), 200, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_request_topup_id" field="request_topup_id"><?php echo  VtHelper::truncate($exchange_asset_request->getRequestTopupId(), 50, '...', true)  ?></td>      
  <td class="sf_admin_date sf_admin_list_td_created_at" field="created_at"><?php echo  VtHelper::truncate($exchange_asset_request->getCreatedAt(), 50, '...', true)  ?></td>    