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
    'Announcement',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=announcement',
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

// check if the active role has access for Announcement
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_announcement:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_announcement',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Announcements',
      'wbfsys.announcement.label'
    ),
    $this->view->i18n->l
    (
      'Announcements',
      'wbfsys.announcement.label'
    ),
    $this->interface.'?c=Wbfsys.Announcement.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_announcement'
  );

}
