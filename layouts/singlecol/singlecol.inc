<?php
// Plugin definition
$plugin = array(
  'title' => t('Single column - three rows'),
  'category' => t('Columns: 1'),
  'icon' => 'singlecol.png',
  'theme' => 'singlecol',
  'css' => 'singlecol.css',
  'panels' => array(
    'top' => t('Top'),
    'middle' => t('Middle'),
    'bottom' => t('Bottom'),
  ),
);
