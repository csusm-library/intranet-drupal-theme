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
<div class="panel-display panel-wideleft clear-block" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-wideleft-inside">
  <div class="panel-panel panel-col-left">
  <div class="panel-col-left-inside">
    <div class="inside"><?php print $content['left']; ?></div>
    <div class="inside lowerleft"><?php print $content['leftlower']; ?></div>
  </div>
  </div>

  <div class="panel-panel panel-col-right">
    <div class="inside">
	  	<div id="sidebar-right1">
		<?php 
		if (!empty($content['right'])) {
			echo "<div class=\"right-row\"><div class=\"title-corner\"></div>" . $content['right'] . "</div>";
		} ?>
        </div>
	  	<div id="sidebar-right2">
		<?php 
		if (!empty($content['right2'])) {
			echo "<div class=\"right-row\"><div class=\"title-corner\"></div>" . $content['right2'] . "</div>";
		} ?>
        </div>
  	    <div id="sidebar-right3">
		<?php 
		if (!empty($content['right3'])) {
			echo "<div class=\"right-row\"><div class=\"title-corner\"></div>" . $content['right3'] . "</div>";
		} ?>
        </div>
  	    <div id="sidebar-right4">
		<?php 
		if (!empty($content['right4'])) {
			echo "<div class=\"right-row last\">" . $content['right4'] . "</div>";
		} ?>
        </div>
    </div>
  </div>
  </div>
</div>
