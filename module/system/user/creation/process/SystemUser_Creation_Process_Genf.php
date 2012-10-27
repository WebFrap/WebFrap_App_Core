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
 * NEVER WRITE CODE IN THIS CLASS
 * THE CONTENT OF THIS CLASS IS NOT PERSISTENT AND CAN CHANGE OFTEN
 * ALL YOUR CHANGES WILL BE OVERWRITEN!!!
 * YOU HAVE BEEN WARNED!!!
 *
 * @package WebFrap
 * @subpackage ModUser_Creation
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class SystemUser_Creation_Process_Genf
  extends Process
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Der Name des Prozesses
   * @var string
   */
  public $name = 'system_user-creation';
  
  /**
   * Key zum laden der Entity
   * @var string
   */
  public $entityKey = 'WbfsysRoleUser';

  /**
   * Beschreibung für den Prozess
   * @var string
   */
  public $description = 'System User';

  /**
   * Der Default Node kommt dann zur Anwendung, wenn ein Datensatz zwar existiert
   * jedoch noch kein Prozess dafür existiert
   * @var string
   */
  public $defaultNode = 'new';
  
  /**
   * Controller Pfad zum ansprechen des Prozess Service interfaces
   * @var string
   */
  public $processUrl = 'System.User_Creation_Process';

  /**
   * Die Entity an welche der Prozessstatus geknüpft wird
   * @var WbfsysRoleUser_Entity
   */
  public $entity = null;
  
  /**
   * Referenz auf die Hauptentity
   * @var WbfsysRoleUser_Entity
   */
  public $entityWbfsysRoleUser = null;

      
  /**
   * Liste aller relativen Areas für den Prozess
   * @var array
   */
  protected  $areas  = array
  (
    'wbfsys_role_user' => 'mod-wbfsys>mod-wbfsys-cat-core_data',
  );
  
  /**
   * Liste aller relativen Ids für den Prozess
   * @var array
   */
  protected  $ids  = array
  (
    'wbfsys_role_user' => null,
  );
      
      
  /**
   * Status Attribute
   * @var string
   */
  public $statusAttribute = 'id_status';
      
  
  /**
   * Setter mit Check auf die korrekte Entity
   * @param WbfsysRoleUser_Entity $entity
   *
   * @overwrite Process::setEntity( $entity )
   */
  public function setEntity( $entity )
  {

    if
    ( 
      !is_object( $entity ) 
      || !$entity instanceof WbfsysRoleUser_Entity 
   )
   {
      throw new LibProcess_Exception
      ( 
        "Tried to set an invalid entity to the process ".$this->debugData() 
      );
   }
      
    $this->entity = $entity;
    $this->entityWbfsysRoleUser = &$this->entity;
    
    $this->model->setEntity( $entity );
    
    $this->ids['wbfsys_role_user'] = $entity->getId();

    $db = $this->getDb();
    $orm = $db->getOrm();


    
  }//end public function setEntity */

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * bauen der Responsibles
   */
  public function buildResponsibles()
  {
  

    
  }//end public function buildResponsibles */

  /**
   * bauen der Nodes
   */
  public function buildPhases()
  {
  
    $this->nodes = array
    (

    );

  }//end public function buildPhases */

  /**
   * bauen der Nodes
   */
  public function buildNodes()
  {
  
    $this->nodes = array
    (
      'new' => array
      (
        'label'         => 'New',
        'order'         => 1,
        'icon'          => 'process/new.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'New',

      ),

    );

  }//end public function buildNodes */

  /**
   * bauen der Edges
   */
  public function buildEdges()
  {

    $this->edges = array
    (
      'new' => array
      (
      ),
    );

  }//end public function buildEdges */

////////////////////////////////////////////////////////////////////////////////
// Event Methodes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// Action Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @return null Error im Fehlerfall
   */
  public function action_CreateNew( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    


    return null;

  }//end public function action_CreateNew */


////////////////////////////////////////////////////////////////////////////////
// Constraint Methodes
////////////////////////////////////////////////////////////////////////////////
    
}//end class SystemUser_Creation_Process_Genf */

