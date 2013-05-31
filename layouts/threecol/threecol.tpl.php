<div class="panel-display panel-threecol clear-block" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-threecol-inside">
	  	<div class="panel-threecol-panel panel-threecol-left">
		<?php 
		if (!empty($content['left'])) {
			echo "<div class=\"inside\">" . $content['left'] . "</div>";
		} ?>
    </div>
	  	<div class="panel-threecol-panel panel-threecol-middle">
		<?php 
		if (!empty($content['middle'])) {
			echo "<div class=\"inside\">" . $content['middle'] . "</div>";
		} ?>
    </div>
	  	<div class="panel-threecol-panel panel-threecol-right">
		<?php 
		if (!empty($content['right'])) {
			echo "<div class=\"inside\">" . $content['right'] . "</div>";
		} ?>
    </div>
  </div>
</div>
