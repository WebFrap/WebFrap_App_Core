<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_protocol_usage
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_protocol_usage' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_protocol_usage';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Wbfsys Protocol Usage' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Wbfsys Protocol Usage</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>
Für diesen Entity wurde in dieser Sprache leider noch keine Dokumentation hinterlegt.
</fieldset>

<label>Attribute</label>

<div id="wgt-grid-docu-entity-wbfsys_protocol_usage-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_protocol_usage-attributes-table" class="wcm wcm_widget_grid hide-head full" >
    <thead>
      <tr>
        <th class="pos" >Pos:</th>
        <th>Name</th>
        <th>Type</th>
        <th>Größe</th>
        <th>FK/U/R/IDX</th>
        <th>Beschreibung</th>
      </tr>
    </thead>
    <tbody>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-id_browser" >
        <td class="pos" >1</td>
        <td>id_browser::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_browser" class="wcm wcm_req_ajax" >wbfsys_browser</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-id_browser_version" >
        <td class="pos" >2</td>
        <td>id_browser_version::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_browser_version" class="wcm wcm_req_ajax" >wbfsys_browser_version</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-id_os" >
        <td class="pos" >3</td>
        <td>id_os::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_os" class="wcm wcm_req_ajax" >wbfsys_os</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-id_main_language" >
        <td class="pos" >4</td>
        <td>id_main_language::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_language" class="wcm wcm_req_ajax" >wbfsys_language</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-ip_address" >
        <td class="pos" >5</td>
        <td>ip_address</td>
        <td>inet</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-flag_sso" >
        <td class="pos" >6</td>
        <td>flag_sso</td>
        <td>boolean</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-rowid" >
        <td class="pos" >7</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-m_time_created" >
        <td class="pos" >8</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_usage-attr-m_role_create" >
        <td class="pos" >9</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>

    </tbody>
  </table>
</div>

HTML;

    $entity->upgrade( 'template', 'page' );
    $entity->m_parent = $orm->get( 'WbfsysDocuTree', " access_key='wbf-entity' AND id_lang=".$langNode->getId() );
    
    try
    {
      if( $entity->isNew() )
      {
        $orm->insert( $entity );
      }
      else
      {
        
        $orm->update( $entity );
      
      }
    }
    catch( Exception $e )
    {
    
    }

