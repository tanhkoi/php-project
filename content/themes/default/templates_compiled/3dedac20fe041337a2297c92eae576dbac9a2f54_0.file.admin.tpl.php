<?php
/* Smarty version 4.3.4, created on 2025-04-13 12:47:46
  from 'C:\xampp\htdocs\content\themes\default\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67fbb272ef0a08_34819857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dedac20fe041337a2297c92eae576dbac9a2f54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\content\\themes\\default\\templates\\admin.tpl',
      1 => 1744548466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:admin.".((string)$_smarty_tpl->tpl_vars[\'view\']->value).".tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_67fbb272ef0a08_34819857 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar admin-sidebar">

      <!-- System -->
      <div class="card mb15">
        <div class="card-header block-title">
          <?php echo __("System");?>

        </div>
        <div class="card-body with-nav">
          <ul class="side-nav">
            <!-- Dashboard -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "dashboard") {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
">
                <i class="fa fa-tachometer-alt fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Dashboard");?>

              </a>
            </li>
            <!-- Dashboard -->
          </ul>
        </div>

        <div class="card-body with-nav">
          <ul class="side-nav">
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
              <!-- Users -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>class="active" <?php }?>>
                <a href="#users" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-user fa-lg fa-fw mr10" style="color: #9C27B0"></i><?php echo __("Users");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>show<?php }?>' id="users">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users">
                        <?php echo __("List Users");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "admins") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/admins">
                        <?php echo __("List Admins");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Users -->
            <?php }?>
          </ul>
        </div>

        <div class="card-body with-nav">
          <ul class="side-nav">
            <!-- Posts -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts") {?>class="active" <?php }?>>
              <a href="#posts" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-newspaper fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Posts");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts") {?>show<?php }?>' id="posts">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts">
                      <?php echo __("List Posts");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Posts -->

            <!-- Pages -->
            
            <!-- Pages -->

            <!-- Groups -->
            
            <!-- Groups -->

            <!-- Events -->
            
            <!-- Events -->

            <!-- Blogs -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>class="active" <?php }?>>
              <a href="#blogs" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>aria-expanded="true" <?php }?>>
                <i class="fab fa-blogger-b fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Blogs");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>show<?php }?>' id="blogs">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs">
                      <?php echo __("List Articles");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Blogs -->
          </ul>
        </div>
      </div>
      <!-- System -->

      <!-- Modules -->
      <div class="card mb15">
        <div class="card-header block-title">
          <?php echo __("Modules");?>

        </div>
        
      </div>
      <!-- Modules -->

      <!-- Money -->
      
      <!-- Money -->

      <!-- Payments -->
      
      <!-- Payments -->

      <!-- Developers -->
      
      <!-- Developers -->

      <!-- Tools -->
      
      <!-- Tools -->

      <!-- Customization -->
      
      <!-- Customization -->

      <!-- Reach -->
      
      <!-- Reach -->

      <!-- System -->
      
      <!-- System -->

    </div>
    <!-- left panel -->

    <!-- right panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
      <?php $_smarty_tpl->_subTemplateRender("file:admin.".((string)$_smarty_tpl->tpl_vars['view']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
    <!-- right panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
