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
 * @package WebFrap
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class ProfileAnnon
  extends Profile
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param string
   */
  public $key          = 'annon';
  
  /**
   * The Label that will be displayed in the application
   * @param string
   */
  public $label        = 'Annon';

  /**
   * @param WgtMainmenuDefault
   */
  public $mainMenu      = null;

  /**
   * @param string
   */
  public $mainMenuName  = 'Default';

  /**
   * @param WgtDesktopAnnon
   */
  public $desktop       = null;

  /**
   * @param string
   */
  public $desktopName   = 'Annon';

  /**
   * @param WgtNavigationAnnon
   */
  public $navigation      =  null;

  /**
   * @param string
   */
  public $navigationName  =  'Annon';

  /**
   * @param WgtPanelDefault
   */
  public $panel      =  null;

  /**
   * @param string
   */
  public $panelName  =  'Default';


  /**
   * @var EnterpriseCompany_Entity
   */
  public $company  =  null;

  /**
   * @var EnterpriseEmployee_Entity
   */
  public $employee  =  null;



  /**
   * @return EnterpriseCompany_Entity
   */
  public function getCompany()
  {

    if(!$this->company)
    {
      $orm = $this->getDb()->getOrm();
      $user = $this->getUser();

      if(!$employee= $this->getEmployee() || !$employee->id_company )
        return null;

      if(!$comp = $orm->get( 'EnterpriseCompany', $employee->id_company ) )
      {
        // no employee assigned
        return null;
      }

      $this->company = $comp;

    }

    return $this->company;

  }//end public function getCompany */

  /**
   * @return EnterpriseEmployee_Entity
   */
  public function getEmployee()
  {

    if(!$this->employee)
    {
      $orm  = $this->getDb()->getOrm();
      $user = $this->getUser();

      if( !$idEmployee = $user->getData('id_employee') )
        return null;

      if( !$empl = $orm->get( 'EnterpriseEmployee', $idEmployee ) )
      {
        // no employee assigned
        return null;
      }

      $this->employee = $empl;

    }

    return $this->employee;

  }//end public function getEmployee */




} // end class ProfileAnnon

