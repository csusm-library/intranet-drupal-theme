<?php
// $Id: panels-twocol.tpl.php,v 1.1.2.1 2008/12/16 21:27:58 merlinofchaos Exp $
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="panel-display panel-wideright clear-block" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
<div class="panel-wideright-inside">
  <div class="panel-panel panel-col-right">
  <div class="panel-col-right-inside">
    <div class="inside"><?php print $content['right']; ?></div>
    <div class="inside lowerright"><?php print $content['rightlower']; ?></div>
  </div>
  </div>

  <div class="panel-panel panel-col-left">
    <div class="inside">
	  	<div id="sidebar-left1">
		<?php 
		if (!empty($content['left'])) {
			echo "<div class=\"left-row\"><div class=\"title-corner\"></div>" . $content['left'] . "</div>";
		} ?>
        </div>
	  	<div id="sidebar-left2">
		<?php 
		if (!empty($content['left2'])) {
			echo "<div class=\"left-row\">" . $content['left2'] . "</div>";
		} ?>
        </div>
  	    <div id="sidebar-left3">
		<?php 
		if (!empty($content['left3'])) {
			echo "<div class=\"left-row last \">" . $content['left3'] . "</div>";
		} ?>
        </div>
    </div>
  </div>
  </div>
</div>
