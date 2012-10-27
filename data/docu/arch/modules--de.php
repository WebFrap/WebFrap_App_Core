<?php
/*//////////////////////////////////////////////////////////////////////////////
// Doku Overview all profiles
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $index = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$index = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-module' AND id_lang=".$langNode->getId() ) )
    {
      $index = new WbfsysDocuTree_Entity();
      $index->access_key = 'wbf-module';
      $index->id_lang     = $langNode->getId();
    }

    $index->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf' AND id_lang=".$langNode->getId() );

    $index->title     = 'Module';
    $index->template = 'page';
    
    $index->short_desc = <<<DOCU

Das Webfrap Basis System enthält nur ein minimales Featureset.<br />
Die eigentliche Domainlogik wird über Module ins System geladen. <br />
Hier bekommst du einen Überblick über die geladenen Module.

DOCU;
    
    $index->content = <<<DOCU
<h2>Module</h2>


<p>
Das Webfrap Basis System enthält nur rudimentäre Funktionalität, z.B Maintenance
Logik etc. <br />
Die eigentliche Domainlogik wird über Module ins System geladen. <br />
Im folgenden eine Übersicht über die im System geladenen Module und ihre Funktionalität.
</p>

<h3>Übersicht der vorhandenen Module</h3>

<table class="wgt-table bw7" >
  <thead>
    <tr>
      <th class="pos" style="width:30px;" >Pos:</th>
      <th style="width:120px;" >Name</th>
      <th>Kurzbeschreibung</th>
    </tr>
  </thead>
  <tbody>
    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row1" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-module-Core');" >
      <td class="pos" >1</td>
      <td>Basis-Daten</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row0" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-module-Crm');" >
      <td class="pos" >2</td>
      <td>Crm</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row1" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-module-Hosting');" >
      <td class="pos" >3</td>
      <td>Hosting</td>
      <td></td>
    </tr>    <tr 
      class="wcm wcm_ui_highlight wgt-cursor-pointer row0" 
      onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-module-Wbfsys');" >
      <td class="pos" >4</td>
      <td>System Daten</td>
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
