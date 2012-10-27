<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_color_scheme
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_color_scheme' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_color_scheme';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Color Scheme' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Color Scheme</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-wbfsys_color_scheme-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_color_scheme-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-name" >
        <td class="pos" >1</td>
        <td>name</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-display_color" >
        <td class="pos" >2</td>
        <td>display_color</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-bg_default" >
        <td class="pos" >3</td>
        <td>bg_default</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-font_default" >
        <td class="pos" >4</td>
        <td>font_default</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-border_default" >
        <td class="pos" >5</td>
        <td>border_default</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-bg_active" >
        <td class="pos" >6</td>
        <td>bg_active</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-font_active" >
        <td class="pos" >7</td>
        <td>font_active</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-border_active" >
        <td class="pos" >8</td>
        <td>border_active</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-bg_hover" >
        <td class="pos" >9</td>
        <td>bg_hover</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-font_hover" >
        <td class="pos" >10</td>
        <td>font_hover</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-border_hover" >
        <td class="pos" >11</td>
        <td>border_hover</td>
        <td>text</td>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-access_key" >
        <td class="pos" >12</td>
        <td>access_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-description" >
        <td class="pos" >13</td>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-rowid" >
        <td class="pos" >14</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-m_time_created" >
        <td class="pos" >15</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-m_role_create" >
        <td class="pos" >16</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-m_time_changed" >
        <td class="pos" >17</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-m_role_change" >
        <td class="pos" >18</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-m_version" >
        <td class="pos" >19</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_color_scheme-attr-m_uuid" >
        <td class="pos" >20</td>
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

