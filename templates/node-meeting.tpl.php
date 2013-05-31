<?php
echo "<div id=\"node-" . $node->nid . "\" class=\"node " . $node->type;
if ($sticky) { echo ' sticky'; } 
if (!$status) { echo ' node-unpublished'; }
echo "\">\n";
echo "<div class=\"agenda-options\"><a href=\"add/agendatopic?edit[field_meetingreference][nid][nid]=[nid:" . $node->nid . "]&amp;destination=node/" . $node->nid . "\" class=\"add-topic-link\">Add Topic</a> \n";
echo "</div>\n"; 
echo $content;
echo "</div>\n";
