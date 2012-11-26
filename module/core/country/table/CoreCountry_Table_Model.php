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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCountry_Table_Model
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
  * @return CoreCountry_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityCoreCountry( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param CoreCountry_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityCoreCountry( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return CoreCountry_Entity
  */
  public function getEntityCoreCountry( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityCoreCountry = $this->getRegisterd( 'main_entity' ) )
      $entityCoreCountry = $this->getRegisterd( 'entityCoreCountry' );

    //entity core_country
    if( !$entityCoreCountry )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityCoreCountry = $orm->get( 'CoreCountry', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no corecountry with this id '.$objid,
              'core.country.message'
            )
          );
          return null;
        }

        $this->register( 'entityCoreCountry', $entityCoreCountry );
        $this->register( 'main_entity', $entityCoreCountry);

      }
      else
      {
        $entityCoreCountry   = new CoreCountry_Entity() ;
        $this->register( 'entityCoreCountry', $entityCoreCountry );
        $this->register( 'main_entity', $entityCoreCountry);
      }

    }
    elseif( $objid && $objid != $entityCoreCountry->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityCoreCountry = $orm->get( 'CoreCountry', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no corecountry with this id '.$objid,
            'core.country.message'
          )
        );
        return null;
      }

      $this->register( 'entityCoreCountry', $entityCoreCountry);
      $this->register( 'main_entity', $entityCoreCountry);
    }

    return $entityCoreCountry;

  }//end public function getEntityCoreCountry */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param CoreCountry_Entity $entity
  */
  public function setEntityCoreCountry( $entity )
  {

    $this->register( 'entityCoreCountry', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityCoreCountry */

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

    $data['core_country']  = $this->getEntityCoreCountry();


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
    if( $data['core_country']->id_mainlanguage )
    {
      $valWbfsysLanguage = $orm->getField
      (
        'WbfsysLanguage',
        'rowid = '.$data['core_country']->id_mainlanguage,
        'name'
      );
      $tabData['wbfsys_language_name'] = $valWbfsysLanguage;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_language_name'] = '';
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




      if( !$fieldsCoreCountry = $this->getRegisterd( 'search_fields_core_country' ) )
      {
         $fieldsCoreCountry   = $orm->getSearchCols( 'CoreCountry' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_core_country' ) )
      {
        $fieldsCoreCountry = array_unique( array_merge
        (
          $fieldsCoreCountry,
          $refs
        ));
      }

      $filterCoreCountry     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'CoreCountry', $fieldsCoreCountry ),
        $orm->getErrorMessages( 'CoreCountry'  ),
        'search_core_country'
      );
      $condition['core_country'] = $filterCoreCountry->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_core_country', Validator::EID, 'm_role_create'   ) )
        $condition['core_country']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_core_country', Validator::EID, 'm_role_change'   ) )
        $condition['core_country']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_core_country', Validator::DATE, 'm_time_created_before'   ) )
        $condition['core_country']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_core_country', Validator::DATE, 'm_time_created_after'   ) )
        $condition['core_country']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_core_country', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['core_country']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_core_country}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['core_country']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_core_country', Validator::EID, 'm_rowid'   ) )
        $condition['core_country']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_core_country', Validator::TEXT, 'm_uuid'    ) )
        $condition['core_country']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'CoreCountry_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'CoreCountry_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' core_country.rowid NOT IN '
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


    //entity core_country
    if( !$entityCoreCountry = $this->getRegisterd( 'entityCoreCountry' ) )
    {
      $entityCoreCountry   = new CoreCountry_Entity() ;
    }

    $formCoreCountry    = $view->newForm( 'CoreCountry' );
    $formCoreCountry->setNamespace( 'CoreCountry' );
    $formCoreCountry->setPrefix( 'CoreCountry' );
    $formCoreCountry->createSearchForm
    (
      $entityCoreCountry,
      ( isset($searchFields['core_country'])?$searchFields['core_country']:array() )
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
      'core_country' => array
      (
        'name',
        'short',
      ),

    );

  }//end public function getSearchFields */

}//end class CoreCountry_Table_Model

