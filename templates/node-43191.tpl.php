<?php if (empty($hide)): ?>
  <?php if (!empty($pre_object)) print $pre_object ?>
  <div <?php if (!empty($attr)) print drupal_attributes($attr) ?>>
  <?php if (!empty($title)): ?>
    <h2 class='<?php print $hook ?>-title'>
      <?php if (!empty($new)): ?><a id='new' class='new'><?php print('New') ?></a><?php endif; ?>
      <a href="<?php print $node_url ?>"><?php print $title ?></a><a class="add-new-project" href="/base/projects/new"><i class="icon icon-plus-sign"></i> New project</a>
    </h2>
  <?php endif; ?>
  <?php if (!empty($links)): ?>
    <div id="project-page-links" class='<?php print $hook ?>-links clear-block'><?php print $links ?></div>
  <?php endif; ?>
      <div class='<?php print $hook ?>-content clear-block <?php if (!empty($is_prose)) print 'prose' ?>'>
        <?php
        if (!empty($content)):
          print $content;
        endif;
        echo "<div id=\"project-lists-wrapper\">";
          $statuses = array('Information Gathering','Design','Development','Testing','Implementation','Wrap-up','Ongoing','Postponed');
          echo "<div style=\"float:left;width:46%;max-width:500px;margin-right:40px;\">";
          intranet_redmine_project_lists($statuses,'All Library');
          intranet_redmine_project_lists($statuses,'Access Services');
          intranet_redmine_project_lists($statuses,'Acquisitions');
          intranet_redmine_project_lists($statuses,"Dean's Office");
          intranet_redmine_project_lists($statuses,'ILP');
          intranet_redmine_project_lists($statuses,'Institutional Repository');
          echo "</div>";
          echo "<div style=\"float:left;width:46%;max-width:500px;\">";
          intranet_redmine_project_lists($statuses,'Media Library');
          intranet_redmine_project_lists($statuses,'Metadata');
          intranet_redmine_project_lists($statuses,'Outreach');
          intranet_redmine_project_lists($statuses,'Resource Sharing');
          intranet_redmine_project_lists($statuses,'RHD');
          intranet_redmine_project_lists($statuses,'Systems');
        echo "</div>";?>
      </div>
    </div>
  </div>
  <?php
  if (!empty($submitted)): ?>
    <div class='<?php print $hook ?>-submitted clear-block'>
      <?php print $submitted ?>
    </div>
  <?php endif;
  if (!empty($post_object)) print $post_object;
endif; ?>
