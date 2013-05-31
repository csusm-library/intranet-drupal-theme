<?php
// $Id: twocol.inc,v 1.1.2.3 2010/06/22 15:54:25 merlinofchaos Exp $

// Plugin definition
$plugin = array(
  'title' => t('Two column - Wide Left'),
  'category' => t('Columns: 2'),
  'icon' => 'wideleft.png',
  'theme' => 'wideleft',
  'css' => 'wideleft.css',
  'panels' => array(
    'left' => t('Left side'),
    'leftlower' => t('Left Lower'),
    'right' => t('Right 1'),
    'right2' => t('Right 2'),
    'right3' => t('Right 3'),
    'right4' => t('Right 4')
  ),
);
