<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for role: owner
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $role = null;
    $group   = null;

    if( !$role = $orm->getByKey( 'WbfsysDocuTree', 'wbf-role-owner' ) )
    {
      $role = new WbfsysDocuTree_Entity();
      $role->access_key = 'wbf-role-owner';
    }

    $role->upgrade( 'title', 'Role owner' );
    $role->upgrade( 'short_desc', 'Role ' );
    $role->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Role owner</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Beschreibung</legend>
owner
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
    
  <ul id="wgt-list-daidalos-docu-role-permission-owner" class="wcm wcm_ui_tree bw62" >
    
      <li id="wgt-list-docu-role-wqd" >
        <span>wqd</span>
        <div class="right bw3" ><p>Wqd</p>&nbsp;</div>
        <div class="right bw1" >update</div>
        <div class="wgt-clear tiny" >&nbsp;</div>
        <ul>    
      <li id="wgt-list-docu-role-wqd-wdwd" >
        <span>wdwd</span>
        <div class="right bw3" >wdwd&nbsp;</div>
        <div class="right bw1" >assign</div>
        <div class="wgt-clear tiny" >&nbsp;</div>
        <ul>    
      <li id="wgt-list-docu-role-wqd-wdwd-fewfe" >
        <span>fewfe</span>
        <div class="right bw3" >fewfe&nbsp;</div>
        <div class="right bw1" >publish</div>
        <div class="wgt-clear tiny" >&nbsp;</div>
        
      </li>
    </ul>
      </li>
    </ul>
      </li>
    
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
    
  <ul id="wgt-list-daidalos-docu-role-backpath-owner" class="wcm wcm_ui_tree bw62" >

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
    if( !$group = $orm->getByKey( 'WbfsysDocuTree', "wbf-role-owner" ) )
    {
      $group = new WbfsysDocuTree_Entity();
      $group->access_key = 'wbf-role-owner';
    }
    
    $role->upgrade( 'title', 'Role owner' );
    $role->upgrade( 'content', 'owner' );

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

