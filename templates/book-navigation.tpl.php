<?php

/**
 * @file
 * Default theme implementation to navigate books.
 *
 * Presented under nodes that are a part of book outlines.
 *
 * Available variables:
 * - $tree: The immediate children of the current node rendered as an unordered
 *   list.
 * - $current_depth: Depth of the current node within the book outline. Provided
 *   for context.
 * - $prev_url: URL to the previous node.
 * - $prev_title: Title of the previous node.
 * - $parent_url: URL to the parent node.
 * - $parent_title: Title of the parent node. Not printed by default. Provided
 *   as an option.
 * - $next_url: URL to the next node.
 * - $next_title: Title of the next node.
 * - $has_links: Flags TRUE whenever the previous, parent or next data has a
 *   value.
 * - $book_id: The book ID of the current outline being viewed. Same as the node
 *   ID containing the entire outline. Provided for context.
 * - $book_url: The book/node URL of the current outline being viewed. Provided
 *   as an option. Not used by default.
 * - $book_title: The book/node title of the current outline being viewed.
 *   Provided as an option. Not used by default.
 *
 * @see template_preprocess_book_navigation()
 *
 * @ingroup themeable
 */
?>
<?php if ($tree || $has_links): ?>
  <div id="book-navigation-<?php print $book_id; ?>" class="book-nav-horizontal">
    <?php if (strlen($tree) != 0): ?>
      <div class="well">
        <?php print $tree;?>
      </div>
    <?php endif; ?>
    <?php if ($has_links): ?>
    <div class="pager-wrapper">
      <div class="btn-group" id="book-internal-nav">
        <?php if ($prev_url): ?>
          <?php if (strlen($prev_title) > 35):
            $prev_title = substr($prev_title, 0, 35) . "...";
          endif; ?>
          <button class="btn previous"><a href="<?php print $prev_url; ?>" class="" title="<?php print t('Go to previous page'); ?>"><span class="pager-text"><i class="icon-arrow-left"></i> <?php print $prev_title; ?></span></a></button>
        <?php else: ?>
          <button class="btn previous disabled"><a href="#"><i class="icon-arrow-left"></i></a></button>
        <?php endif; ?>
        <?php if ($parent_url): ?>
          <button class="btn"><a href="<?php print $parent_url; ?>" class="" title="<?php print t('Go to parent page'); ?>"><span class="pager-text"><i class="icon-arrow-up"></i> <?php print t('up'); ?></span></a></button>
        <?php else: ?>
          <button class="btn disabled"><a href="#"><i class="icon-arrow-up"></i></a></button>
        <?php endif; ?>
        <?php if ($next_url): ?>
          <?php if (strlen($next_title) > 35):
            $next_title = substr($next_title, 0, 35) . "...";
          endif; ?>
          <button class="btn next"><a href="<?php print $next_url; ?>" class="" title="<?php print t('Go to next page'); ?>"><span class="pager-text"><?php print $next_title; ?> <i class="icon-arrow-right"></i></span></a></button>
        <?php else: ?>
          <button class="btn next disabled"><a href="#"><i class="icon-arrow-right"></i></a></button>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
  </div>
<?php endif; ?>
