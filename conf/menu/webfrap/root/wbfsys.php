<?php

// check if the user has acces to the module
if( $acl->access( 'mod-wbfsys:listing', null, true ) )
{
  $this->folders[] = array
  (
    'menu_mod_wbfsys',
    Wgt::AJAX,
    $this->view->i18n->l( 'System Data', 'wbfsys.text' ),
    $this->view->i18n->l( 'System Data', 'wbfsys.text' ),
    $this->interface.'?c=wbfsys.base.menu',
    'places/module.png',
  );
}
