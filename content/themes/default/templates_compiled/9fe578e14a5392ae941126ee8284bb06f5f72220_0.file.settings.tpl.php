<?php
/* Smarty version 4.3.4, created on 2025-04-13 08:05:28
  from 'C:\xampp\htdocs\content\themes\default\templates\settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67fb704847d179_37827256',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fe578e14a5392ae941126ee8284bb06f5f72220' => 
    array (
      0 => 'C:\\xampp\\htdocs\\content\\themes\\default\\templates\\settings.tpl',
      1 => 1744531527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:__svg_icons.tpl' => 4,
    'file:settings.account.tpl' => 1,
    'file:settings.profile.tpl' => 1,
    'file:settings.security.tpl' => 1,
    'file:settings.privacy.tpl' => 1,
    'file:settings.notifications.tpl' => 1,
    'file:settings.accounts.tpl' => 1,
    'file:settings.linked.tpl' => 1,
    'file:settings.membership.tpl' => 1,
    'file:settings.invitations.tpl' => 1,
    'file:settings.affiliates.tpl' => 1,
    'file:settings.points.tpl' => 1,
    'file:settings.market.tpl' => 1,
    'file:settings.funding.tpl' => 1,
    'file:settings.monetization.tpl' => 1,
    'file:settings.coinpayments.tpl' => 1,
    'file:settings.bank.tpl' => 1,
    'file:settings.verification.tpl' => 1,
    'file:settings.apps.tpl' => 1,
    'file:settings.blocking.tpl' => 1,
    'file:settings.addresses.tpl' => 1,
    'file:settings.information.tpl' => 1,
    'file:settings.delete.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_67fb704847d179_37827256 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar">
      <div class="card">
        <div class="card-body with-nav">
          <ul class="side-nav">
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, false);
?>
                <?php echo __("Account Settings");?>

              </a>
            </li>

            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>class="active" <?php }?>>
              <a href="#info-settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>aria-expanded="true" <?php }?>>
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Edit Profile");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>show<?php }?>' id="info-settings">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                      <?php echo __("Basic");?>

                    </a>
                  </li>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['work_info_enabled']) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "work") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/work">
                        <?php echo __("Work");?>

                      </a>
                    </li>
                  <?php }?>
                </ul>
              </div>
            </li>

            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>class="active" <?php }?>>
              <a href="#security-settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>aria-expanded="true" <?php }?>>
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"security",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Security Settings");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>show<?php }?>' id="security-settings">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security" && $_smarty_tpl->tpl_vars['sub_view']->value == "password") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/security/password">
                      <?php echo __("Password");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <div class="divider mtb5"></div>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['delete_accounts_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "delete") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/delete">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete_user",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Delete Account");?>

                </a>
              </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
    <!-- left panel -->

    <!-- right panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
      <div class="card">
        <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.account.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.profile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "security") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.security.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "privacy") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.privacy.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "notifications") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "accounts") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.accounts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "linked") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.linked.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "membership") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.membership.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "invitations") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.invitations.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.affiliates.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "points") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.points.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "market") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.market.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "funding") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.funding.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.monetization.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "coinpayments") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.coinpayments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "bank") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.bank.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.verification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "apps") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.apps.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "blocking") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.blocking.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "addresses") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.addresses.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "information") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.information.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "delete") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.delete.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>
      </div>
    </div>
    <!-- right panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
