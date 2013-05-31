<?php
// $Id: twocol.inc,v 1.1.2.3 2010/06/22 15:54:25 merlinofchaos Exp $

// Plugin definition
$plugin = array(
  'title' => t('Two column - Wide Right'),
  'category' => t('Columns: 2'),
  'icon' => 'wideright.png',
  'theme' => 'wideright',
  'css' => 'wideright.css',
  'panels' => array(
    'right' => t('Right side'),
    'rightlower' => t('Right Lower'),
    'left' => t('Left 1'),
    'left2' => t('Left 2'),
    'left3' => t('Left 3')
  ),
);
