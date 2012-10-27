<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management: wbfsys_issue
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $management = null;

    if( !$management = $orm->getByKey( 'WbfsysManagement', 'wbfsys_issue' ) )
    {
      $management = new WbfsysManagement_Entity();
      $management->access_key = 'wbfsys_issue';

      $management->name      = 'Issue';
      $management->id_module = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $management->id_entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_issue' );
      $management->description = '';
    }
    
    $management->revision    = $deployRevision;
    $orm->save( $management );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_issue' ) )
    {

      // security area wird nur befüllt wenn sie nicht schon existiert
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_issue';

      $secArea->label      = 'Mgmt: Issue';
      $secArea->id_level_listing = 90;
      $secArea->id_level_access = 90;
      $secArea->id_level_insert = 90;
      $secArea->id_level_update = 90;
      $secArea->id_level_delete = 90;
      $secArea->id_level_admin  = 90;

      $secArea->id_ref_listing = 90;
      $secArea->id_ref_access  = 90;
      $secArea->id_ref_insert  = 90;
      $secArea->id_ref_update  = 90;
      $secArea->id_ref_delete  = 90;
      $secArea->id_ref_admin   = 90;

    }
    
    // verweist auf die entity als parent
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_issue' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_issue' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_issue' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'mgmt' );
    $secArea->upgrade( 'description', "Management: Issue for Source: wbfsys_issue" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
      
    // first clean the management
    $access = new WbfsysSecurityAccess_Entity();

    $access->id_group  = $orm->getByKey( 'WbfsysRoleGroup', 'owner' );
    $access->id_area   = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_issue' );
    $access->access_level      = Acl::DELETE;
    $access->ref_access_level  = Acl::DELETE;
    $access->partial         = 0;
    $access->description = 'Track Owners';

    if( !$access->id_group )
    {
      $respsonse->addError( "Missing Grouprole: owner, failed to create assignment to Area: mgmt-wbfsys_issue" );
    }
    else if( !$access->id_area )
    {
      $respsonse->addError( "Missing Area: mgmt-wbfsys_issue, failed to create assignment to Grouprole: owner" );
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
      
    
    // masken
    if( !$maskTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_issue-table' ) )
    {
      $maskTable = new WbfsysMask_Entity();
      $maskTable->access_key = 'wbfsys_issue-table';
      $maskTable->access_url = 'Wbfsys.Issue.listing&amp;ltype=table';

      $maskTable->name            = 'Table Issue';
      $maskTable->context         = 'table';
      $maskTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTable->id_management   = $management;
      $maskTable->dset_mask      = false;
    }
    $maskTable->revision    = $deployRevision;
    $orm->save( $maskTable );
    
    // die create maske
    if( !$maskCreate = $orm->getByKey( 'WbfsysMask', 'wbfsys_issue-create' ) )
    {
      $maskCreate = new WbfsysMask_Entity();
      $maskCreate->access_key = 'wbfsys_issue-create';
      $maskCreate->access_url = 'Wbfsys.Issue.create';

      $maskCreate->name            = 'Create Issue';
      $maskCreate->context         = 'create';
      $maskCreate->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskCreate->dset_mask        = false;
    }
    $maskCreate->id_management   = $management;
    $maskCreate->revision    = $deployRevision;
    $orm->save( $maskCreate );
    
    // die edit maske
    if( !$maskEdit = $orm->getByKey( 'WbfsysMask', 'wbfsys_issue-edit' ) )
    {
      $maskEdit = new WbfsysMask_Entity();
      $maskEdit->access_key = 'wbfsys_issue-edit';
      $maskEdit->access_url = 'Wbfsys.Issue.edit';

      $maskEdit->name            = 'Edit Issue';
      $maskEdit->context         = 'edit';
      $maskEdit->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskEdit->dset_mask        = true;
    }
    $maskEdit->id_management   = $management;
    $maskEdit->revision    = $deployRevision;
    $orm->save( $maskEdit );
    
    // die show maske
    if( !$maskShow = $orm->getByKey( 'WbfsysMask', 'wbfsys_issue-show' ) )
    {
      $maskShow = new WbfsysMask_Entity();
      $maskShow->access_key = 'wbfsys_issue-show';
      $maskShow->access_url = 'Wbfsys.Issue.show';

      $maskShow->name            = 'Show Issue';
      $maskShow->context         = 'edit';
      $maskShow->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskShow->dset_mask        = true;
    }
    $maskShow->id_management   = $management;
    $maskShow->revision    = $deployRevision;
    $orm->save( $maskShow );
    