<?php
/*//////////////////////////////////////////////////////////////////////////////
// Doku Overview all profiles
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $index = null;
    
    $langNode = $orm->getByKey( 'WbfsysLanguage', 'de' );

    if( !$index = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf-service' AND id_lang=".$langNode->getId() ) )
    {
      $index = new WbfsysDocuTree_Entity();
      $index->access_key = 'wbf-service';
      $index->id_lang     = $langNode->getId();
    }
    
    $index->m_parent = $orm->get( 'WbfsysDocuTree', "access_key = 'wbf' AND id_lang=".$langNode->getId() );

    $index->title     = 'Service';
    $index->template = 'page';
    
    $index->short_desc = <<<DOCU
Informationen zu den Webservices die vom System bereit gestellt werden.
DOCU;
    
    $index->content = <<<DOCU
<h2>Übersicht Webservices</h2>

Die Webservices stellen eine Maschinenlesbare Version der Daten bereit.

<h3>Tabelle: Webservices</h3>

<table class="wgt-table bw7" >
  <thead>
    <tr>
      <th class="pos" style="width:30px;" >Pos:</th>
      <th style="width:210px;" >Name</th>
      <th style="width:60px;" >Type</th>
      <th>Kurzbeschreibung</th>
    </tr>
  </thead>
  <tbody>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer title" >
      <td class="pos" >1</td>
      <td>System Daten</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer subtitle" >
      <td class="pos" >1.1</td>
      <td class="child" >Profile</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row1"
        onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-service-wbfsys_profile');" >
      <td class="pos" >1.1.1</td>
      <td class="child" >Wbfsys Profile</td>
      <td>Autocomplete</td>
      <td></td>
    </tr>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer subtitle" >
      <td class="pos" >1.2</td>
      <td class="child" >Security Area</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row0"
        onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-service-wbfsys_security_area');" >
      <td class="pos" >1.2.1</td>
      <td class="child" >Wbfsys Security Area</td>
      <td>Autocomplete</td>
      <td></td>
    </tr>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row1"
        onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-service-wbfsys_security_area-ref');" >
      <td class="pos" >1.2.2</td>
      <td class="child" >Wbfsys Security Area-ref</td>
      <td>Autocomplete</td>
      <td></td>
    </tr>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer subtitle" >
      <td class="pos" >1.3</td>
      <td class="child" >Security Level</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr class="wcm wcm_ui_highlight wgt-cursor-pointer row0"
        onclick="\$R.get('maintab.php?c=Webfrap.Docu.page&amp;page=wbf-service-wbfsys_security_level');" >
      <td class="pos" >1.3.1</td>
      <td class="child" >Wbfsys Security Level</td>
      <td>Autocomplete</td>
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
