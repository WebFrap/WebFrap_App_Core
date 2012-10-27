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
    'Admin',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=admin',
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
