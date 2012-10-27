<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: core_person
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-core_person' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-core_person';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Person' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Person</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-core_person-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-core_person-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-core_person-attr-gender" >
        <td class="pos" >1</td>
        <td>gender</td>
        <td>eid</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-academic_title" >
        <td class="pos" >2</td>
        <td>academic_title</td>
        <td>text</td>
        <td>50</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-noblesse_title" >
        <td class="pos" >3</td>
        <td>noblesse_title</td>
        <td>text</td>
        <td>50</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-firstname" >
        <td class="pos" >4</td>
        <td>firstname</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-lastname" >
        <td class="pos" >5</td>
        <td>lastname</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-birthday" >
        <td class="pos" >6</td>
        <td>birthday</td>
        <td>date</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-photo" >
        <td class="pos" >7</td>
        <td>photo</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-id_preflang" >
        <td class="pos" >8</td>
        <td>id_preflang::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_language" class="wcm wcm_req_ajax" >wbfsys_language</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-birth_city" >
        <td class="pos" >9</td>
        <td>birth_city</td>
        <td>text</td>
        <td>120</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-id_nationality" >
        <td class="pos" >10</td>
        <td>id_nationality::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-core_country" class="wcm wcm_req_ajax" >core_country</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-is_alias_for" >
        <td class="pos" >11</td>
        <td>is_alias_for::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-core_person" class="wcm wcm_req_ajax" >core_person</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-tax_number" >
        <td class="pos" >12</td>
        <td>tax_number</td>
        <td>text</td>
        <td>20</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-pkid" >
        <td class="pos" >13</td>
        <td>pkid</td>
        <td>text</td>
        <td>20</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-mimetype" >
        <td class="pos" >14</td>
        <td>mimetype</td>
        <td>text</td>
        <td>20</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-rowid" >
        <td class="pos" >15</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-m_time_created" >
        <td class="pos" >16</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-m_role_create" >
        <td class="pos" >17</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-m_time_changed" >
        <td class="pos" >18</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-m_role_change" >
        <td class="pos" >19</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-m_version" >
        <td class="pos" >20</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-core_person-attr-m_uuid" >
        <td class="pos" >21</td>
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

