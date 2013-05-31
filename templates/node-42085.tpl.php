<?php if (empty($hide)): ?>

<?php if (!empty($pre_object)) print $pre_object ?>

<div <?php if (!empty($attr)) print drupal_attributes($attr) ?>>
  <?php if (!empty($submitted)): ?>
    <div class='<?php print $hook ?>-submitted clear-block'>
      <?php print $submitted ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($title)): ?>
    <h2 class='<?php print $hook ?>-title'>
      <?php if (!empty($new)): ?><a id='new' class='new'><?php print('New') ?></a><?php endif; ?>
      <a href="<?php print $node_url ?>"><?php print $title ?></a>
    </h2>
  <?php endif; ?>
  <?php if (!empty($links)): ?>
    <div class='<?php print $hook ?>-links clear-block'><?php print $links ?></div>
  <?php endif; ?>
    <div class='<?php print $hook ?>-content clear-block <?php if (!empty($is_prose)) print 'prose' ?>'>
<?php
db_set_active('redmine');
  $result = db_query("SELECT proj.id,proj.name,proj.status,proj.identifier,proj.created_on,(SELECT cv.value FROM {custom_values} cv WHERE cv.customized_id = proj.id AND cv.custom_field_id = '1') AS ptype,(SELECT cv.value FROM {custom_values} cv WHERE cv.customized_id = proj.id AND cv.custom_field_id = '5') AS pstatus,(SELECT cv.value FROM {custom_values} cv WHERE cv.customized_id = proj.id AND cv.custom_field_id = '2') AS owning,(SELECT COUNT(iss.id) FROM {issues} iss WHERE iss.project_id = proj.id ) AS tissues  FROM {projects} proj WHERE proj.status = '9' ORDER BY proj.name");
?>
<div class="export-link excel"><a href="/node/42093">Export to Excel</a></div>
<table id="projects-table">
<thead>
<tr class="header-row">
<th class="sid">ID</th>
<th class="p-name">Name</th>
<th class="p-type">Type</th>
<th class="p-group">Group</th>
<th class="p-status">Status</th>
<th class="p-tissues">Total Issues</th>
<th class="p-create">Created</th>
</tr>
</thead>
<tbody>
<?php
while ($query = db_fetch_object($result)) {
  echo "<tr>\n";
  echo "<td>" . $query->id . "</td>";
  echo "<td><a href=\"/base/projects/" . $query->identifier . "\">" . $query->name . "</a></td>";
  echo "<td>" . $query->ptype . "</td>";
  echo "<td>" . $query->owning . "</td>";
  echo "<td>" . $query->pstatus . "</td>";
  echo "<td>" . $query->tissues . "</td>";
		$created_date = explode(" ",$query->created_on);
  echo "<td>" . $created_date[0] . "</td>";
  echo "</tr>\n";
}
?>
</tbody>
</table>

<?php
db_set_active('default');

if (!empty($content)): ?>
      <?php print $content ?>
  <?php endif; ?>
    </div>

</div>

<?php if (!empty($post_object)) print $post_object ?>

<?php endif; ?>
