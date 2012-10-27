<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for role: guest
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $role = null;
    $group   = null;

    if( !$role = $orm->getByKey( 'WbfsysDocuTree', 'wbf-role-guest' ) )
    {
      $role = new WbfsysDocuTree_Entity();
      $role->access_key = 'wbf-role-guest';
    }

    $role->upgrade( 'title', 'Role Guest' );
    $role->upgrade( 'short_desc', 'Role ' );
    $role->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Role Guest</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Beschreibung</legend>
Für diese Rolle wurde in dieser Sprache leider noch keine Beschreibung hinterlegt.
</fieldset>

<div class="wgt-clear tiny" >&nbsp;</div>

<div class="bw61 wgt-space" >
  <h3>Zugriffsrechte</h3>
</div>
  
<div class="wgt-space" >
  
  <div class="wgt-head bw62" >
    <span>Area</span>
    <div class="right bw3" >Description</div>
    <div class="right bw1" >Level</div>
  </div>
    
  <ul id="wgt-list-daidalos-docu-role-permission-guest" class="wcm wcm_ui_tree bw62" >

  </ul>
  
</div>
  
<div class="wgt-clear small" >&nbsp;</div>

<div class="bw61 wgt-space" >
  <h3>Backpath Rechte</h3>
</div>

<div class="wgt-space" >
  
  <div class="wgt-head bw62" >
    <span>Area</span>
    <div class="right bw3" >Description</div>
    <div class="right bw1" >Level</div>
  </div>
    
  <ul id="wgt-list-daidalos-docu-role-backpath-guest" class="wcm wcm_ui_tree bw62" >

  </ul>
  
</div>

HTML;

    $role->upgrade( 'template', 'page' );
    
    $role->m_parent = $orm->getByKey( 'WbfsysDocuTree', 'wbf-role' );
    
    try
    {
      if( $role->isNew() )
      {
        $orm->insert( $role );
      }
      else
      {
        
        $orm->update( $role );
      
      }
    }
    catch( Exception $e )
    {
    
    }
    
    /*
    // plain role
    if( !$group = $orm->getByKey( 'WbfsysDocuTree', "wbf-role-guest" ) )
    {
      $group = new WbfsysDocuTree_Entity();
      $group->access_key = 'wbf-role-guest';
    }
    
    $role->upgrade( 'title', 'Role Guest' );
    $role->upgrade( 'content', '' );

    try
    {
      if( $group->isNew() )
      {
      
        $orm->insert( $group );
      }
      else
      {
        
        if( !$group->getSynchronized() )
        {
          $orm->update( $group );
        }
      
      }
    }
    catch( Exception $e )
    {
    }
    */

