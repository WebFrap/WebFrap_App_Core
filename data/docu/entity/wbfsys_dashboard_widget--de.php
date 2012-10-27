<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_dashboard_widget
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_dashboard_widget' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_dashboard_widget';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Dashboard Widget' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Dashboard Widget</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>
Für diesen Entity wurde in dieser Sprache leider noch keine Dokumentation hinterlegt.
</fieldset>

<label>Attribute</label>

<div id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-vid" >
        <td class="pos" >1</td>
        <td>vid</td>
        <td>bigint</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-pos_x" >
        <td class="pos" >2</td>
        <td>pos_x</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-pos_y" >
        <td class="pos" >3</td>
        <td>pos_y</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-num_entries" >
        <td class="pos" >4</td>
        <td>num_entries</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-id_vid_entity" >
        <td class="pos" >5</td>
        <td>id_vid_entity::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_entity" class="wcm wcm_req_ajax" >wbfsys_entity</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-id_dashboard" >
        <td class="pos" >6</td>
        <td>id_dashboard::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_dashboard" class="wcm wcm_req_ajax" >wbfsys_dashboard</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-id_widget" >
        <td class="pos" >7</td>
        <td>id_widget::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_menu_entry" class="wcm wcm_req_ajax" >wbfsys_menu_entry</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-rowid" >
        <td class="pos" >8</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-m_time_created" >
        <td class="pos" >9</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-m_role_create" >
        <td class="pos" >10</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-m_time_changed" >
        <td class="pos" >11</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-m_role_change" >
        <td class="pos" >12</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-m_version" >
        <td class="pos" >13</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_dashboard_widget-attr-m_uuid" >
        <td class="pos" >14</td>
        <td>m_uuid</td>
        <td>uuid</td>
        <td></td>
        <td></td>
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

