<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for service: wbfsys_security_area
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $service = null;

    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$service = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-service-wbfsys_security_area' AND id_lang=".$langNode->getId() ) )
    {
      $service = new WbfsysDocuTree_Entity();
      $service->access_key = 'wbf-service-wbfsys_security_area';
      $service->id_lang     = $langNode->getId();
    }
    
    $service->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-service' AND id_lang=".$langNode->getId() );

    $service->upgrade( 'title', 'Service Wbfsys Security Area' );
    $service->upgrade( 'short_desc', '' );
    $service->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Service: Wbfsys Security Area</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>
Für diesen Service wurde in dieser Sprache leider noch keine Dokumentation hinterlegt.
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

