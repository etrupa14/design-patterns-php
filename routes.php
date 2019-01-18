<?php

function call($controller, $action) {
require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
    }

    // call the action
    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error', 'sort']);

  if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
          call($controller, $action);
      } else {
          call('pages', 'error');
      }
  } else {
      call('pages', 'error');
  }