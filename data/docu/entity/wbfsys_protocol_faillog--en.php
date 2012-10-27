<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_protocol_faillog
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'en' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_protocol_faillog' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_protocol_faillog';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Wbfsys Protocol Faillog' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Wbfsys Protocol Faillog</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Documentation</legend>
Sorry, there is no documentation for this entity yet.
</fieldset>

<label>Attributes</label>

<div id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attr-user_name" >
        <td class="pos" >1</td>
        <td>user_name</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attr-ip_address" >
        <td class="pos" >2</td>
        <td>ip_address</td>
        <td>inet</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attr-custom_data" >
        <td class="pos" >3</td>
        <td>custom_data</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attr-user_agent" >
        <td class="pos" >4</td>
        <td>user_agent</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attr-rowid" >
        <td class="pos" >5</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attr-m_time_created" >
        <td class="pos" >6</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_protocol_faillog-attr-m_role_create" >
        <td class="pos" >7</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
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
