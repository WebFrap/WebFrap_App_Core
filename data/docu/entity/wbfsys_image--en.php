<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_image
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_image' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_image';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Image' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Image</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-wbfsys_image-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_image-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-title" >
        <td class="pos" >1</td>
        <td>title</td>
        <td>text</td>
        <td>400</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-access_key" >
        <td class="pos" >2</td>
        <td>access_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-id_mediathek" >
        <td class="pos" >3</td>
        <td>id_mediathek::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_mediathek" class="wcm wcm_req_ajax" >wbfsys_mediathek</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-color_model" >
        <td class="pos" >4</td>
        <td>color_model::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_color_model" class="wcm wcm_req_ajax" >wbfsys_color_model</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-id_format" >
        <td class="pos" >5</td>
        <td>id_format::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_image_format" class="wcm wcm_req_ajax" >wbfsys_image_format</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-id_licence" >
        <td class="pos" >6</td>
        <td>id_licence::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_content_licence" class="wcm wcm_req_ajax" >wbfsys_content_licence</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-id_confidentiality" >
        <td class="pos" >7</td>
        <td>id_confidentiality::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_confidentiality_level" class="wcm wcm_req_ajax" >wbfsys_confidentiality_level</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-width" >
        <td class="pos" >8</td>
        <td>width</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-height" >
        <td class="pos" >9</td>
        <td>height</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-flag_color" >
        <td class="pos" >10</td>
        <td>flag_color</td>
        <td>boolean</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-file" >
        <td class="pos" >11</td>
        <td>file</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-description" >
        <td class="pos" >12</td>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-mimetype" >
        <td class="pos" >13</td>
        <td>mimetype</td>
        <td>text</td>
        <td>20</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-file_size" >
        <td class="pos" >14</td>
        <td>file_size</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-file_hash" >
        <td class="pos" >15</td>
        <td>file_hash</td>
        <td>text</td>
        <td>32</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-rowid" >
        <td class="pos" >16</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-m_time_created" >
        <td class="pos" >17</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-m_role_create" >
        <td class="pos" >18</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-m_time_changed" >
        <td class="pos" >19</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-m_role_change" >
        <td class="pos" >20</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-m_version" >
        <td class="pos" >21</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_image-attr-m_uuid" >
        <td class="pos" >22</td>
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

