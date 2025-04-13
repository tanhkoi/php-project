<?php
/* Smarty version 4.3.4, created on 2025-04-13 12:37:03
  from 'C:\xampp\htdocs\content\themes\default\templates\admin.dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67fbafefac6038_89015891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbd29410d4914a1048dec644f2eb8b3b766d7c8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\content\\themes\\default\\templates\\admin.dashboard.tpl',
      1 => 1744547821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fbafefac6038_89015891 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <i class="fa fa-tachometer-alt mr10"></i><?php echo __("Dashboard");?>

  </div>
  <div class="card-body">
    <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
      <div id="admin-chart-dashboard" class="admin-chart mb20"></div>
      <div class="row">
        <div class="col-sm-6">
          <div class="stat-panel bg-gradient-primary">
            <div class="stat-cell narrow">
              <i class="fa fa-users bg-icon"></i>
              <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['users'];?>
</span><br>
              <span class="text-lg"><?php echo __("Users");?>
</span><br>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users"><?php echo __("Manage Users");?>
</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="stat-panel bg-gradient-success">
            <div class="stat-cell narrow">
              <i class="fa fa-newspaper bg-icon"></i>
              <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['posts'];?>
</span><br>
              <span class="text-lg"><?php echo __("Posts");?>
</span><br>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts"><?php echo __("Manage Posts");?>
</a>
            </div>
          </div>
        </div>
      </div>
    <?php }?>
  </div>
</div><?php }
}
