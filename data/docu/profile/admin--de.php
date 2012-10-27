<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for profile: admin
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $profile = null;
    $group   = null;

    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$profile = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-profile-admin' AND id_lang=".$langNode->getId() ) )
    {
      $profile = new WbfsysDocuTree_Entity();
      $profile->access_key = 'wbf-profile-admin';
      $profile->id_lang     = $langNode->getId();
    }


    $profile->upgrade( 'title', 'Profile admin' );
    $profile->upgrade( 'short_desc', '' );
    $profile->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Profile admin</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Beschreibung</legend>
Für dieses Profil wurde in dieser Sprache leider noch keine Beschreibung hinterlegt.
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
    
  <ul id="wgt-list-daidalos-docu-profile-permission-admin" class="wcm wcm_ui_tree bw62" >

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
    
  <ul id="wgt-list-daidalos-docu-profile-backpath-admin" class="wcm wcm_ui_tree bw62" >

  </ul>
  
</div>

HTML;

    $profile->upgrade( 'template', 'page' );
    $profile->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-profile' AND id_lang=".$langNode->getId() );
    
    try
    {
      if( $profile->isNew() )
      {
        $orm->insert( $profile );
      }
      else
      {
        
        $orm->update( $profile );
      
      }
    }
    catch( Exception $e )
    {
    
    }
    
    /*
    // plain role
    if( !$group = $orm->getByKey( 'WbfsysDocuTree', "wbf-role-admin" ) )
    {
      $group = new WbfsysDocuTree_Entity();
      $group->access_key = 'wbf-role-admin';
    }
    
    $group->upgrade( 'title', 'Role admin' );
    $group->upgrade( 'content', 'admin' );

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

