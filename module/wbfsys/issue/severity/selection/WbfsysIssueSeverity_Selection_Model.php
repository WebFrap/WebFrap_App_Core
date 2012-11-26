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
class WbfsysIssueSeverity_Selection_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysIssueSeverity_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysIssueSeverity( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysIssueSeverity_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysIssueSeverity( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysIssueSeverity_Entity
  */
  public function getEntityWbfsysIssueSeverity( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysIssueSeverity = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysIssueSeverity = $this->getRegisterd( 'entityWbfsysIssueSeverity' );

    //entity wbfsys_issue_severity
    if( !$entityWbfsysIssueSeverity )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysIssueSeverity = $orm->get( 'WbfsysIssueSeverity', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysissueseverity with this id '.$objid,
              'wbfsys.issue_severity.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysIssueSeverity', $entityWbfsysIssueSeverity );
        $this->register( 'main_entity', $entityWbfsysIssueSeverity);

      }
      else
      {
        $entityWbfsysIssueSeverity   = new WbfsysIssueSeverity_Entity() ;
        $this->register( 'entityWbfsysIssueSeverity', $entityWbfsysIssueSeverity );
        $this->register( 'main_entity', $entityWbfsysIssueSeverity);
      }

    }
    elseif( $objid && $objid != $entityWbfsysIssueSeverity->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysIssueSeverity = $orm->get( 'WbfsysIssueSeverity', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysissueseverity with this id '.$objid,
            'wbfsys.issue_severity.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysIssueSeverity', $entityWbfsysIssueSeverity);
      $this->register( 'main_entity', $entityWbfsysIssueSeverity);
    }

    return $entityWbfsysIssueSeverity;

  }//end public function getEntityWbfsysIssueSeverity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysIssueSeverity_Entity $entity
  */
  public function setEntityWbfsysIssueSeverity( $entity )
  {

    $this->register( 'entityWbfsysIssueSeverity', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysIssueSeverity */

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

    $data['wbfsys_issue_severity']  = $this->getEntityWbfsysIssueSeverity();


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
// Context: selection
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




      if( !$fieldsWbfsysIssueSeverity = $this->getRegisterd( 'search_fields_wbfsys_issue_severity' ) )
      {
         $fieldsWbfsysIssueSeverity   = $orm->getSearchCols( 'WbfsysIssueSeverity' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_issue_severity' ) )
      {
        $fieldsWbfsysIssueSeverity = array_unique( array_merge
        (
          $fieldsWbfsysIssueSeverity,
          $refs
        ));
      }

      $filterWbfsysIssueSeverity     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysIssueSeverity', $fieldsWbfsysIssueSeverity ),
        $orm->getErrorMessages( 'WbfsysIssueSeverity'  ),
        'search_wbfsys_issue_severity'
      );
      $condition['wbfsys_issue_severity'] = $filterWbfsysIssueSeverity->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_issue_severity', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_issue_severity']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_issue_severity', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_issue_severity']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_issue_severity', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_issue_severity']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_issue_severity', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_issue_severity']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_issue_severity', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_issue_severity']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_issue_severity}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_issue_severity']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_issue_severity', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_issue_severity']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_issue_severity', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_issue_severity']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysIssueSeverity_Selection' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysIssueSeverity_Selection_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_issue_severity.rowid NOT IN '
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
        'selection',
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


    //entity wbfsys_issue_severity
    if( !$entityWbfsysIssueSeverity = $this->getRegisterd( 'entityWbfsysIssueSeverity' ) )
    {
      $entityWbfsysIssueSeverity   = new WbfsysIssueSeverity_Entity() ;
    }

    $formWbfsysIssueSeverity    = $view->newForm( 'WbfsysIssueSeverity' );
    $formWbfsysIssueSeverity->setNamespace( 'WbfsysIssueSeverity' );
    $formWbfsysIssueSeverity->setPrefix( 'WbfsysIssueSeverity' );
    $formWbfsysIssueSeverity->createSearchForm
    (
      $entityWbfsysIssueSeverity,
      ( isset($searchFields['wbfsys_issue_severity'])?$searchFields['wbfsys_issue_severity']:array() )
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
      'wbfsys_issue_severity' => array
      (
        'name',
        'description',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysIssueSeverity_Selection_Model

