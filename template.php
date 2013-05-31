<?php

/**
 * Implementation of hook_theme().
 */
function intranet_theme() {
  $items = array();

  // Use simple form.
  $items['comment_form'] =
  $items['user_pass'] =
  $items['user_login'] =
  $items['user_register'] = array(
    'arguments' => array('form' => array()),
    'path' => drupal_get_path('theme', 'rubik') .'/templates',
    'template' => 'form-simple',
    'preprocess functions' => array(
      'rubik_preprocess_form_buttons',
      'rubik_preprocess_form_legacy'
    ),
  );
  return $items;
}

function intranet_preprocess_page(&$variables) {
  $variables['template_files'][] = 'page-node-' . $variables['node']->nid;
}

//* Preprocessor for theme('node').
function intranet_preprocess_node(&$variables) {
  $variables['template_files'][] = 'node-' . $variables['nid'];
  $node = $variables['node'];
  if (!empty($node) && ($node->nid == "42035" || $node->nid == "42085")) {
    drupal_add_css("sites/all/libraries/dataTables/media/css/jquery.dataTables.css");
    drupal_add_js("sites/all/libraries/dataTables/media/js/jquery.dataTables.js");
    drupal_add_js('$(document).ready(function(){$("#projects-table").dataTable({"bJQueryUI": false,"sPaginationType": "full_numbers","iDisplayLength": 50});});', 'inline');
    $variables['styles'] = drupal_get_css();
    $variables['script'] = drupal_get_js();
  }
  if ($node->revision_timestamp != $node->created) {
    // Append the revision information to the submitted by text.
    $revision_uid = !empty($node->revision_uid) ? $node->revision_uid : 0;
    $revision_account = user_load(array('uid' => $revision_uid));
    $variables['revision_name'] = theme('username', $revision_account);
    $variables['revision_pix'] = theme('user_picture', $revision_account);
    $variables['revision_date'] = module_exists('reldate') ? reldate_format_date($node->changed) : format_date($node->changed, 'small');
    $variables['submitted'] = t("<div class='picture'>!revision-pix</div><div class='byline'>"."!revision-name"."</div><div class='date'>". "!revision-date"."</div>", array(
      '!name' => $variables['name'], '!date' => $variables['date'], '!revision-pix' => $variables['revision_pix'], '!revision-name' => $variables['revision_name'], '!revision-date' => $variables['revision_date']));
  }
}

/**
 * Preprocessor for theme_node_form().
 */
function intranet_preprocess_node_form(&$variables) {
  drupal_add_js('$(document).ready(function(){$("#webfm-attach").parent(".titled").attr("id",webfm-wrapper");});', 'inline');
  $variables['form']['nodeformcols_region_main']['webfm-attach']['attach']['#collapsed'] = 0;
  $variables['form']['nodeformcols_region_main']['webfm-attach']['attach']['browser']['#collapsed'] = FALSE;
  $variables['form']['nodeformcols_region_main']['webfm-attach']['attach']['browser']['wrapper']['#collapsed'] = FALSE;
}

