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
    'Core',
    $this->interface.'?c=core.base.menu',
    'places/module.png'
  ),
  /*
  array
  (
    $this->view->i18n->l('Categories','wbf.label'),
    $this->interface.'?c=core.base.menu&amp;menu=categories',
    'places/category.png'
  ),
  */
  array
  (
    'Master Data',
    $this->interface.'?c=core.base.menu&amp;menu=master_data',
    'places/folder.png'
  ),
);

$this->firstEntry = array
(
  'menu_categories_core_back',
  Wgt::AJAX,
  '..',
  $this->view->i18n->l('Back','wbf.label'),
  $this->interface.'?c=core.base.menu',
  'places/category.png',
);

// check if the active role has access for country Category
if( $acl->access( 'mod-core>mgmt-core_country_category:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_country_category',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'country Categorys',
      'core.country_category.label'
    ),
    $this->view->i18n->l
    (
      'country Categorys',
      'core.country_category.label'
    ),
    $this->interface.'?c=Core.CountryCategory.listing',
    'places/entity.png',
     'mod-core>mgmt-core_country_category'
  );

}

// check if the active role has access for name Type
if( $acl->access( 'mod-core>mgmt-core_name_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_name_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'name Types',
      'core.name_type.label'
    ),
    $this->view->i18n->l
    (
      'name Types',
      'core.name_type.label'
    ),
    $this->interface.'?c=Core.NameType.listing',
    'places/entity.png',
     'mod-core>mgmt-core_name_type'
  );

}
