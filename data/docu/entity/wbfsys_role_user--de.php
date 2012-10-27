<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_role_user
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $entity = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$entity = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-entity-wbfsys_role_user' AND id_lang=".$langNode->getId() ) )
    {
      $entity = new WbfsysDocuTree_Entity();
      $entity->access_key  = 'wbf-entity-wbfsys_role_user';
      $entity->id_lang     = $langNode->getId();
    }

    $entity->upgrade( 'title', 'Entity Systembenutzer' );
    $entity->upgrade( 'short_desc', 'Entity ' );
    $entity->content = <<<HTML
<div class="wgt-panel title" >
  <h2>Entity Systembenutzer</h2>
</div>

<fieldset class="wgt-space bw61" >
  <legend>Dokumentation</legend>
Für diesen Entity wurde in dieser Sprache leider noch keine Dokumentation hinterlegt.
</fieldset>

<label>Attribute</label>

<div id="wgt-grid-docu-entity-wbfsys_role_user-attributes" class="wgt-grid" >
  <var></var>
  <table id="wgt-grid-docu-entity-wbfsys_role_user-attributes-table" class="wcm wcm_widget_grid hide-head full" >
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
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-name" >
        <td class="pos" >1</td>
        <td>name</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-email" >
        <td class="pos" >2</td>
        <td>email</td>
        <td>text</td>
        <td>250</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-id_person" >
        <td class="pos" >3</td>
        <td>id_person::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-core_person" class="wcm wcm_req_ajax" >core_person</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-id_mandant" >
        <td class="pos" >4</td>
        <td>id_mandant::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_mandant" class="wcm wcm_req_ajax" >wbfsys_role_mandant</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-id_employee" >
        <td class="pos" >5</td>
        <td>id_employee</td>
        <td>eid</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-password" >
        <td class="pos" >6</td>
        <td>password</td>
        <td>text</td>
        <td>64</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-reset_pwd_key" >
        <td class="pos" >7</td>
        <td>reset_pwd_key</td>
        <td>text</td>
        <td>50</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-reset_pwd_date" >
        <td class="pos" >8</td>
        <td>reset_pwd_date</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-inactive" >
        <td class="pos" >9</td>
        <td>inactive</td>
        <td>boolean</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-non_cert_login" >
        <td class="pos" >10</td>
        <td>non_cert_login</td>
        <td>boolean</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-level" >
        <td class="pos" >11</td>
        <td>level::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_security_level" class="wcm wcm_req_ajax" >wbfsys_security_level</a></td>
        <td>int</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-profile" >
        <td class="pos" >12</td>
        <td>profile::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_profile" class="wcm wcm_req_ajax" >wbfsys_profile</a></td>
        <td>text</td>
        <td>120</td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-id_domain" >
        <td class="pos" >13</td>
        <td>id_domain::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_domain" class="wcm wcm_req_ajax" >wbfsys_domain</a></td>
        <td>eid</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-type" >
        <td class="pos" >14</td>
        <td>type</td>
        <td>eid</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-description" >
        <td class="pos" >15</td>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-last_login" >
        <td class="pos" >16</td>
        <td>last_login</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-change_password" >
        <td class="pos" >17</td>
        <td>change_password</td>
        <td>date</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-salt_password" >
        <td class="pos" >18</td>
        <td>salt_password</td>
        <td>text</td>
        <td>10</td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-rowid" >
        <td class="pos" >19</td>
        <td>rowid</td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/required.png"  alt="Required"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-m_time_created" >
        <td class="pos" >20</td>
        <td>m_time_created</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-m_role_create" >
        <td class="pos" >21</td>
        <td>m_role_create::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-m_time_changed" >
        <td class="pos" >22</td>
        <td>m_time_changed</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-m_role_change" >
        <td class="pos" >23</td>
        <td>m_role_change::<a href="maintab.php?c=Webfrap.Docu.page&amp;page=wbf-entity-wbfsys_role_user" class="wcm wcm_req_ajax" >wbfsys_role_user</a></td>
        <td>bigint</td>
        <td></td>
        <td><img src="xsmall/daidalos/table/key.png"  alt="Key"  class="icon xsmall" /></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-m_version" >
        <td class="pos" >24</td>
        <td>m_version</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr id="wgt-grid-docu-entity-wbfsys_role_user-attr-m_uuid" >
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

