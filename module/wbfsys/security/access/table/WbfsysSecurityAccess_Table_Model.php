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
class WbfsysSecurityAccess_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysSecurityAccess_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysSecurityAccess( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysSecurityAccess_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysSecurityAccess( $entity );

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
        $this->register( 'main_entity', $entityWbfsysSecurityAccess);

      }
      else
      {
        $entityWbfsysSecurityAccess   = new WbfsysSecurityAccess_Entity() ;
        $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess );
        $this->register( 'main_entity', $entityWbfsysSecurityAccess);
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

      $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess);
      $this->register( 'main_entity', $entityWbfsysSecurityAccess);
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
// context: table
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Suchfunktion für das Listen Element
   *
   * Wenn Suchparameter übergeben werden, werden diese automatisch in die
   * Query eingebaut, ansonsten wird eine plain query ausgeführt
   *
   * Berechtigungen werden bei Bedarf berücksichtigt
   *
   * Am Ende wird ein geladenes Query Objekt zurückgegeben, über welches
   * ( wie über einen Array ) itteriert werden kann
   *
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   * @param array $condition Übergabe möglicher such Parameter
   *
   * @return LibSqlQuery
   *
   * @throws LibDb_Exception
   *    wenn die Query fehlschlägt
   *    Datenbank Verbindungsfehler... etc ( siehe meldung )
   */
  public function search( $access, $params, $condition = array() )
  {

    // laden der benötigten resourcen
    $view         = $this->getView();
    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $user        = $this->getUser();
    
    $extendedConditions = array();
    


    // freitext suche
    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $db->addSlashes( trim( $free ) );




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

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_security_access', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_security_access']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_security_access', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_security_access']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_security_access', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_security_access']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_security_access', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_security_access']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_security_access', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_security_access']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_security_access}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_security_access']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_security_access', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_security_access']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_security_access', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_security_access']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysSecurityAccess_Table' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysSecurityAccess_Table_'.SParserString::subToCamelCase( $dynFilter )
          );

          if( $filter )
            $query->inject( $filter, $params );
        }
        catch( LibDb_Exception $e )
        {
          $response->addError( "Requested nonexisting filter ".$dynFilter );
        }

      }
    }

    // per exclude können regeln übergeben werden um bestimmte datensätze
    // auszublenden
    // wird häufig verwendet um bereits zugewiesenen datensätze aus zu blenden
    if( $params->exclude )
    {

      $tmp = explode( '-', $params->exclude );

      $conName   = $tmp[0];
      $srcId     = $tmp[1];
      $targetId  = $tmp[2];

      $excludeCond = ' wbfsys_security_access.rowid NOT IN '
      .'( select '.$targetId .' from '.$conName.' where '.$srcId.' = '.$params->objid.' and not '.$srcId.' is null ) ';

      $query->setCondition( $excludeCond );

    }

    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

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
      
    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }





    return $query;

  }//end public function search */

  /**
   * fill the elements in a search form
   *
   * @param LibTemplateWindow $view
   * @return boolean
   */
  public function searchForm( $view )
  {

    $searchFields = $this->getSearchFields();


    //entity wbfsys_security_access
    if( !$entityWbfsysSecurityAccess = $this->getRegisterd( 'entityWbfsysSecurityAccess' ) )
    {
      $entityWbfsysSecurityAccess   = new WbfsysSecurityAccess_Entity() ;
    }

    $formWbfsysSecurityAccess    = $view->newForm( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setNamespace( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setPrefix( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->createSearchForm
    (
      $entityWbfsysSecurityAccess,
      ( isset($searchFields['wbfsys_security_access'])?$searchFields['wbfsys_security_access']:array() )
    );


  }//end public function searchForm */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSearchFields()
  {

    return array
    (

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysSecurityAccess_Table_Model

