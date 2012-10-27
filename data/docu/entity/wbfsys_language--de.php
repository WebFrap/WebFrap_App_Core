<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_language
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_language' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_language';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Sprachen' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Sprachen</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>
Für diesen Entity wurde in dieser Sprache leider noch keine Dokumentation hinterlegt.
</fieldset>

<label>Attribute</label>

<div id="wgt-grid-docu-entity-wbfsys_language-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_language-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-name" >
        <td class="pos" >1</td>
        <td>name</td>
        <td>text</td>
        <td>250</td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-access_key" >
        <td class="pos" >2</td>
        <td>access_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-key3" >
        <td class="pos" >3</td>
        <td>key3</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-country_number" >
        <td class="pos" >4</td>
        <td>country_number</td>
        <td>char</td>
        <td>3</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-key_rfc1766" >
        <td class="pos" >5</td>
        <td>key_rfc1766</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-short" >
        <td class="pos" >6</td>
        <td>short</td>
        <td>text</td>
        <td>70</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-flag" >
        <td class="pos" >7</td>
        <td>flag</td>
        <td>text</td>
        <td>10</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-is_syslang" >
        <td class="pos" >8</td>
        <td>is_syslang</td>
        <td>boolean</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-format_time" >
        <td class="pos" >9</td>
        <td>format_time</td>
        <td>text</td>
        <td>25</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-format_timestamp" >
        <td class="pos" >10</td>
        <td>format_timestamp</td>
        <td>text</td>
        <td>25</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-format_date" >
        <td class="pos" >11</td>
        <td>format_date</td>
        <td>text</td>
        <td>25</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-sep_date" >
        <td class="pos" >12</td>
        <td>sep_date</td>
        <td>text</td>
        <td>10</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-sep_time" >
        <td class="pos" >13</td>
        <td>sep_time</td>
        <td>text</td>
        <td>10</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-sep_dec" >
        <td class="pos" >14</td>
        <td>sep_dec</td>
        <td>text</td>
        <td>10</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-sep_mil" >
        <td class="pos" >15</td>
        <td>sep_mil</td>
        <td>text</td>
        <td>10</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-rowid" >
        <td class="pos" >16</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-m_time_created" >
        <td class="pos" >17</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-m_role_create" >
        <td class="pos" >18</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-m_time_changed" >
        <td class="pos" >19</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-m_role_change" >
        <td class="pos" >20</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-m_version" >
        <td class="pos" >21</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_language-attr-m_uuid" >
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

