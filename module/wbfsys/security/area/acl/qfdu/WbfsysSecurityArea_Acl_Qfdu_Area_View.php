<?php 
/*******************************************************************************
*
* @author      : Dominik Bonsch <dominik.bonsch@webfrap.net>
* @date        :
* @copyright   : Webfrap Developer Network <contact@webfrap.net>
* @project     : Webfrap Web Frame Application
* @projectUrl  : http://webfrap.net
*
* @licence     : BSD License see: LICENCE/BSD Licence.txt
* 
* @version: @package_version@  Revision: @package_revision@
*
* Changes:
*
*******************************************************************************/

/**
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysSecurityArea_Acl_Qfdu_Area_View
  extends LibTemplateAreaView
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

   /**
    * @var WbfsysSecurityArea_Acl_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// display methodes
////////////////////////////////////////////////////////////////////////////////

 /**
  * display the Quallified users tab
  *
  * @param int $areaId
  * @param TFlag $params
  *
  * @return boolean
  */
  public function displayTab( $areaId, $params )
  {

    // create the form action
    if( !$params->searchFormAction )
      $params->searchFormAction = 'index.php?c=Wbfsys.SecurityArea_Acl.searchQfdUsers&amp;area_id='.$areaId;

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_security_area-acl-qfdu-search';

    // fill the relevant data for the search form
    $this->setSearchFormData( $params );

    // add the id to the form
    if( !$params->formId )
      $params->formId = 'wgt-form-wbfsys_security_area-acl-update';

     // create the form action
    if( !$params->formActionAppend )
      $params->formActionAppend = 'ajax.php?c=Wbfsys.SecurityArea_Acl.appendQfdUser';

    // add the id to the form
    if( !$params->formIdAppend )
      $params->formIdAppend = 'wgt-form-wbfsys_security_area-acl-qfdu-append';

    // append form actions
    $this->setFormData( $params->formActionAppend, $params->formIdAppend, $params, 'Append' );

    // set the path to the template
    $this->setTemplate( 'wbfsys/security_area/maintab/acl/tab_qualified_users' );

    $this->addVar( 'areaId', $areaId );

    // create the ui helper object
    $ui = $this->loadUi( 'WbfsysSecurityArea_Acl_Qfdu' );

    // inject needed resources in the ui object
    $ui->setModel( $this->model );
    $ui->setView( $this );

    $ui->createListItem
    (
      $this->model->searchQualifiedUsers( $areaId, $params ),
      $areaId,
      $params->access,
      $params
    );

    //add selectbox
    $selectboxGroups = new WgtSelectbox( 'selectboxGroups', $this );
    $selectboxGroups->setData( $this->model->getAreaGroups( $areaId, $params ) );
    $selectboxGroups->addAttributes( array(
      'id'    => 'wgt-input-wbfsys_security_area-acl-qfdu-id_group',
      'name'  => 'wbfsys_group_users[id_group]',
      'class' => 'medium'
    ));

    $jsCode = <<<JSCODE

  \$S('input#wgt-input-wbfsys_security_area-acl-qfdu-id_user-tostring').data('assign',function( objid ){
    \$S('input#wgt-input-wbfsys_security_area-acl-qfdu-id_user').val(objid);
    \$R.get( 'ajax.php?c=Wbfsys.RoleUser.data&amp;objid='+objid );
  });

  \$S('input#wgt-input-wbfsys_security_area-acl-qfdu-vid-tostring').data('assign',function( objid ){
    \$S('input#wgt-input-wbfsys_security_area-acl-qfdu-vid').val(objid);
    \$R.get( 'ajax.php?c=Wbfsys.SecurityArea.data&amp;objid='+objid );
  });

JSCODE;

    $this->addJsCode( $jsCode );

    // kein fehler alles klar
    return null;

  }//end public function displayTab */

} // end class WbfsysSecurityArea_Acl_Qfdu_Area_View */

