<?php
// auto-generated by sfSecurityConfigHandler
// date: 2014/04/14 17:52:38
$this->security = array (
  'all' => 
  array (
    'is_secure' => 'on',
  ),
  'index' => 
  array (
    'credentials' => 
    array (
      0 => 'eventos_view',
    ),
  ),
  'new' => 
  array (
    'credentials' => 
    array (
      0 => 'eventos_view',
      1 => 'eventos_insert',
    ),
  ),
  'create' => 
  array (
    'credentials' => 
    array (
      0 => 'eventos_view',
      1 => 'eventos_insert',
    ),
  ),
  'edit' => 
  array (
    'credentials' => 
    array (
      0 => 'eventos_view',
      1 => 'eventos_update',
    ),
  ),
  'delete' => 
  array (
    'credentials' => 
    array (
      0 => 'eventos_view',
      1 => 'eventos_delete',
    ),
  ),
  'deleteall' => 
  array (
    'credentials' => 
    array (
      0 => 'eventos_view',
      1 => 'eventos_delete',
    ),
  ),
);
