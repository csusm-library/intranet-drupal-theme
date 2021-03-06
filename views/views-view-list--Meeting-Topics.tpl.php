<?php 
/**
 * views template to output one 'row' of a view.
 * This code was generated by the views theming wizard
 * Date: Thu, 01/29/2009 - 4:48pm
 * View: Meeting_Topics
 *
 * Variables available:
 * $view -- the entire view object. Important parts of this object are
 *   Meeting_Topics, .
 * $view_type -- The type of the view. Probably 'page' or 'block' but could
 *   also be 'embed' or other string passed in from a custom view creator.
 * $node -- the raw data. This is not a real node object, but will contain
 *   the nid as well as other support fields that might be necessary.
 * $count -- the current row in the view (not TOTAL but for this page) starting
 *   from 0.
 * $stripe -- 'odd' or 'even', alternating. * $title -- Display the title of the node.
 * $title_label -- The assigned label for $title
 * $name -- This will display the author of the node.
 * $name_label -- The assigned label for $name
 * $field_openingdate_value -- 
 * $field_openingdate_value_label -- The assigned label for $field_openingdate_value
 * $field_due_date_value -- 
 * $field_due_date_value_label -- The assigned label for $field_due_date_value
 * $body -- Display the Main Content.
 * $body_label -- The assigned label for $body
 * $all_files -- Display ALL the files that have been attached to the node via WebFM. Metadata title is used where present when 'Display metadata title' checked in settings.
 * $all_files_label -- The assigned label for $all_files
 * $changed -- Display the last time the node was updated. The option field may be used to specify the custom date format as it's required by the date() function or if "as time ago" has been chosen to customize the granularity of the time interval.
 * $changed_label -- The assigned label for $changed
 * $edit -- Display a link to edit the node. Enter the text of this link into the option field; if blank the default "Edit" will be used.
 * $edit_label -- The assigned label for $edit
 *
 * This function goes in your views-list-Meeting_Topics.tpl.php file
 */
 
  
  ?>
<div class="agenda-item">
<div class="view-row">
<div class="view-field view-data-title">
  <h3><?php print $title?> <span class="topic-edit-link"><?php print str_replace(">edit<",">edit topic<",$edit)?> &nbsp; |  &nbsp; <?php print str_replace("Node queues","add to agenda",$nodequeue_link)?> 
<?
if ($comment_count >0 && $comment != "n/a"){
  echo " &nbsp; | &nbsp; comment(s): ";
  print str_replace("\">View","#topic_comments\">$comment_count &raquo; read",$view); 
} ?>
</span></h3>
</div>
</div>
<? if ($body){?>
<div class="view-row">
  <?php print $body?>
</div>
<? } else {?>
<br /><br />
<? } ?>
<? if ($all_files){?>
<div class="view-row">
<div class="view-label files-label">
<?php print $all_files_label ?>
</div>
<div class="view-field files-field">
  <?php print $all_files?>
</div>
</div>
<? } ?>
<div class="view-row inline">
<div class="view-label">
Posted by: 
</div>
<div class="view-field view-data-name">
  <?php print $name?>
</div> 
<div class="view-label">
Open on:
</div>
<div class="view-field ">
  <?php print $field_openingdate_value?>
</div> 
<? if ($field_due_date_value){?>
<div class="view-label ">
<?php print $field_due_date_value_label ?>
</div>
<div class="view-field ">
  <?php print $field_due_date_value?>
</div>
<? } ?>
<? if ($comment != "n/a"){?>
<div class="view-label">
Comment(s): 
</div>
<div class="view-field">
<?php 
if ($comment_count >0){
  print str_replace("\">View","#topic_comments\">$comment_count &raquo; read",$view); 
} else {
  echo $comment_count;
} ?> &nbsp;  &nbsp; <span class="add-comment-link">[ <?php print $add?> ] </span>

</div>
<? } ?>
</div>
<div align="right"><em style="font-size: .85em;color:#666;">Topic Updated: <?php print $changed?></em></div>
</div>
<br clear="all" />