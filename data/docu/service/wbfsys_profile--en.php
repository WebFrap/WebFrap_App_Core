<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for service: wbfsys_profile
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $service = null;

    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$service = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-service-wbfsys_profile' AND id_lang=".$langNode->getId() ) )
    {
      $service = new WbfsysDocuTree_Entity();
      $service->access_key = 'wbf-service-wbfsys_profile';
      $service->id_lang     = $langNode->getId();
    }
    
    $service->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-service' AND id_lang=".$langNode->getId() );

    $service->upgrade( 'title', 'Service Wbfsys Profile' );
    $service->upgrade( 'short_desc', '' );
    $service->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Service: Wbfsys Profile</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this service yet.
</fieldset>

HTML;

    $service->upgrade( 'template', 'page' );
    
    try
    {
      if( $service->isNew() )
      {
        $orm->insert( $service );
      }
      else
      {
        
        $orm->update( $service );
      
      }
    }
    catch( Exception $e )
    {
    
    }

