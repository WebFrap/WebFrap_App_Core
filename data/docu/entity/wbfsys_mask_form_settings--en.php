<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_mask_form_settings
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_mask_form_settings' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_mask_form_settings';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Wbfsys Mask Form Settings' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Wbfsys Mask Form Settings</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attributes-table" class="wcm wcm_widget_grid hide-head full" >
    <thead>
      <tr>
        <th class="pos" >Pos:</th>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>FK/U/R/IDX</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-title" >
        <td class="pos" >1</td>
        <td>title</td>
        <td>text</td>
        <td>400</td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-access_key" >
        <td class="pos" >2</td>
        <td>access_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-col_settings" >
        <td class="pos" >3</td>
        <td>col_settings</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-reference_settings" >
        <td class="pos" >4</td>
        <td>reference_settings</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-description" >
        <td class="pos" >5</td>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-revision" >
        <td class="pos" >6</td>
        <td>revision</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-rowid" >
        <td class="pos" >7</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-m_time_created" >
        <td class="pos" >8</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-m_role_create" >
        <td class="pos" >9</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-m_time_changed" >
        <td class="pos" >10</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-m_role_change" >
        <td class="pos" >11</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-m_version" >
        <td class="pos" >12</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_mask_form_settings-attr-m_uuid" >
        <td class="pos" >13</td>
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

