<?php include 'page.header.inc'; ?>

<div id='left'><div class='page-region'>
  <?php if ($left) print $left ?>
</div></div>
<div id='content' class='left-sidebar'><div class='page-region'>   
  <?php if ($content): ?>
    <div class='page-content content-wrapper clear-block'><?php print $content ?></div>
  <?php endif; ?>
  <?php print $content_region ?>
</div></div>

<?php include 'page.footer.inc'; ?>
