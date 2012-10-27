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
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleGroup_Ref_Access_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysSecurityAccess_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysSecurityAccess( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysSecurityAccess_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysSecurityAccess(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysSecurityAccess_Entity
  */
  public function getEntityWbfsysSecurityAccess( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysSecurityAccess = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysSecurityAccess = $this->getRegisterd( 'entityWbfsysSecurityAccess' );

    //entity wbfsys_security_access
    if( !$entityWbfsysSecurityAccess )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysSecurityAccess = $orm->get( 'WbfsysSecurityAccess', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyssecurityaccess with this id '.$objid,
              'wbfsys.security_access.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess );
        $this->register( 'main_entity', $entityWbfsysSecurityAccess );

      }
      else
      {
        $entityWbfsysSecurityAccess   = new WbfsysSecurityAccess_Entity() ;
        $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess );
        $this->register( 'main_entity', $entityWbfsysSecurityAccess );
      }

    }
    elseif( $objid && $objid != $entityWbfsysSecurityAccess->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysSecurityAccess = $orm->get( 'WbfsysSecurityAccess', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyssecurityaccess with this id '.$objid,
            'wbfsys.security_access.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess );
      $this->register( 'main_entity', $entityWbfsysSecurityAccess );
    }

    return $entityWbfsysSecurityAccess;

  }//end public function getEntityWbfsysSecurityAccess */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysSecurityAccess_Entity $entity
  */
  public function setEntityWbfsysSecurityAccess( $entity )
  {

    $this->register( 'entityWbfsysSecurityAccess', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysSecurityAccess */

  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function getEntryData( $params )
  {

    $orm   = $this->getOrm();
    $data  = array();

    $data['wbfsys_security_access']  = $this->getEntityWbfsysSecurityAccess();


    $tabData = array();

    foreach( $data as $tabName => $ent )
    {
      // prüfen ob etwas gefunden wurde
      if( !$ent )
      {
        Debug::console( "Missing Entity for Reference: ".$tabName );
        continue;
      }

      $tabData = array_merge( $tabData , $ent->getAllData( $tabName ) );
    }


    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_security_access']->id_group )
    {
      $valWbfsysRoleGroup = $orm->getField
      (
        'WbfsysRoleGroup',
        'rowid = '.$data['wbfsys_security_access']->id_group,
        'access_key'
      );
      $tabData['wbfsys_role_group_access_key'] = $valWbfsysRoleGroup;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_group_access_key'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_security_access']->id_area )
    {
      $valWbfsysSecurityArea = $orm->getField
      (
        'WbfsysSecurityArea',
        'rowid = '.$data['wbfsys_security_access']->id_area,
        'access_key'
      );
      $tabData['wbfsys_security_area_access_key'] = $valWbfsysSecurityArea;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_security_area_access_key'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysRoleGroup
   *
   * @param int $idWbfsysRoleGroup the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysRoleGroup, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysSecurityAccess_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_security_access with the expected source wbfsys_security_access'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();


    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysSecurityAccess = $this->getRegisterd( 'search_fields_wbfsys_security_access' ) )
    {
       $fieldsWbfsysSecurityAccess   = $orm->getSearchCols( 'WbfsysSecurityAccess' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_security_access' ) )
    {
      $fieldsWbfsysSecurityAccess = array_unique( array_merge
      (
        $fieldsWbfsysSecurityAccess,
        $refs
      ));
    }

    $filterWbfsysSecurityAccess     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysSecurityAccess', $fieldsWbfsysSecurityAccess ),
      $orm->getErrorMessages( 'WbfsysSecurityAccess'  ),
      'search_wbfsys_security_access'
    );
    $condition['wbfsys_security_access'] = $filterWbfsysSecurityAccess->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysRoleGroup_Ref_Access_Table' );
    /* @var $query WbfsysRoleGroup_Ref_Access_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_security_access.id_group = '.$idWbfsysRoleGroup );

    $validKeys  = $access->fetchListIds
    ( 
      $user->getProfileName(), 
      $query, 
      'table',  
      $condition, 
      $params 
    );

    $query->fetchInAcls
    (
      $validKeys,
      $params
    );



    return $query;

  }//end public public search */

}//end class WbfsysRoleGroup_Ref_Access_Table_Model

