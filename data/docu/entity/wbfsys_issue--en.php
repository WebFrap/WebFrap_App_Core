<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_issue
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_issue' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_issue';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Issue' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Issue</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-wbfsys_issue-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_issue-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-title" >
        <td class="pos" >1</td>
        <td>title</td>
        <td>text</td>
        <td>400</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_type" >
        <td class="pos" >2</td>
        <td>id_type::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_issue_type" class="wcm wcm_req_ajax" >wbfsys_issue_type</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_category" >
        <td class="pos" >3</td>
        <td>id_category::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_category" class="wcm wcm_req_ajax" >wbfsys_category</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_status" >
        <td class="pos" >4</td>
        <td>id_status::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_process_node" class="wcm wcm_req_ajax" >wbfsys_process_node</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_severity" >
        <td class="pos" >5</td>
        <td>id_severity::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_issue_severity" class="wcm wcm_req_ajax" >wbfsys_issue_severity</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_os" >
        <td class="pos" >6</td>
        <td>id_os::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_os" class="wcm wcm_req_ajax" >wbfsys_os</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_priority" >
        <td class="pos" >7</td>
        <td>id_priority::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_priority" class="wcm wcm_req_ajax" >wbfsys_priority</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_browser" >
        <td class="pos" >8</td>
        <td>id_browser::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_browser" class="wcm wcm_req_ajax" >wbfsys_browser</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_revision" >
        <td class="pos" >9</td>
        <td>id_revision::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_revision" class="wcm wcm_req_ajax" >wbfsys_revision</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_finish_revision" >
        <td class="pos" >10</td>
        <td>id_finish_revision::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_revision" class="wcm wcm_req_ajax" >wbfsys_revision</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-flag_hidden" >
        <td class="pos" >11</td>
        <td>flag_hidden</td>
        <td>boolean</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-finish_till" >
        <td class="pos" >12</td>
        <td>finish_till</td>
        <td>date</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_responsible" >
        <td class="pos" >13</td>
        <td>id_responsible::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-progress" >
        <td class="pos" >14</td>
        <td>progress</td>
        <td>int</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-vid" >
        <td class="pos" >15</td>
        <td>vid</td>
        <td>bigint</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-description" >
        <td class="pos" >16</td>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-error_message" >
        <td class="pos" >17</td>
        <td>error_message</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-id_vid_entity" >
        <td class="pos" >18</td>
        <td>id_vid_entity::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_entity" class="wcm wcm_req_ajax" >wbfsys_entity</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-rowid" >
        <td class="pos" >19</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-m_time_created" >
        <td class="pos" >20</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-m_role_create" >
        <td class="pos" >21</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-m_time_changed" >
        <td class="pos" >22</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-m_role_change" >
        <td class="pos" >23</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-m_version" >
        <td class="pos" >24</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_issue-attr-m_uuid" >
        <td class="pos" >25</td>
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

