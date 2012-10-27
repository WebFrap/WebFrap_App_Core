<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_security_area
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_security_area' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_security_area';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Security Area' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Security Area</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-wbfsys_security_area-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_security_area-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-m_parent" >
        <td class="pos" >1</td>
        <td>m_parent::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_area" class="wcm wcm_req_ajax" >wbfsys_security_area</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-label" >
        <td class="pos" >2</td>
        <td>label</td>
        <td>text</td>
        <td>250</td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_ref_listing" >
        <td class="pos" >3</td>
        <td>id_ref_listing::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_ref_access" >
        <td class="pos" >4</td>
        <td>id_ref_access::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_ref_insert" >
        <td class="pos" >5</td>
        <td>id_ref_insert::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_ref_update" >
        <td class="pos" >6</td>
        <td>id_ref_update::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_ref_delete" >
        <td class="pos" >7</td>
        <td>id_ref_delete::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_ref_admin" >
        <td class="pos" >8</td>
        <td>id_ref_admin::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_level_listing" >
        <td class="pos" >9</td>
        <td>id_level_listing::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_level_access" >
        <td class="pos" >10</td>
        <td>id_level_access::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_level_insert" >
        <td class="pos" >11</td>
        <td>id_level_insert::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_level_update" >
        <td class="pos" >12</td>
        <td>id_level_update::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_level_delete" >
        <td class="pos" >13</td>
        <td>id_level_delete::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_level_admin" >
        <td class="pos" >14</td>
        <td>id_level_admin::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-vid" >
        <td class="pos" >15</td>
        <td>vid</td>
        <td>bigint</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_target" >
        <td class="pos" >16</td>
        <td>id_target::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_area" class="wcm wcm_req_ajax" >wbfsys_security_area</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_type" >
        <td class="pos" >17</td>
        <td>id_type::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_area_type" class="wcm wcm_req_ajax" >wbfsys_security_area_type</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-access_key" >
        <td class="pos" >18</td>
        <td>access_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-type_key" >
        <td class="pos" >19</td>
        <td>type_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-parent_key" >
        <td class="pos" >20</td>
        <td>parent_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-source_key" >
        <td class="pos" >21</td>
        <td>source_key</td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/index.png"  alt="Index"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_source" >
        <td class="pos" >22</td>
        <td>id_source::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_area" class="wcm wcm_req_ajax" >wbfsys_security_area</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-parent_path" >
        <td class="pos" >23</td>
        <td>parent_path</td>
        <td>text</td>
        <td>500</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-revision" >
        <td class="pos" >24</td>
        <td>revision</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-flag_system" >
        <td class="pos" >25</td>
        <td>flag_system</td>
        <td>boolean</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-description" >
        <td class="pos" >26</td>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-id_vid_entity" >
        <td class="pos" >27</td>
        <td>id_vid_entity::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_entity" class="wcm wcm_req_ajax" >wbfsys_entity</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-rowid" >
        <td class="pos" >28</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-m_time_created" >
        <td class="pos" >29</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-m_role_create" >
        <td class="pos" >30</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-m_time_changed" >
        <td class="pos" >31</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-m_role_change" >
        <td class="pos" >32</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-m_version" >
        <td class="pos" >33</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_security_area-attr-m_uuid" >
        <td class="pos" >34</td>
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

