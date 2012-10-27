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
    'Message',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=message',
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

// check if the active role has access for Message
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_message',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Messages',
      'wbfsys.message.label'
    ),
    $this->view->i18n->l
    (
      'Messages',
      'wbfsys.message.label'
    ),
    $this->interface.'?c=Wbfsys.Message.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_message'
  );

}
