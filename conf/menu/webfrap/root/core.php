<?php

// check if the user has acces to the module
if( $acl->access( 'mod-core:listing', null, true ) )
{
  $this->folders[] = array
  (
    'menu_mod_core',
    Wgt::AJAX,
    $this->view->i18n->l( 'Core-Data', 'core.text' ),
    $this->view->i18n->l( 'Core-Data', 'core.text' ),
    $this->interface.'?c=core.base.menu',
    'places/module.png',
  );
}
