<td colspan="17">
  <?php echo __('%%id%% - %%first_name%% - %%last_name%% - %%phone%% - %%email_address%% - %%username%% - %%algorithm%% - %%salt%% - %%password%% - %%is_active%% - %%is_super_admin%% - %%last_login%% - %%pass_update_at%% - %%is_lock_signin%% - %%locked_time%% - %%created_at%% - %%updated_at%%', array('%%id%%' => link_to( VtHelper::truncate($sf_guard_user->getId(), 50, '...', true) , 'homepage_edit', $sf_guard_user), '%%first_name%%' =>  VtHelper::truncate($sf_guard_user->getFirstName(), 50, '...', true) , '%%last_name%%' =>  VtHelper::truncate($sf_guard_user->getLastName(), 50, '...', true) , '%%phone%%' =>  VtHelper::truncate($sf_guard_user->getPhone(), 50, '...', true) , '%%email_address%%' =>  VtHelper::truncate($sf_guard_user->getEmailAddress(), 50, '...', true) , '%%username%%' =>  VtHelper::truncate($sf_guard_user->getUsername(), 50, '...', true) , '%%algorithm%%' =>  VtHelper::truncate($sf_guard_user->getAlgorithm(), 50, '...', true) , '%%salt%%' =>  VtHelper::truncate($sf_guard_user->getSalt(), 50, '...', true) , '%%password%%' =>  VtHelper::truncate($sf_guard_user->getPassword(), 50, '...', true) , '%%is_active%%' => get_partial('vtHomePage/list_field_boolean', array('value' =>  VtHelper::truncate($sf_guard_user->getIsActive(), 50, '...', true) )), '%%is_super_admin%%' => get_partial('vtHomePage/list_field_boolean', array('value' =>  VtHelper::truncate($sf_guard_user->getIsSuperAdmin(), 50, '...', true) )), '%%last_login%%' =>  VtHelper::truncate($sf_guard_user->getLastLogin(), 50, '...', true) , '%%pass_update_at%%' =>  VtHelper::truncate($sf_guard_user->getPassUpdateAt(), 50, '...', true) , '%%is_lock_signin%%' => get_partial('vtHomePage/list_field_boolean', array('value' =>  VtHelper::truncate($sf_guard_user->getIsLockSignin(), 50, '...', true) )), '%%locked_time%%' =>  VtHelper::truncate($sf_guard_user->getLockedTime(), 50, '...', true) , '%%created_at%%' =>  VtHelper::truncate($sf_guard_user->getCreatedAt(), 50, '...', true) , '%%updated_at%%' =>  VtHelper::truncate($sf_guard_user->getUpdatedAt(), 50, '...', true) ), 'messages') ?>
</td>
