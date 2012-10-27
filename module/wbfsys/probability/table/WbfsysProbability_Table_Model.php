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
class WbfsysProbability_Table_Model
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
  * @return WbfsysProbability_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysProbability( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysProbability_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysProbability( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProbability_Entity
  */
  public function getEntityWbfsysProbability( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysProbability = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProbability = $this->getRegisterd( 'entityWbfsysProbability' );

    //entity wbfsys_probability
    if( !$entityWbfsysProbability )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProbability = $orm->get( 'WbfsysProbability', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprobability with this id '.$objid,
              'wbfsys.probability.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProbability', $entityWbfsysProbability );
        $this->register( 'main_entity', $entityWbfsysProbability);

      }
      else
      {
        $entityWbfsysProbability   = new WbfsysProbability_Entity() ;
        $this->register( 'entityWbfsysProbability', $entityWbfsysProbability );
        $this->register( 'main_entity', $entityWbfsysProbability);
      }

    }
    elseif( $objid && $objid != $entityWbfsysProbability->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProbability = $orm->get( 'WbfsysProbability', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprobability with this id '.$objid,
            'wbfsys.probability.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProbability', $entityWbfsysProbability);
      $this->register( 'main_entity', $entityWbfsysProbability);
    }

    return $entityWbfsysProbability;

  }//end public function getEntityWbfsysProbability */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProbability_Entity $entity
  */
  public function setEntityWbfsysProbability( $entity )
  {

    $this->register( 'entityWbfsysProbability', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProbability */

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

    $data['wbfsys_probability']  = $this->getEntityWbfsysProbability();


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




      if( !$fieldsWbfsysProbability = $this->getRegisterd( 'search_fields_wbfsys_probability' ) )
      {
         $fieldsWbfsysProbability   = $orm->getSearchCols( 'WbfsysProbability' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_probability' ) )
      {
        $fieldsWbfsysProbability = array_unique( array_merge
        (
          $fieldsWbfsysProbability,
          $refs
        ));
      }

      $filterWbfsysProbability     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysProbability', $fieldsWbfsysProbability ),
        $orm->getErrorMessages( 'WbfsysProbability'  ),
        'search_wbfsys_probability'
      );
      $condition['wbfsys_probability'] = $filterWbfsysProbability->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_probability', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_probability']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_probability', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_probability']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_probability', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_probability']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_probability', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_probability']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_probability', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_probability']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_probability}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_probability']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_probability', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_probability']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_probability', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_probability']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysProbability_Table' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysProbability_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_probability.rowid NOT IN '
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


    //entity wbfsys_probability
    if( !$entityWbfsysProbability = $this->getRegisterd( 'entityWbfsysProbability' ) )
    {
      $entityWbfsysProbability   = new WbfsysProbability_Entity() ;
    }

    $formWbfsysProbability    = $view->newForm( 'WbfsysProbability' );
    $formWbfsysProbability->setNamespace( 'WbfsysProbability' );
    $formWbfsysProbability->setPrefix( 'WbfsysProbability' );
    $formWbfsysProbability->createSearchForm
    (
      $entityWbfsysProbability,
      ( isset($searchFields['wbfsys_probability'])?$searchFields['wbfsys_probability']:array() )
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
      'wbfsys_probability' => array
      (
        'name',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param array $orders
   * @return boolean
   */
  public function changeOrder( $orders )
  {

    $orm = $this->getOrm();

    try
    {
      foreach( $orders as $order => $id )
      {
        $orm->update( "WbfsysProbability", $id, array( 'm_order' =>  $order ) );
      }
    }
    catch( LibDb_Exception $e )
    {
      return $e;
    }

    // still running? fine :-)
    return null;

  }//end public function changeOrder */

}//end class WbfsysProbability_Table_Model

