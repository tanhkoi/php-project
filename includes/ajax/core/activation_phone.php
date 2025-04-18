<?php

/**
 * ajax -> core -> activation phone confirm
 * 
 * 
 * 
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// check user logged in
if (!$user->_logged_in) {
  modal('LOGIN');
}

try {

  // activation phone
  $user->activation_phone($_POST['code']);

  // return
  return_json(array('callback' => 'window.location.reload();'));
} catch (Exception $e) {
  return_json(array('error' => true, 'message' => $e->getMessage()));
}
