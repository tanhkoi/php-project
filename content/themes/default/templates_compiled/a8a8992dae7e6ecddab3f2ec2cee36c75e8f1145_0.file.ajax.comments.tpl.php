<?php
/* Smarty version 4.3.4, created on 2025-04-13 09:34:26
  from 'C:\xampp\htdocs\content\themes\default\templates\ajax.comments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67fb8522121704_98139257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8a8992dae7e6ecddab3f2ec2cee36c75e8f1145' => 
    array (
      0 => 'C:\\xampp\\htdocs\\content\\themes\\default\\templates\\ajax.comments.tpl',
      1 => 1735737871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_comment.tpl' => 1,
  ),
),false)) {
function content_67fb8522121704_98139257 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
$_smarty_tpl->tpl_vars['comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->do_else = false;
?>
  <?php $_smarty_tpl->_subTemplateRender('file:__feeds_comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_comment'=>$_smarty_tpl->tpl_vars['comment']->value), 0, true);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
