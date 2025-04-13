<?php
/* Smarty version 4.3.4, created on 2025-04-13 07:49:10
  from 'C:\xampp\htdocs\content\themes\default\templates\_footer_mini.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67fb6c76717c03_55685541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb4ddb8a50047785ef2338d6247755a309d1b076' => 
    array (
      0 => 'C:\\xampp\\htdocs\\content\\themes\\default\\templates\\_footer_mini.tpl',
      1 => 1744530547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fb6c76717c03_55685541 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="mini-footer mtb20 plr10">
  <div class="copyrights dropdown">
    <span class="mr5">&copy; <?php echo date('Y');?>
 <?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
</span>
  </div>
  <ul class="links">
    <?php if ($_smarty_tpl->tpl_vars['system']->value['contact_enabled']) {?>
      <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/contacts">
          <?php echo __("Contact Us");?>

        </a>
      </li>
    <?php }?>
  </ul>
</div><?php }
}
