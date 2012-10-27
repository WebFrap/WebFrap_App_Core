<?php
/*//////////////////////////////////////////////////////////////////////////////
// create access roles: core_country_category
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'maintenance' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-core_country_category' );
    $access->access_level      = Acl::MAINTENANCE;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: maintenance, failed to create assignment to Area: mgmt-core_country_category" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-core_country_category, failed to create assignment to Grouprole: maintenance" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-core' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'core_maintenance' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-core_country_category' );
    $access->access_level      = Acl::MAINTENANCE;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: core_maintenance, failed to create assignment to Area: mgmt-core_country_category" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-core_country_category, failed to create assignment to Grouprole: core_maintenance" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-core' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'admin' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-core_country_category' );
    $access->access_level      = Acl::ADMIN;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: admin, failed to create assignment to Area: mgmt-core_country_category" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-core_country_category, failed to create assignment to Grouprole: admin" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-core' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'core_admin' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-core_country_category' );
    $access->access_level      = Acl::ADMIN;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: core_admin, failed to create assignment to Area: mgmt-core_country_category" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-core_country_category, failed to create assignment to Grouprole: core_admin" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-core' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'user' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-core_country_category' );
    $access->access_level      = Acl::LISTING;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: user, failed to create assignment to Area: mgmt-core_country_category" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-core_country_category, failed to create assignment to Grouprole: user" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-core' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'employee' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-core_country_category' );
    $access->access_level      = Acl::LISTING;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: employee, failed to create assignment to Area: mgmt-core_country_category" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-core_country_category, failed to create assignment to Grouprole: employee" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-core' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'core_staff' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-core_country_category' );
    $access->access_level      = Acl::LISTING;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: core_staff, failed to create assignment to Area: mgmt-core_country_category" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-core_country_category, failed to create assignment to Grouprole: core_staff" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-core' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }
