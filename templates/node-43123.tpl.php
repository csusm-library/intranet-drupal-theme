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
$statuses = array('Complete','Cancelled');
intranet_redmine_project_table($statuses);

if (!empty($content)): ?>
      <?php print $content ?>
  <?php endif; ?>
    </div>

</div>

<?php if (!empty($post_object)) print $post_object ?>

<?php endif; ?>
