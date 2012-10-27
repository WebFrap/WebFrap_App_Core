<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management: wbfsys_entity_color_scheme
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $management = null;

    if( !$management = $orm->getByKey( 'WbfsysDocuTree', 'wbf-management-wbfsys_entity_color_scheme' ) )
    {
      $management = new WbfsysDocuTree_Entity();
      $management->access_key = 'wbf-management-wbfsys_entity_color_scheme';
    }

    $management->upgrade( 'title', 'Management Wbfsys Entity Color Scheme' );
    $management->upgrade( 'short_desc', 'Management ' );
    $management->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Management Knoten Wbfsys Entity Color Scheme</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>

</fieldset>



HTML;

    $management->upgrade( 'template', 'page' );
    $management->m_parent = $orm->getByKey( 'WbfsysDocuTree', 'wbf-management' );
    
    try
    {
      if( $management->isNew() )
      {
        $orm->insert( $management );
      }
      else
      {
        
        $orm->update( $management );
      
      }
    }
    catch( Exception $e )
    {
    
    }

