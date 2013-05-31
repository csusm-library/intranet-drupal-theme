<div class="panel-display panel-widemiddle clear-block" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-widemiddle-inside">
	  	<div class="widemiddle-panel panel-widemiddle-middle">
		<?php 
		if (!empty($content['middle'])) {
			echo "<div class=\"inside\">" . $content['middle'] . "</div>";
		} ?>
    </div>
	  	<div class="widemiddle-panel panel-widemiddle-left">
		<?php 
		if (!empty($content['left'])) {
			echo "<div class=\"inside\">" . $content['left'] . "</div>";
		} ?>
    </div>
	  	<div class="widemiddle-panel panel-widemiddle-right">
		<?php 
		if (!empty($content['right'])) {
			echo "<div class=\"inside\">" . $content['right'] . "</div>";
		} ?>
    </div>
  </div>
</div>
