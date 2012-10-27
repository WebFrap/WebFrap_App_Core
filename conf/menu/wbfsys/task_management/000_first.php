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
    'Task Management',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=task_management',
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

// check if the active role has access for Task
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_task:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_task',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Tasks',
      'wbfsys.task.label'
    ),
    $this->view->i18n->l
    (
      'Tasks',
      'wbfsys.task.label'
    ),
    $this->interface.'?c=Wbfsys.Task.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_task'
  );

}
