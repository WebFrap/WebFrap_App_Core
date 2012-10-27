<?php

$this->crumbs = array
(
  array
  (
    'Root',
    $this->interface.'?c=Webfrap.Navigation.explorer',
    'places/desktop.png'
  ),
  array
  (
    'Wbfsys',
    $this->interface.'?c=wbfsys.base.menu',
    'places/module.png'
  ),
  /*
  array
  (
    $this->view->i18n->l('Categories','wbf.label'),
    $this->interface.'?c=wbfsys.base.menu&amp;menu=categories',
    'places/category.png'
  ),
  */
  array
  (
    'Process',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=process',
    'places/folder.png'
  ),
);

$this->firstEntry = array
(
  'menu_categories_wbfsys_back',
  Wgt::AJAX,
  '..',
  $this->view->i18n->l('Back','wbf.label'),
  $this->interface.'?c=wbfsys.base.menu',
  'places/category.png',
);

// check if the active role has access for Process
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_process',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Process',
      'wbfsys.process.label'
    ),
    $this->view->i18n->l
    (
      'Process',
      'wbfsys.process.label'
    ),
    $this->interface.'?c=Wbfsys.Process.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}
