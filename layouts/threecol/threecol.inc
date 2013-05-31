<?php
// $Id: twocol.inc,v 1.1.2.3 2010/06/22 15:54:25 merlinofchaos Exp $

// Plugin definition
$plugin = array(
  'title' => t('Three columns'),
  'category' => t('Columns: 3'),
  'icon' => 'threecol.png',
  'theme' => 'threecol',
  'css' => 'threecol.css',
  'panels' => array(
    'left' => t('Left'),
    'middle' => t('Middle'),
    'right' => t('Right'),
  ),
);
