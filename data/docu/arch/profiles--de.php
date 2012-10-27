<?php
/*//////////////////////////////////////////////////////////////////////////////
// Doku Overview all profiles
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $index = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$index = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-profile' AND id_lang=".$langNode->getId() ) )
    {
      $index = new WbfsysDocuTree_Entity();
      $index->access_key = 'wbf-profile';
      $index->id_lang     = $langNode->getId();
    }

    $index->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf' AND id_lang=".$langNode->getId() );

    $index->title     = 'Profiles';
    $index->template = 'page';
    
    $index->short_desc = <<<DOCU
Anhand der Profilen, werden die Navigation sowie die Masken auf die Aufgaben
und Bedürfnisse des jeweiligen Profilinhabers angepasst.<br />
Klicke auf diese Box um Informationen über alle Profile einsehen zu können.
DOCU;
    
    $index->content = <<<DOCU
<h2>Profiles</h2>

<p>
Anhand der Profilen, werden die Navigation sowie die Masken auf die Aufgaben
und Bedürfnisse des jeweiligen Profilinhabers angepasst.<br />
Jeder Anweder hat mindestens ein Standardprofil in welchem er sich nach dem
Login befindet.<br />
Einem Anwender können jedoch beliebig viele Profile zugewiesen werden in welche
er jederzeit über das "Switch Profil" wechseln kann.
</p>

<label>Übersicht der vorhandenen Profile</label>

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
    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row1" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-profile-admin');" >
      <td class="pos" >1</td>
      <td>admin</td>
      <td>Admin</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row0" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-profile-annon');" >
      <td class="pos" >2</td>
      <td>Annon</td>
      <td>Annon</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row1" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-profile-default');" >
      <td class="pos" >3</td>
      <td>default</td>
      <td>Default</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row0" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-profile-developer');" >
      <td class="pos" >4</td>
      <td>developer</td>
      <td>Developer</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row1" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-profile-employee');" >
      <td class="pos" >5</td>
      <td>Employee</td>
      <td>Employee</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row0" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-profile-user');" >
      <td class="pos" >6</td>
      <td>User</td>
      <td>User</td>
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
