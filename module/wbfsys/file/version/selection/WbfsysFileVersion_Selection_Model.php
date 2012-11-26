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
class WbfsysFileVersion_Selection_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysFileVersion_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysFileVersion( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysFileVersion_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysFileVersion( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysFileVersion_Entity
  */
  public function getEntityWbfsysFileVersion( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysFileVersion = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysFileVersion = $this->getRegisterd( 'entityWbfsysFileVersion' );

    //entity wbfsys_file_version
    if( !$entityWbfsysFileVersion )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysFileVersion = $orm->get( 'WbfsysFileVersion', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysfileversion with this id '.$objid,
              'wbfsys.file_version.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysFileVersion', $entityWbfsysFileVersion );
        $this->register( 'main_entity', $entityWbfsysFileVersion);

      }
      else
      {
        $entityWbfsysFileVersion   = new WbfsysFileVersion_Entity() ;
        $this->register( 'entityWbfsysFileVersion', $entityWbfsysFileVersion );
        $this->register( 'main_entity', $entityWbfsysFileVersion);
      }

    }
    elseif( $objid && $objid != $entityWbfsysFileVersion->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysFileVersion = $orm->get( 'WbfsysFileVersion', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysfileversion with this id '.$objid,
            'wbfsys.file_version.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysFileVersion', $entityWbfsysFileVersion);
      $this->register( 'main_entity', $entityWbfsysFileVersion);
    }

    return $entityWbfsysFileVersion;

  }//end public function getEntityWbfsysFileVersion */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysFileVersion_Entity $entity
  */
  public function setEntityWbfsysFileVersion( $entity )
  {

    $this->register( 'entityWbfsysFileVersion', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysFileVersion */

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

    $data['wbfsys_file_version']  = $this->getEntityWbfsysFileVersion();


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




      if( !$fieldsWbfsysFileVersion = $this->getRegisterd( 'search_fields_wbfsys_file_version' ) )
      {
         $fieldsWbfsysFileVersion   = $orm->getSearchCols( 'WbfsysFileVersion' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_file_version' ) )
      {
        $fieldsWbfsysFileVersion = array_unique( array_merge
        (
          $fieldsWbfsysFileVersion,
          $refs
        ));
      }

      $filterWbfsysFileVersion     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysFileVersion', $fieldsWbfsysFileVersion ),
        $orm->getErrorMessages( 'WbfsysFileVersion'  ),
        'search_wbfsys_file_version'
      );
      $condition['wbfsys_file_version'] = $filterWbfsysFileVersion->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_file_version', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_file_version']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_file_version', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_file_version']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_file_version', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_file_version']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_file_version', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_file_version']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_file_version', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_file_version']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_file_version}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_file_version']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_file_version', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_file_version']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_file_version', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_file_version']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysFileVersion_Selection' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysFileVersion_Selection_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_file_version.rowid NOT IN '
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


    //entity wbfsys_file_version
    if( !$entityWbfsysFileVersion = $this->getRegisterd( 'entityWbfsysFileVersion' ) )
    {
      $entityWbfsysFileVersion   = new WbfsysFileVersion_Entity() ;
    }

    $formWbfsysFileVersion    = $view->newForm( 'WbfsysFileVersion' );
    $formWbfsysFileVersion->setNamespace( 'WbfsysFileVersion' );
    $formWbfsysFileVersion->setPrefix( 'WbfsysFileVersion' );
    $formWbfsysFileVersion->createSearchForm
    (
      $entityWbfsysFileVersion,
      ( isset($searchFields['wbfsys_file_version'])?$searchFields['wbfsys_file_version']:array() )
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

}//end class WbfsysFileVersion_Selection_Model

