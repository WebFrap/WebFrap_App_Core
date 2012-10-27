<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for module: Wbfsys
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the module
    $module = null;

    if( !$module = $orm->getByKey( 'WbfsysModule', 'wbfsys' ) )
    {
      $module = new WbfsysModule_Entity();
      $module->name        = ucfirst('System Data');
      $module->access_key  = 'wbfsys';
      $module->revision    = $deployRevision;
      $module->description = '';
    }
    else
    {
      if( $module->access_key !== 'wbfsys' )
      {
        $module->name        = ucfirst('System Data');
        $module->access_key  = 'wbfsys';
        $module->description = '';
      }
    }
    
    $module->revision    = $deployRevision;
    $orm->save( $module );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mod-wbfsys' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mod-wbfsys';

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
      
      $secArea->vid            = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $secArea->id_vid_entity  = $orm->getByKey( 'WbfsysEntity', 'wbfsys_module' );    
      
    }
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'root' ) ); 
    $secArea->upgrade( 'parent_key', 'root' ); 
    $secArea->upgrade( 'label', 'Module: System Data' ); 
    $secArea->upgrade( 'description', "Security Area Module: System Data" );
    $secArea->upgrade( 'type_key', "module" );
    
    $secArea->revision  = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'Wbfsys',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea System Data'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'Wbfsys',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea System Data'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'Wbfsys',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea System Data '.$e->getMessage()
      ));
    }
    
    // categories
    /////////////////////////////////////
    
    $modCoreCat = null;

    if( !$modCoreCat = $orm->getByKey( 'WbfsysModuleCategory', 'wbfsys-cat-core_data' ) )
    {
      $modCoreCat = new WbfsysModuleCategory_Entity();
      $modCoreCat->name        = ucfirst('System Data Cat Coredata');
      $modCoreCat->access_key  = 'wbfsys-cat-core_data';
      $modCoreCat->revision    = $deployRevision;
    }
    
    $modCoreCat->revision    = $deployRevision;
    $orm->save( $modCoreCat );
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mod-wbfsys-cat-core_data' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mod-wbfsys-cat-core_data';

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
      
      $secArea->vid            = $orm->getByKey( 'WbfsysModuleCategory', 'wbfsys-cat-core_data' );
      $secArea->id_vid_entity  = $orm->getByKey( 'WbfsysEntity', 'wbfsys_module_category' );   
      $secArea->type_key = 'module-category';    
      
    }
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-wbfsys' ) ); 
    $secArea->upgrade( 'parent_key', 'mod-wbfsys' ); 
    $secArea->upgrade( 'label', 'Module Categry: System Data Coredata' ); 
    $secArea->upgrade( 'description', "Security Area Module Categry: System Data Coredata" );
    
    $secArea->revision  = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'Wbfsys',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea System Data'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'Wbfsys',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea System Data'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'Wbfsys',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea System Data '.$e->getMessage()
      ));
    }
    
    
    // roles
    /////////////////////////////////////
    
    // admin role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', 'wbfsys_admin' ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'wbfsys_admin';

      $group->name     = 'System Data Admin';
      $group->level    = User::LEVEL_L2_MANAGER;
      $group->system   = true;
      $group->id_module  = $module;
      $group->revision   = $deployRevision;
      $group->description = <<<DESCRIPTION
This ist the default Admin Role for the System Data Module.
Members of this Role can administrate the module, means assign Userrights,
do maintenance, and change all data.

DESCRIPTION;
      

      $orm->insert( $group );
      $this->protocol(array(
        'insert',
        'Wbfsys',
        'WbfsysRoleGroup',
        'Sucessfully created new Group System Data'
      ));
    }
    else
    {
      $group->revision  = $deployRevision;
      $orm->update( $group );
    }



    // maintenance role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', 'wbfsys_maintenance' ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'wbfsys_maintenance';

      $group->name     = 'System Data Maintenance';
      $group->level    = User::LEVEL_L3_MANAGER;
      $group->system   = true;
      $group->id_module  = $module;
      $group->revision    = $deployRevision;
      $group->description = <<<DESCRIPTION
This ist the default Maintenance Role for the System Data Module.
Members of this Role do the Maintenance for this Module.

DESCRIPTION;

      $orm->insert( $group );
      $this->protocol(array(
        'insert',
        'Wbfsys',
        'WbfsysRoleGroup',
        'Sucessfully created new Group System Data'
      ));
    }
    else
    {
      $group->revision  = $deployRevision;
      $orm->update( $group );
    }

    // staff role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', 'wbfsys_staff' ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'wbfsys_staff';

      $group->name     = 'System Data Staff';
      $group->level    = User::LEVEL_EMPLOYEE;
      $group->system   = true;
      $group->id_module  = $module;
      $group->revision    = $deployRevision;
      $group->description   = <<<DESCRIPTION
This ist the default Worker Role for the System Data Module.
Members of this Role are permited to do daily work with this module.

DESCRIPTION;

      $orm->insert( $group );
      $this->protocol(array(
        'insert',
        'Wbfsys',
        'WbfsysRoleGroup',
        'Sucessfully created new Group System Data'
      ));
    }
    else
    {
      $group->revision  = $deployRevision;
      $orm->update( $group );
    }


