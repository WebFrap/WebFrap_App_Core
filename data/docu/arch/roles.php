<?php
/*//////////////////////////////////////////////////////////////////////////////
// Doku Overview all roles
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $index = null;

    if( !$index = $orm->getByKey( 'WbfsysDocuTree', 'wbf-role' ) )
    {
      $index = new WbfsysDocuTree_Entity();
      $index->access_key = 'wbf-role';
    }
    
    $index->m_parent = $orm->getByKey( 'WbfsysDocuTree', 'wbf' );

    $index->title     = 'Role';
    $index->template = 'page';
    
    $index->short_desc = <<<DOCU
Gruppen Rollen
DOCU;
    
    $index->content = <<<DOCU
<h2>Role</h2>

<p>
Gruppen Rollen
</p>

<h3>Übersicht der vorhandenen Role</h3>

<table class="wgt-table bw7" >
  <thead>
    <tr>
      <th class="pos" style="width:30px;" >Pos:</th>
      <th style="width:120px;" >Name</th>
      <th style="width:120px;" >Module</th>
      <th>Kurzbeschreibung</th>
    </tr>
  </thead>
  <tbody>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row1" onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-role-admin');" >
      <td class="pos" >1</td>
      <td>Admin</td>
      <td>Admin</td>
      <td></td>
    </tr>    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row0" onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-role-guest');" >
      <td class="pos" >2</td>
      <td>Guest</td>
      <td>Guest</td>
      <td></td>
    </tr>    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row1" onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-role-maintenance');" >
      <td class="pos" >3</td>
      <td>Maintenance</td>
      <td>Maintenance</td>
      <td></td>
    </tr>    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row0" onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-role-owner');" >
      <td class="pos" >4</td>
      <td>owner</td>
      <td>Owner</td>
      <td></td>
    </tr>    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row1" onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-role-staff');" >
      <td class="pos" >5</td>
      <td>Staff</td>
      <td>Staff</td>
      <td></td>
    </tr>    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row0" onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-role-user');" >
      <td class="pos" >6</td>
      <td>User</td>
      <td>User</td>
      <td></td>
    </tr>    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row1" onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-role-information_manager');" >
      <td class="pos" >7</td>
      <td>Information Manager</td>
      <td>Information</td>
      <td></td>
    </tr>
  </tbody>
</table>

DOCU;

    try
    {
      if( $index->isNew() )
      {
        $orm->insert( $index );
      }
      else
      {
        $orm->update( $index );
      }
    }
    catch( Exception $e )
    {

    }
