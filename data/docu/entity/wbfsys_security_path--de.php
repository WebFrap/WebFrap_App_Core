<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_security_path
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_security_path' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_security_path';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Security Path' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Security Path</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>
Für diesen Entity wurde in dieser Sprache leider noch keine Dokumentation hinterlegt.
</fieldset>

<label>Attribute</label>

<div id="wgt-grid-docu-entity-wbfsys_security_path-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_security_path-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-id_group" >
        <td class="pos" >1</td>
        <td>id_group::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_group" class="wcm wcm_req_ajax" >wbfsys_role_group</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-id_root" >
        <td class="pos" >2</td>
        <td>id_root::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_area" class="wcm wcm_req_ajax" >wbfsys_security_area</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-id_area" >
        <td class="pos" >3</td>
        <td>id_area::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_area" class="wcm wcm_req_ajax" >wbfsys_security_area</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-id_reference" >
        <td class="pos" >4</td>
        <td>id_reference::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_area" class="wcm wcm_req_ajax" >wbfsys_security_area</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-m_parent" >
        <td class="pos" >5</td>
        <td>m_parent::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_path" class="wcm wcm_req_ajax" >wbfsys_security_path</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-access_level" >
        <td class="pos" >6</td>
        <td>access_level</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-description" >
        <td class="pos" >7</td>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-rowid" >
        <td class="pos" >8</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-m_time_created" >
        <td class="pos" >9</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-m_role_create" >
        <td class="pos" >10</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-m_time_changed" >
        <td class="pos" >11</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-m_role_change" >
        <td class="pos" >12</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-m_version" >
        <td class="pos" >13</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_path-attr-m_uuid" >
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

