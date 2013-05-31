<?php
$filename ="projects-export.xls";
db_set_active('redmine');
  $result = db_query("SELECT proj.id,proj.name,proj.status,proj.identifier,proj.created_on,(SELECT cv.value FROM {custom_values} cv WHERE cv.customized_id = proj.id AND cv.custom_field_id = '1') AS ptype,(SELECT cv.value FROM {custom_values} cv WHERE cv.customized_id = proj.id AND cv.custom_field_id = '5') AS pstatus,(SELECT cv.value FROM {custom_values} cv WHERE cv.customized_id = proj.id AND cv.custom_field_id = '2') AS owning,(SELECT COUNT(iss.id) FROM {issues} iss WHERE iss.project_id = proj.id AND iss.status_id IN (1,2,4,7,12)) AS oissues,(SELECT COUNT(iss.id) FROM {issues} iss WHERE iss.project_id = proj.id) AS tissues FROM {projects} proj WHERE proj.status = '1' ORDER BY proj.name");

header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);

?>
<table id="projects-table">
<thead>
<tr class="header-row">
<th class="sid">ID</th>
<th class="p-name">Name</th>
<th class="p-type">Type</th>
<th class="p-group">Group</th>
<th class="p-status">Status</th>
<th class="p-tissues">Open Issues</th>
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
  echo "<td>" . $query->oissues . "</td>";
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
?>