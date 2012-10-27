<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for module: Hosting
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $module = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$module = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-module-Hosting' AND id_lang=".$langNode->getId() ) )
    {
      $module = new WbfsysDocuTree_Entity();
      $module->access_key = 'wbf-module-Hosting';
      $module->id_lang     = $langNode->getId();
    }

    $module->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-module' AND id_lang=".$langNode->getId() );


    $module->upgrade( 'title', 'Module Hosting' );
    $module->upgrade( 'short_desc', '' );
    $module->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Module Hosting</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry. No description for this module yet.
</fieldset>



HTML;

    $module->upgrade( 'template', 'page' );
    $module->m_parent = $orm->getByKey( 'WbfsysDocuTree', 'wbf-module' );
    
    try
    {
      if( $module->isNew() )
      {
        $orm->insert( $module );
      }
      else
      {
        
        $orm->update( $module );
      
      }
    }
    catch( Exception $e )
    {
    
    }

