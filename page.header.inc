<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <?php print $styles ?>
				<link type="text/css" rel="stylesheet" media="screen" href="/sites/lib.csusm.edu/themes/intranet/test.css">
    <?php print $scripts ?>
    <?php print $ie ?>
    <title><?php print $head_title ?></title>
  </head>
  <body <?php print drupal_attributes($attr) ?>>

  <?php print $skipnav ?>

  <div id='global'><div class='limiter clear-block'>
    <?php if ($header): ?>
      <div id='header' class='dropdown-blocks toggle-blocks clear-block'>
        <?php print $header ?>
      </div>
    <?php endif; ?>
    <?php print $breadcrumb ?>
    <div id="issue-report"><a href="/base/projects/project0115/issues/new" target="_blank">Report Issue</a></div>
    <div id="bkmarklet-wrapper"><a href="javascript:u=document.location.href;t=document.title;s=window.getSelection();%20void(window.open(%22https://lib.csusm.edu/library_all/node/add/bookmark?edit[title]=%22+escape(t)+%20'&edit[field_description][0][value]='+escape(s)+'&edit[field_url_redirect][0][value]='+escape(u),'_blank',%20'width=724,height=500,status=yes,resizable=yes,scrollbars=yes'));">Bookmarkit</a><div class="bkmark-inst"><span class="arrow"></span>drag to your bookmarks bar to share webpages!</div></div>
    <?php print $logo ?>
  </div></div>

  <?php if ($primary_links): ?>
  <div id='navigation'><div class='limiter clear-block'>
    <?php if (isset($primary_links)) print theme('links', $primary_links, array('id' => 'features-menu', 'class' => 'links primary-links')) ?>
    <?php if ($space_tools): ?>
      <div id='space-tools'><div class='dropdown-blocks toggle-blocks clear-block'><?php print $space_tools ?></div></div>
    <?php endif; ?>
  </div></div>
  <?php endif; ?>

  <div id='page-tools'><div class='limiter clear-block'>
    <?php if ($title): ?><h1 <?php print drupal_attributes($title_attr) ?>><?php print $title ?></h1><?php endif; ?>
    <?php if ($tabs):?><div class='tabs clear-block'><?php print $tabs ?></div><?php endif; ?>
    <?php if ($help_toggler):?><?php print $help_toggler ?><?php endif; ?>
    <?php if ($context_links): ?><div class='context-links'><?php print $context_links ?></div><?php endif; ?>
    <?php if ($page_tools): ?><div class='dropdown-blocks toggle-blocks clear-block'><?php print $page_tools ?></div><?php endif; ?>
  </div></div>

  <?php if ($tabs2): ?>
    <div id='secondary-tabs'><div class='limiter clear-block'><?php print $tabs2 ?></div></div>
  <?php endif; ?>

  <?php if ($messages): ?><div id='messages'><?php print $messages; ?></div><?php endif; ?>

  <div id='page'><div class='limiter clear-block'>
    <?php if ($mission): ?><div class="mission"><?php print $mission ?></div><?php endif; ?>
