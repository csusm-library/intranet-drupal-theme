<div class="panel-display panel-singlecol clear-block" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-singlecol-inside">
	  	<div class="singlecol-panel panel-singlecol-top">
		<?php 
		if (!empty($content['top'])) {
			echo "<div class=\"inside\">" . $content['top'] . "</div>";
		} ?>
    </div>
	  	<div class="singlecol-panel panel-singlecol-middle">
		<?php 
		if (!empty($content['middle'])) {
			echo "<div class=\"inside\">" . $content['middle'] . "</div>";
		} ?>
    </div>
	  	<div class="singlecol-panel panel-singlecol-bottom">
		<?php 
		if (!empty($content['bottom'])) {
			echo "<div class=\"inside\">" . $content['bottom'] . "</div>";
		} ?>
    </div>
  </div>
</div>
