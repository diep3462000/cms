  
  <td class="sf_admin_text sf_admin_list_td_title" field="title"><?php echo  VtHelper::truncate($web_content->getTitle(), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_image" field="image"><img src="<?php echo VtHelper::getUrlImagePathThumb(sfConfig::get('app_category_images'), $web_content->getImage())?>"></td>
  <td class="sf_admin_text sf_admin_list_td_content" field="content"><?php echo  html_entity_decode(VtHelper::truncate($web_content->getContent(), 50, '...', true))  ?></td>
  <td class="sf_admin_text sf_admin_list_td_status" field="status"><?php echo  VtHelper::truncate($web_content->getStatus(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_type" field="type"><?php echo  VtHelper::truncate($web_content->getType(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_is_hot" field="is_hot"><?php echo  VtHelper::truncate($web_content->getIsHot(), 50, '...', true)  ?></td>      
  <td class="sf_admin_date sf_admin_list_td_created_at" field="created_at"><?php echo  VtHelper::truncate($web_content->getCreatedAt(), 50, '...', true)  ?></td>    