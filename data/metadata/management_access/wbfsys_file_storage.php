<?php
/*//////////////////////////////////////////////////////////////////////////////
// create access roles: wbfsys_file_storage
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'information_manager' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_file_storage' );
    $access->access_level    = Acl::ADMIN;
    $access->ref_access_level = Acl::ADMIN;
    $access->partial         = 0;
    $access->description = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: information_manager, failed to create assignment to Area: mgmt-wbfsys_file_storage" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_file_storage, failed to create assignment to Grouprole: information_manager" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array
          ( 
            'mod-wbfsys'
          ), 
          true 
        );
      }
      catch( Exception $e )
      {
        
      }
    }
