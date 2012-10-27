<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for module: Crm
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $module = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$module = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-module-Crm' AND id_lang=".$langNode->getId() ) )
    {
      $module = new WbfsysDocuTree_Entity();
      $module->access_key = 'wbf-module-Crm';
      $module->id_lang     = $langNode->getId();
    }

    $module->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-module' AND id_lang=".$langNode->getId() );


    $module->upgrade( 'title', 'Module Crm' );
    $module->upgrade( 'short_desc', '' );
    $module->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Module Crm</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>
Für dieses Module wurde in dieser Sprache leider noch keine Dokumentation hinterlegt.
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

