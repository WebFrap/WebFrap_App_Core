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
 * @subpackage ModHandling
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class IssueHandling_Process_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Der aktive Prozess
   * @var IssueHandling_Process
   */
  public $process = null;
  
////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param int $statusId
   * @param TFlags $params
   */
  public function loadProcess( $statusId, $params )
  {

    $db       = $this->getDb();
    
    // build process
    $this->process = new IssueHandling_Process( $db );
    $this->process->loadByStatus( $statusId, $params );
    
    return $this->process;
    
  }//end public function loadProcess */

  
  /**
   * @param string $key
   */
  public function getResponsibleUsersByKey( $key )
  {
    
    $responsibles = $this->process->getResponsible( $key );
    
    if( !$responsibles )
      return null;
    
    $users = array();
      
    foreach( $responsibles as $resp )
    {

      if( !isset( $resp['type'] ) )
      {
        Debug::console( 'Missing type for responsible', $resp );
        continue;
      }

      switch( $resp['type'] )
      {
        case Acl::ROLE:
        {

          if( !isset( $resp['roles'] ) )
            throw new LibRelation_Exception( "Missing Roles in Role Check" );

          $roles = $resp['roles'];

          $area  = isset( $resp['area'] ) 
            ? $this->process->getAreaByKey( $resp['area'] )
            : null;

          $id  = isset( $resp['id'] ) 
            ? $this->process->getIdByKey( $resp['id'] )
            : null;

          $users[] = new LibRelationContainer_Group( $roles, $area, $id );

          break;
        }
        case Acl::OWNER:
        {

          $users[] = new LibRelationContainer_User( $this->process->owner( true ) );
          break;
        }

        default:
        {
          throw new LibRelation_Exception( "Got unsupported Access Check in" );
        }
      }
    }

    $respLoader = LibRelation::getDefault();

    return $respLoader->getUsers( $users );
    
  }//end public function getResponsibleUsersByKey */
  
} // end class IssueHandling_Process_Model */

