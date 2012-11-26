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
class WbfsysFixId_Table_Model
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
  * @return WbfsysFixId_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysFixId( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysFixId_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysFixId( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysFixId_Entity
  */
  public function getEntityWbfsysFixId( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysFixId = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysFixId = $this->getRegisterd( 'entityWbfsysFixId' );

    //entity wbfsys_fix_id
    if( !$entityWbfsysFixId )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysFixId = $orm->get( 'WbfsysFixId', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysfixid with this id '.$objid,
              'wbfsys.fix_id.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysFixId', $entityWbfsysFixId );
        $this->register( 'main_entity', $entityWbfsysFixId);

      }
      else
      {
        $entityWbfsysFixId   = new WbfsysFixId_Entity() ;
        $this->register( 'entityWbfsysFixId', $entityWbfsysFixId );
        $this->register( 'main_entity', $entityWbfsysFixId);
      }

    }
    elseif( $objid && $objid != $entityWbfsysFixId->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysFixId = $orm->get( 'WbfsysFixId', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysfixid with this id '.$objid,
            'wbfsys.fix_id.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysFixId', $entityWbfsysFixId);
      $this->register( 'main_entity', $entityWbfsysFixId);
    }

    return $entityWbfsysFixId;

  }//end public function getEntityWbfsysFixId */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysFixId_Entity $entity
  */
  public function setEntityWbfsysFixId( $entity )
  {

    $this->register( 'entityWbfsysFixId', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysFixId */

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

    $data['wbfsys_fix_id']  = $this->getEntityWbfsysFixId();


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




      if( !$fieldsWbfsysFixId = $this->getRegisterd( 'search_fields_wbfsys_fix_id' ) )
      {
         $fieldsWbfsysFixId   = $orm->getSearchCols( 'WbfsysFixId' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_fix_id' ) )
      {
        $fieldsWbfsysFixId = array_unique( array_merge
        (
          $fieldsWbfsysFixId,
          $refs
        ));
      }

      $filterWbfsysFixId     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysFixId', $fieldsWbfsysFixId ),
        $orm->getErrorMessages( 'WbfsysFixId'  ),
        'search_wbfsys_fix_id'
      );
      $condition['wbfsys_fix_id'] = $filterWbfsysFixId->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_fix_id', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_fix_id']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_fix_id', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_fix_id']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_fix_id', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_fix_id']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_fix_id', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_fix_id']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_fix_id', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_fix_id']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_fix_id}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_fix_id']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_fix_id', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_fix_id']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_fix_id', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_fix_id']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysFixId_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysFixId_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_fix_id.rowid NOT IN '
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


    //entity wbfsys_fix_id
    if( !$entityWbfsysFixId = $this->getRegisterd( 'entityWbfsysFixId' ) )
    {
      $entityWbfsysFixId   = new WbfsysFixId_Entity() ;
    }

    $formWbfsysFixId    = $view->newForm( 'WbfsysFixId' );
    $formWbfsysFixId->setNamespace( 'WbfsysFixId' );
    $formWbfsysFixId->setPrefix( 'WbfsysFixId' );
    $formWbfsysFixId->createSearchForm
    (
      $entityWbfsysFixId,
      ( isset($searchFields['wbfsys_fix_id'])?$searchFields['wbfsys_fix_id']:array() )
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

}//end class WbfsysFixId_Table_Model

