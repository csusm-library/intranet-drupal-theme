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
  if (!empty($node) && ($node->nid == "42035" || $node->nid == "42085" || $node->nid == "43191")) {
    drupal_add_css("sites/all/libraries/dataTables/media/css/jquery.dataTables.css");
    drupal_add_js("https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js");
    drupal_add_js('$(document).ready(function(){$(".projects-table").dataTable({"bJQueryUI": false,"sPaginationType": "full_numbers","iDisplayLength": 50});});', 'inline');
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

function intranet_redmine_project_lists($statuses){
  db_set_active('redmine');
  $myquery = "SELECT p.id,p.name,p.status,p.identifier,(SELECT cv.value FROM {custom_values} cv WHERE cv.customized_id = p.id AND cv.custom_field_id = '5') AS pstatus,(SELECT GROUP_CONCAT(cv.value SEPARATOR '<br/>') FROM {custom_values} cv WHERE cv.customized_id = p.id AND cv.custom_field_id = '1') AS ptype,(SELECT GROUP_CONCAT(cv.value SEPARATOR '<br/>') FROM {custom_values} cv WHERE cv.customized_id = p.id AND cv.custom_field_id = '17') AS pcat,(SELECT COUNT(iss.id) FROM {issues} iss WHERE iss.project_id = p.id AND iss.status_id IN (1,2,4,7,12)) AS oissues,(SELECT COUNT(iss.id) FROM {issues} iss WHERE iss.project_id = p.id) AS tissues FROM {projects} p ORDER BY p.name";
    $result = db_query($myquery);
  ?>
  <table class="projects-table display dataTable">
  <thead>
  <tr class="header-row">
  <th class="p-name">Name</th>
  <th class="p-type">Type</th>
  <th class="p-category">Categories</th>
  <th class="p-status">Status</th>
  <th class="p-tissues">Open Issues</th>
  <th class="p-tissues">Total Issues</th>
  </tr>
  </thead>
  <tbody>
  <?php
  while ($query = db_fetch_object($result)) {
    if(in_array($query->pstatus, $statuses)){
      echo "<tr>\n";
      echo "<td><a href=\"/base/projects/" . $query->identifier . "\">" . $query->name . "</a></td>";
      echo "<td>" . $query->ptype . "</td>";
      echo "<td>" . $query->pcat . "</td>";
      echo "<td>" . $query->pstatus . "</td>";
      echo "<td><a href=\"/base/projects/" . $query->identifier . "/issues?utf8=✓&set_filter=1&f[]=status_id&op[status_id]=o\">" . $query->oissues . "</a></td>";
      echo "<td><a href=\"/base/projects/" . $query->identifier . "/issues?utf8=✓&set_filter=1&f[]=status_id&op[status_id]=*\">" . $query->tissues . "</a></td>";
      echo "</tr>\n";
    }
  }
  ?>
  </tbody>
  </table>

  <?php
  db_set_active('default');
}
