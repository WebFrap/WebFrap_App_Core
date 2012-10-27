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
    'core',
    $this->interface.'?c=core.base.menu',
    'places/module.png'
   ),
);

$this->firstEntry = array
(
  'menu_webfrap_root',
  Wgt::AJAX,
  '..',
  'webfrap root',
  $this->interface.'?c=Webfrap.Navigation.explorer',
  'places/folder_up.png',
);

if( $acl->access( 'mod-core:admin', null, true ) )
{

  $this->files[] = array
  (
    'menu-category-core-acl',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Core ACLs',
      'core.label'
    ),
    $this->view->i18n->l
    (
      'Core ACLs',
      'core.label'
    ),
    $this->interface.'?c=core.Base_Acl.listing',
    'places/acl.png',
    'mod-core:admin'
  );

}

$this->folders[] = array
(
  'menu_category_default',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Default',
    'core.label'
  ),
  $this->view->i18n->l
  (
    'Default',
    'core.label'
  ),
  $this->interface.'?c=Core.base.menu&amp;menu=default',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_master_data',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Master Data',
    'core.label'
  ),
  $this->view->i18n->l
  (
    'Master Data',
    'core.label'
  ),
  $this->interface.'?c=Core.base.menu&amp;menu=master_data',
  'places/category.png',
);

// check if the active role has access for Organisation
if( $acl->access( 'mod-core>mgmt-core_organisation:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_organisation',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Organisations',
      'core.organisation.label'
    ),
    $this->view->i18n->l
    (
      'Organisations',
      'core.organisation.label'
    ),
    $this->interface.'?c=Core.Organisation.listing',
    'places/entity.png',
     'mod-core>mgmt-core_organisation'
  );

}

// check if the active role has access for Person
if( $acl->access( 'mod-core>mgmt-core_person:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_person',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Persons',
      'core.person.label'
    ),
    $this->view->i18n->l
    (
      'Persons',
      'core.person.label'
    ),
    $this->interface.'?c=Core.Person.listing',
    'places/entity.png',
     'mod-core>mgmt-core_person'
  );

}
