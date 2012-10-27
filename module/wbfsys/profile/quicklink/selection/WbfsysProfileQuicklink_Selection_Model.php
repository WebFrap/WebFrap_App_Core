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
class WbfsysProfileQuicklink_Selection_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysProfileQuicklink_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysProfileQuicklink( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysProfileQuicklink_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysProfileQuicklink( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProfileQuicklink_Entity
  */
  public function getEntityWbfsysProfileQuicklink( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysProfileQuicklink = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProfileQuicklink = $this->getRegisterd( 'entityWbfsysProfileQuicklink' );

    //entity wbfsys_profile_quicklink
    if( !$entityWbfsysProfileQuicklink )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProfileQuicklink = $orm->get( 'WbfsysProfileQuicklink', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprofilequicklink with this id '.$objid,
              'wbfsys.profile_quicklink.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
        $this->register( 'main_entity', $entityWbfsysProfileQuicklink);

      }
      else
      {
        $entityWbfsysProfileQuicklink   = new WbfsysProfileQuicklink_Entity() ;
        $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
        $this->register( 'main_entity', $entityWbfsysProfileQuicklink);
      }

    }
    elseif( $objid && $objid != $entityWbfsysProfileQuicklink->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProfileQuicklink = $orm->get( 'WbfsysProfileQuicklink', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprofilequicklink with this id '.$objid,
            'wbfsys.profile_quicklink.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink);
      $this->register( 'main_entity', $entityWbfsysProfileQuicklink);
    }

    return $entityWbfsysProfileQuicklink;

  }//end public function getEntityWbfsysProfileQuicklink */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProfileQuicklink_Entity $entity
  */
  public function setEntityWbfsysProfileQuicklink( $entity )
  {

    $this->register( 'entityWbfsysProfileQuicklink', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProfileQuicklink */

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

    $data['wbfsys_profile_quicklink']  = $this->getEntityWbfsysProfileQuicklink();


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




      if( !$fieldsWbfsysProfileQuicklink = $this->getRegisterd( 'search_fields_wbfsys_profile_quicklink' ) )
      {
         $fieldsWbfsysProfileQuicklink   = $orm->getSearchCols( 'WbfsysProfileQuicklink' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_profile_quicklink' ) )
      {
        $fieldsWbfsysProfileQuicklink = array_unique( array_merge
        (
          $fieldsWbfsysProfileQuicklink,
          $refs
        ));
      }

      $filterWbfsysProfileQuicklink     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysProfileQuicklink', $fieldsWbfsysProfileQuicklink ),
        $orm->getErrorMessages( 'WbfsysProfileQuicklink'  ),
        'search_wbfsys_profile_quicklink'
      );
      $condition['wbfsys_profile_quicklink'] = $filterWbfsysProfileQuicklink->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_profile_quicklink', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_profile_quicklink']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_profile_quicklink', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_profile_quicklink']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_profile_quicklink', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_profile_quicklink']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_profile_quicklink', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_profile_quicklink']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_profile_quicklink', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_profile_quicklink']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_profile_quicklink}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_profile_quicklink']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_profile_quicklink', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_profile_quicklink']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_profile_quicklink', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_profile_quicklink']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysProfileQuicklink_Selection' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysProfileQuicklink_Selection_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_profile_quicklink.rowid NOT IN '
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


    //entity wbfsys_profile_quicklink
    if( !$entityWbfsysProfileQuicklink = $this->getRegisterd( 'entityWbfsysProfileQuicklink' ) )
    {
      $entityWbfsysProfileQuicklink   = new WbfsysProfileQuicklink_Entity() ;
    }

    $formWbfsysProfileQuicklink    = $view->newForm( 'WbfsysProfileQuicklink' );
    $formWbfsysProfileQuicklink->setNamespace( 'WbfsysProfileQuicklink' );
    $formWbfsysProfileQuicklink->setPrefix( 'WbfsysProfileQuicklink' );
    $formWbfsysProfileQuicklink->createSearchForm
    (
      $entityWbfsysProfileQuicklink,
      ( isset($searchFields['wbfsys_profile_quicklink'])?$searchFields['wbfsys_profile_quicklink']:array() )
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
      'wbfsys_profile_quicklink' => array
      (
        'short_desc',
      ),

    );

  }//end public function getSearchFields */

}//end class WbfsysProfileQuicklink_Selection_Model

