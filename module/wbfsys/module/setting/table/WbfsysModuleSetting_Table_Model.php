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
class WbfsysModuleSetting_Table_Model
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
  * @return WbfsysModuleSetting_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysModuleSetting( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysModuleSetting_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysModuleSetting( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysModuleSetting_Entity
  */
  public function getEntityWbfsysModuleSetting( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysModuleSetting = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysModuleSetting = $this->getRegisterd( 'entityWbfsysModuleSetting' );

    //entity wbfsys_module_setting
    if( !$entityWbfsysModuleSetting )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysModuleSetting = $orm->get( 'WbfsysModuleSetting', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmodulesetting with this id '.$objid,
              'wbfsys.module_setting.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysModuleSetting', $entityWbfsysModuleSetting );
        $this->register( 'main_entity', $entityWbfsysModuleSetting);

      }
      else
      {
        $entityWbfsysModuleSetting   = new WbfsysModuleSetting_Entity() ;
        $this->register( 'entityWbfsysModuleSetting', $entityWbfsysModuleSetting );
        $this->register( 'main_entity', $entityWbfsysModuleSetting);
      }

    }
    elseif( $objid && $objid != $entityWbfsysModuleSetting->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysModuleSetting = $orm->get( 'WbfsysModuleSetting', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmodulesetting with this id '.$objid,
            'wbfsys.module_setting.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysModuleSetting', $entityWbfsysModuleSetting);
      $this->register( 'main_entity', $entityWbfsysModuleSetting);
    }

    return $entityWbfsysModuleSetting;

  }//end public function getEntityWbfsysModuleSetting */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysModuleSetting_Entity $entity
  */
  public function setEntityWbfsysModuleSetting( $entity )
  {

    $this->register( 'entityWbfsysModuleSetting', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysModuleSetting */

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

    $data['wbfsys_module_setting']  = $this->getEntityWbfsysModuleSetting();


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
    if( $data['wbfsys_module_setting']->id_module )
    {
      $valWbfsysModule = $orm->getField
      (
        'WbfsysModule',
        'rowid = '.$data['wbfsys_module_setting']->id_module,
        'name'
      );
      $tabData['wbfsys_module_name'] = $valWbfsysModule;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_module_name'] = '';
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




      if( !$fieldsWbfsysModuleSetting = $this->getRegisterd( 'search_fields_wbfsys_module_setting' ) )
      {
         $fieldsWbfsysModuleSetting   = $orm->getSearchCols( 'WbfsysModuleSetting' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_module_setting' ) )
      {
        $fieldsWbfsysModuleSetting = array_unique( array_merge
        (
          $fieldsWbfsysModuleSetting,
          $refs
        ));
      }

      $filterWbfsysModuleSetting     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysModuleSetting', $fieldsWbfsysModuleSetting ),
        $orm->getErrorMessages( 'WbfsysModuleSetting'  ),
        'search_wbfsys_module_setting'
      );
      $condition['wbfsys_module_setting'] = $filterWbfsysModuleSetting->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_module_setting', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_module_setting']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_module_setting', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_module_setting']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_module_setting', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_module_setting']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_module_setting', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_module_setting']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_module_setting', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_module_setting']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_module_setting}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_module_setting']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_module_setting', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_module_setting']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_module_setting', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_module_setting']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysModuleSetting_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysModuleSetting_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_module_setting.rowid NOT IN '
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


    //entity wbfsys_module_setting
    if( !$entityWbfsysModuleSetting = $this->getRegisterd( 'entityWbfsysModuleSetting' ) )
    {
      $entityWbfsysModuleSetting   = new WbfsysModuleSetting_Entity() ;
    }

    $formWbfsysModuleSetting    = $view->newForm( 'WbfsysModuleSetting' );
    $formWbfsysModuleSetting->setNamespace( 'WbfsysModuleSetting' );
    $formWbfsysModuleSetting->setPrefix( 'WbfsysModuleSetting' );
    $formWbfsysModuleSetting->createSearchForm
    (
      $entityWbfsysModuleSetting,
      ( isset($searchFields['wbfsys_module_setting'])?$searchFields['wbfsys_module_setting']:array() )
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
      'wbfsys_module_setting' => array
      (
        'access_key',
      ),

    );

  }//end public function getSearchFields */

}//end class WbfsysModuleSetting_Table_Model

