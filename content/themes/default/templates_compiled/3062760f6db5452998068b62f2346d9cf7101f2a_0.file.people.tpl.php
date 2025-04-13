<?php
/* Smarty version 4.3.4, created on 2025-04-13 09:04:27
  from 'C:\xampp\htdocs\content\themes\default\templates\people.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67fb7e1ba49632_26534594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3062760f6db5452998068b62f2346d9cf7101f2a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\content\\themes\\default\\templates\\people.tpl',
      1 => 1744535066,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__feeds_user.tpl' => 4,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_67fb7e1ba49632_26534594 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar js_sticky-sidebar">
      <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    <!-- left panel -->

    <!-- content panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">

      <!-- tabs -->
      <div class="content-tabs rounded-sm shadow-sm clearfix">
        <ul>
          <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '' || $_smarty_tpl->tpl_vars['view']->value == "find") {?>class="active" <?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people"><?php echo __("Discover");?>
</a>
          </li>
          <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "friend_requests") {?>class="active" <?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">
              <?php echo __("Friend Requests");?>

              <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) {?>
                <span class="badge badge-lg bg-info ml5"><?php echo count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']);?>
</span>
              <?php }?>
            </a>
          </li>
          <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "sent_requests") {?>class="active" <?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/sent_requests">
              <?php echo __("Sent Requests");?>

              <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent_total']) {?>
                <span class="badge badge-lg bg-warning ml5"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent_total'];?>
</span>
              <?php }?>
            </a>
          </li>
        </ul>
      </div>
      <!-- tabs -->

      <!-- content -->
      <div class="">
        <!-- left panel -->
        <div class="">
          <div class="card">

            <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
              <div class="card-header bg-transparent">
                <strong><?php echo __("People You May Know");?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['people']->value) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"add"), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>

                  <!-- see-more -->
                  <?php if (count($_smarty_tpl->tpl_vars['people']->value) >= $_smarty_tpl->tpl_vars['system']->value['min_results']) {?>
                    <div class="alert alert-post see-more js_see-more" data-get="new_people">
                      <span><?php echo __("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                  <?php }?>
                  <!-- see-more -->
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo __("No people available");?>

                  </p>
                <?php }?>
              </div>

            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "find") {?>
              <div class="card-header bg-transparent">
                <strong><?php echo __("Search Results");?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['people']->value) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value['connection']), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo __("No people available for your search");?>

                  </p>
                <?php }?>
              </div>

            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "friend_requests") {?>
              <div class="card-header bg-transparent">
                <strong><?php echo __("Respond to Your Friend Request");?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"request"), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo __("No new requests");?>

                  </p>
                <?php }?>

                <!-- see-more -->
                <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                  <div class="alert alert-info see-more js_see-more" data-get="friend_requests">
                    <span><?php echo __("See More");?>
</span>
                    <div class="loader loader_small x-hidden"></div>
                  </div>
                <?php }?>
                <!-- see-more -->
              </div>

            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "sent_requests") {?>
              <div class="card-header bg-transparent">
                <strong><?php echo __("Friend Requests Sent");?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"cancel"), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo __("No new requests");?>

                  </p>
                <?php }?>

                <!-- see-more -->
                <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                  <div class="alert alert-info see-more js_see-more" data-get="friend_requests_sent">
                    <span><?php echo __("See More");?>
</span>
                    <div class="loader loader_small x-hidden"></div>
                  </div>
                <?php }?>
                <!-- see-more -->
              </div>

            <?php }?>

          </div>
        </div>
        <!-- left panel -->

      </div>
      <!-- content -->

    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
