<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for module: Core
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the module
    $module = null;

    if( !$module = $orm->getByKey( 'WbfsysModule', 'core' ) )
    {
      $module = new WbfsysModule_Entity();
      $module->name        = ucfirst('Core-Data');
      $module->access_key  = 'core';
      $module->revision    = $deployRevision;
      $module->description = '';
    }
    else
    {
      if( $module->access_key !== 'core' )
      {
        $module->name        = ucfirst('Core-Data');
        $module->access_key  = 'core';
        $module->description = '';
      }
    }
    
    $module->revision    = $deployRevision;
    $orm->save( $module );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mod-core' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mod-core';

      $secArea->id_level_listing = 90;
      $secArea->id_level_access   = 90;
      $secArea->id_level_insert   = 90;
      $secArea->id_level_update   = 90;
      $secArea->id_level_delete   = 90;
      $secArea->id_level_admin    = 90;

      $secArea->id_ref_listing = 90;
      $secArea->id_ref_access  = 90;
      $secArea->id_ref_insert  = 90;
      $secArea->id_ref_update  = 90;
      $secArea->id_ref_delete  = 90;
      $secArea->id_ref_admin   = 90;
      
      $secArea->vid            = $orm->getByKey( 'WbfsysModule', 'core' );
      $secArea->id_vid_entity  = $orm->getByKey( 'WbfsysEntity', 'wbfsys_module' );    
      
    }
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'root' ) ); 
    $secArea->upgrade( 'parent_key', 'root' ); 
    $secArea->upgrade( 'label', 'Module: Core-Data' ); 
    $secArea->upgrade( 'description', "Security Area Module: Core-Data" );
    $secArea->upgrade( 'type_key', "module" );
    
    $secArea->revision  = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'Core',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea Core-Data'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'Core',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea Core-Data'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'Core',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea Core-Data '.$e->getMessage()
      ));
    }
    
    // categories
    /////////////////////////////////////
    
    $modCoreCat = null;

    if( !$modCoreCat = $orm->getByKey( 'WbfsysModuleCategory', 'core-cat-core_data' ) )
    {
      $modCoreCat = new WbfsysModuleCategory_Entity();
      $modCoreCat->name        = ucfirst('Core-Data Cat Coredata');
      $modCoreCat->access_key  = 'core-cat-core_data';
      $modCoreCat->revision    = $deployRevision;
    }
    
    $modCoreCat->revision    = $deployRevision;
    $orm->save( $modCoreCat );
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mod-core-cat-core_data' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mod-core-cat-core_data';

      $secArea->id_level_listing = 90;
      $secArea->id_level_access   = 90;
      $secArea->id_level_insert   = 90;
      $secArea->id_level_update   = 90;
      $secArea->id_level_delete   = 90;
      $secArea->id_level_admin    = 90;

      $secArea->id_ref_listing = 90;
      $secArea->id_ref_access  = 90;
      $secArea->id_ref_insert  = 90;
      $secArea->id_ref_update  = 90;
      $secArea->id_ref_delete  = 90;
      $secArea->id_ref_admin   = 90;
      
      $secArea->vid            = $orm->getByKey( 'WbfsysModuleCategory', 'core-cat-core_data' );
      $secArea->id_vid_entity  = $orm->getByKey( 'WbfsysEntity', 'wbfsys_module_category' );   
      $secArea->type_key = 'module-category';    
      
    }
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-core' ) ); 
    $secArea->upgrade( 'parent_key', 'mod-core' ); 
    $secArea->upgrade( 'label', 'Module Categry: Core-Data Coredata' ); 
    $secArea->upgrade( 'description', "Security Area Module Categry: Core-Data Coredata" );
    
    $secArea->revision  = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'Core',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea Core-Data'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'Core',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea Core-Data'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'Core',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea Core-Data '.$e->getMessage()
      ));
    }
    
    
    // roles
    /////////////////////////////////////
    
    // admin role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', 'core_admin' ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'core_admin';

      $group->name     = 'Core-Data Admin';
      $group->level    = User::LEVEL_L2_MANAGER;
      $group->system   = true;
      $group->id_module  = $module;
      $group->revision   = $deployRevision;
      $group->description = <<<DESCRIPTION
This ist the default Admin Role for the Core-Data Module.
Members of this Role can administrate the module, means assign Userrights,
do maintenance, and change all data.

DESCRIPTION;
      

      $orm->insert( $group );
      $this->protocol(array(
        'insert',
        'Core',
        'WbfsysRoleGroup',
        'Sucessfully created new Group Core-Data'
      ));
    }
    else
    {
      $group->revision  = $deployRevision;
      $orm->update( $group );
    }



    // maintenance role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', 'core_maintenance' ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'core_maintenance';

      $group->name     = 'Core-Data Maintenance';
      $group->level    = User::LEVEL_L3_MANAGER;
      $group->system   = true;
      $group->id_module  = $module;
      $group->revision    = $deployRevision;
      $group->description = <<<DESCRIPTION
This ist the default Maintenance Role for the Core-Data Module.
Members of this Role do the Maintenance for this Module.

DESCRIPTION;

      $orm->insert( $group );
      $this->protocol(array(
        'insert',
        'Core',
        'WbfsysRoleGroup',
        'Sucessfully created new Group Core-Data'
      ));
    }
    else
    {
      $group->revision  = $deployRevision;
      $orm->update( $group );
    }

    // staff role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', 'core_staff' ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'core_staff';

      $group->name     = 'Core-Data Staff';
      $group->level    = User::LEVEL_EMPLOYEE;
      $group->system   = true;
      $group->id_module  = $module;
      $group->revision    = $deployRevision;
      $group->description   = <<<DESCRIPTION
This ist the default Worker Role for the Core-Data Module.
Members of this Role are permited to do daily work with this module.

DESCRIPTION;

      $orm->insert( $group );
      $this->protocol(array(
        'insert',
        'Core',
        'WbfsysRoleGroup',
        'Sucessfully created new Group Core-Data'
      ));
    }
    else
    {
      $group->revision  = $deployRevision;
      $orm->update( $group );
    }


