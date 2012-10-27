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
    'User Management',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=user_management',
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

// check if the active role has access for User Roles
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_role_group:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_role_group',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'User Roles',
      'wbfsys.role_group.label'
    ),
    $this->view->i18n->l
    (
      'User Roles',
      'wbfsys.role_group.label'
    ),
    $this->interface.'?c=Wbfsys.RoleGroup.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_role_group'
  );

}
