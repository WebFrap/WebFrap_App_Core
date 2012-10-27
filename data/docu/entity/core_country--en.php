<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: core_country
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-core_country' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-core_country';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Country' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Country</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-core_country-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-core_country-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-core_country-attr-name" >
        <td class="pos" >1</td>
        <td>name</td>
        <td>text</td>
        <td>250</td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-access_key" >
        <td class="pos" >2</td>
        <td>access_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-key3" >
        <td class="pos" >3</td>
        <td>key3</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-country_number" >
        <td class="pos" >4</td>
        <td>country_number</td>
        <td>char</td>
        <td>3</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-flag" >
        <td class="pos" >5</td>
        <td>flag</td>
        <td>text</td>
        <td>120</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-id_category" >
        <td class="pos" >6</td>
        <td>id_category::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-core_country_category" class="wcm wcm_req_ajax" >core_country_category</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-short" >
        <td class="pos" >7</td>
        <td>short</td>
        <td>text</td>
        <td>5</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-id_mainlanguage" >
        <td class="pos" >8</td>
        <td>id_mainlanguage::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_language" class="wcm wcm_req_ajax" >wbfsys_language</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-id_currency" >
        <td class="pos" >9</td>
        <td>id_currency::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-core_currency" class="wcm wcm_req_ajax" >core_currency</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-deb_revenue" >
        <td class="pos" >10</td>
        <td>deb_revenue</td>
        <td>smallint</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-kred_revenue" >
        <td class="pos" >11</td>
        <td>kred_revenue</td>
        <td>smallint</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-rowid" >
        <td class="pos" >12</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-m_time_created" >
        <td class="pos" >13</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-m_role_create" >
        <td class="pos" >14</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-m_time_changed" >
        <td class="pos" >15</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-m_role_change" >
        <td class="pos" >16</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-m_version" >
        <td class="pos" >17</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_country-attr-m_uuid" >
        <td class="pos" >18</td>
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

