<?php
/*//////////////////////////////////////////////////////////////////////////////
// create access roles: wbfsys_comment_rating_type
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'maintenance' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment_rating_type' );
    $access->access_level      = Acl::MAINTENANCE;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: maintenance, failed to create assignment to Area: mgmt-wbfsys_comment_rating_type" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_comment_rating_type, failed to create assignment to Grouprole: maintenance" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-wbfsys' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'wbfsys_maintenance' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment_rating_type' );
    $access->access_level      = Acl::MAINTENANCE;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: wbfsys_maintenance, failed to create assignment to Area: mgmt-wbfsys_comment_rating_type" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_comment_rating_type, failed to create assignment to Grouprole: wbfsys_maintenance" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-wbfsys' ), 
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
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment_rating_type' );
    $access->access_level      = Acl::ADMIN;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: admin, failed to create assignment to Area: mgmt-wbfsys_comment_rating_type" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_comment_rating_type, failed to create assignment to Grouprole: admin" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-wbfsys' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'wbfsys_admin' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment_rating_type' );
    $access->access_level      = Acl::ADMIN;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: wbfsys_admin, failed to create assignment to Area: mgmt-wbfsys_comment_rating_type" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_comment_rating_type, failed to create assignment to Grouprole: wbfsys_admin" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-wbfsys' ), 
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
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment_rating_type' );
    $access->access_level      = Acl::LISTING;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: user, failed to create assignment to Area: mgmt-wbfsys_comment_rating_type" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_comment_rating_type, failed to create assignment to Grouprole: user" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-wbfsys' ), 
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
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment_rating_type' );
    $access->access_level      = Acl::LISTING;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: employee, failed to create assignment to Area: mgmt-wbfsys_comment_rating_type" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_comment_rating_type, failed to create assignment to Grouprole: employee" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-wbfsys' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }

    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'wbfsys_staff' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment_rating_type' );
    $access->access_level      = Acl::LISTING;
    $access->ref_access_level  = Acl::LISTING;
    $access->partial         = 0;
    $access->description     = '';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: wbfsys_staff, failed to create assignment to Area: mgmt-wbfsys_comment_rating_type" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_comment_rating_type, failed to create assignment to Grouprole: wbfsys_staff" );
    }
    else
    {
      try
      {
        $aclManager->createAreaAssignment
        ( 
          $access, 
          array( 'mod-wbfsys' ), 
          true 
        );
      }
      catch( Exception $e )
      {
  
      }
    }
