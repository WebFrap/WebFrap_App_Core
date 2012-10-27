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
    'System Structure',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=system_structure',
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

// check if the active role has access for App
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_app',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Apps',
      'wbfsys.app.label'
    ),
    $this->view->i18n->l
    (
      'Apps',
      'wbfsys.app.label'
    ),
    $this->interface.'?c=Wbfsys.App.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Desktop
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_desktop',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Desktops',
      'wbfsys.desktop.label'
    ),
    $this->view->i18n->l
    (
      'Desktops',
      'wbfsys.desktop.label'
    ),
    $this->interface.'?c=Wbfsys.Desktop.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Entity
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_entity',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Entitys',
      'wbfsys.entity.label'
    ),
    $this->view->i18n->l
    (
      'Entitys',
      'wbfsys.entity.label'
    ),
    $this->interface.'?c=Wbfsys.Entity.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Entity Attribute
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_entity_attribute',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Entity Attributes',
      'wbfsys.entity_attribute.label'
    ),
    $this->view->i18n->l
    (
      'Entity Attributes',
      'wbfsys.entity_attribute.label'
    ),
    $this->interface.'?c=Wbfsys.EntityAttribute.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Event
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_event',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Events',
      'wbfsys.event.label'
    ),
    $this->view->i18n->l
    (
      'Events',
      'wbfsys.event.label'
    ),
    $this->interface.'?c=Wbfsys.Event.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Item
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_item',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Items',
      'wbfsys.item.label'
    ),
    $this->view->i18n->l
    (
      'Items',
      'wbfsys.item.label'
    ),
    $this->interface.'?c=Wbfsys.Item.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Management Node
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_management',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Management Nodes',
      'wbfsys.management.label'
    ),
    $this->view->i18n->l
    (
      'Management Nodes',
      'wbfsys.management.label'
    ),
    $this->interface.'?c=Wbfsys.Management.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Mask
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_mask:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_mask',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Masks',
      'wbfsys.mask.label'
    ),
    $this->view->i18n->l
    (
      'Masks',
      'wbfsys.mask.label'
    ),
    $this->interface.'?c=Wbfsys.Mask.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_mask'
  );

}

// check if the active role has access for Module
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_module',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Modules',
      'wbfsys.module.label'
    ),
    $this->view->i18n->l
    (
      'Modules',
      'wbfsys.module.label'
    ),
    $this->interface.'?c=Wbfsys.Module.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Package
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_package',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Packages',
      'wbfsys.package.label'
    ),
    $this->view->i18n->l
    (
      'Packages',
      'wbfsys.package.label'
    ),
    $this->interface.'?c=Wbfsys.Package.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Widget
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_widget',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Widgets',
      'wbfsys.widget.label'
    ),
    $this->view->i18n->l
    (
      'Widgets',
      'wbfsys.widget.label'
    ),
    $this->interface.'?c=Wbfsys.Widget.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}
