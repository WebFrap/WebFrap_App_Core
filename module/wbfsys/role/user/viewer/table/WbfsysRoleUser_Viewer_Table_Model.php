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
class WbfsysRoleUser_Viewer_Table_Model
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
  * @return WbfsysRoleUser_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysRoleUser_Viewer( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysRoleUser_Viewer( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysRoleUser_Entity
  */
  public function getEntityWbfsysRoleUser_Viewer( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysRoleUser_Viewer = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysRoleUser_Viewer = $this->getRegisterd( 'entityWbfsysRoleUser_Viewer' );

    //entity wbfsys_role_user
    if( !$entityWbfsysRoleUser_Viewer )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysRoleUser_Viewer = $orm->get( 'WbfsysRoleUser', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysroleuser with this id '.$objid,
              'wbfsys.role_user_viewer.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysRoleUser_Viewer', $entityWbfsysRoleUser_Viewer );
        $this->register( 'main_entity', $entityWbfsysRoleUser_Viewer);

      }
      else
      {
        $entityWbfsysRoleUser_Viewer   = new WbfsysRoleUser_Entity() ;
        $this->register( 'entityWbfsysRoleUser_Viewer', $entityWbfsysRoleUser_Viewer );
        $this->register( 'main_entity', $entityWbfsysRoleUser_Viewer);
      }

    }
    elseif( $objid && $objid != $entityWbfsysRoleUser_Viewer->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysRoleUser_Viewer = $orm->get( 'WbfsysRoleUser', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysroleuser with this id '.$objid,
            'wbfsys.role_user_viewer.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysRoleUser_Viewer', $entityWbfsysRoleUser_Viewer);
      $this->register( 'main_entity', $entityWbfsysRoleUser_Viewer);
    }

    return $entityWbfsysRoleUser_Viewer;

  }//end public function getEntityWbfsysRoleUser_Viewer */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntityWbfsysRoleUser_Viewer( $entity )
  {

    $this->register( 'entityWbfsysRoleUser_Viewer', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysRoleUser_Viewer */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedPerson_Entity
  */
  public function getEntityEmbedPerson( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_person;

    $entityEmbedPerson = $this->getRegisterd( 'entityEmbedPerson' );

    //entity wbfsys_role_user
    if( !$entityEmbedPerson )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedPerson = $orm->get( 'CorePerson', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset coreperson with the id '.$objid,
              'wbfsys.role_user_viewer.message'
            )
          );

          $entityEmbedPerson = new CorePerson_Entity;

          $entityEmbedPerson->setId( $objid, true );
          $orm->insert( $entityEmbedPerson, array(), false );

        }
        $this->register( 'entityEmbedPerson', $entityEmbedPerson );
      }
      else
      {
        $entityEmbedPerson   = new CorePerson_Entity() ;
        $this->register( 'entityEmbedPerson', $entityEmbedPerson );
      }

    }
    elseif( $objid  && $objid != $entityEmbedPerson->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedPerson = $orm->get( 'CorePerson', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset coreperson with the id '.$objid,
            'wbfsys.role_user_viewer.message'
          )
        );

        $entityEmbedPerson = new CorePerson_Entity;

        $entityEmbedPerson->setId( $objid, true );
        $orm->insert( $entityEmbedPerson );
      }

      $this->register( 'entityEmbedPerson', $entityEmbedPerson );
    }

    return $entityEmbedPerson;

  }//end public function getEntityEmbedPerson */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedPerson $entity
  */
  public function setEntityEmbedPerson( $entity )
  {

    $this->register( 'entityEmbedPerson', $entity );

  }//end public function setEntityEmbedPerson */

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

    $data['wbfsys_role_user-viewer']  = $this->getEntityWbfsysRoleUser_Viewer();
    $data['embed_person'] = $this->getEntityEmbedPerson( $data['wbfsys_role_user-viewer'] );


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
    if( $data['wbfsys_role_user-viewer']->id_person )
    {
      $valCorePerson = $orm->getField
      (
        'CorePerson',
        'rowid = '.$data['wbfsys_role_user-viewer']->id_person,
        'lastname'
      );
      $tabData['embed_person_lastname'] = $valCorePerson;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['embed_person_lastname'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_role_user-viewer']->id_mandant )
    {
      $valWbfsysRoleMandant = $orm->getField
      (
        'WbfsysRoleMandant',
        'rowid = '.$data['wbfsys_role_user-viewer']->id_mandant,
        'name'
      );
      $tabData['wbfsys_role_mandant_name'] = $valWbfsysRoleMandant;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_mandant_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 1)
    if( $data['wbfsys_role_user-viewer']->profile )
    {
      $valWbfsysProfile = $orm->getField( 'WbfsysProfile', "upper(access_key) = upper('{$data['wbfsys_role_user-viewer']->profile}')" , 'name'  );
      $tabData['wbfsys_profile_name'] = $valWbfsysProfile;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_profile_name'] = '';
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




      if( !$fieldsWbfsysRoleUser_Viewer = $this->getRegisterd( 'search_fields_wbfsys_role_user-viewer' ) )
      {
         $fieldsWbfsysRoleUser_Viewer   = $orm->getSearchCols( 'WbfsysRoleUser' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_role_user-viewer' ) )
      {
        $fieldsWbfsysRoleUser_Viewer = array_unique( array_merge
        (
          $fieldsWbfsysRoleUser_Viewer,
          $refs
        ));
      }

      $filterWbfsysRoleUser_Viewer     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysRoleUser', $fieldsWbfsysRoleUser_Viewer ),
        $orm->getErrorMessages( 'WbfsysRoleUser'  ),
        'search_wbfsys_role_user-viewer'
      );
      $condition['wbfsys_role_user-viewer'] = $filterWbfsysRoleUser_Viewer->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_role_user-viewer', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_role_user-viewer']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_role_user-viewer', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_role_user-viewer']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_role_user-viewer', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_role_user-viewer']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_role_user-viewer', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_role_user-viewer']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_role_user-viewer', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_role_user-viewer']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_role_user-viewer}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_role_user-viewer']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_role_user-viewer', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_role_user-viewer']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_role_user-viewer', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_role_user-viewer']['m_uuid'] = $mUuid;

      if
      (
        !$fieldsCorePerson
          = $this->getRegisterd( 'search_fields_core_person' )
      )
      {
        $fieldsCorePerson    = $orm->getSearchCols( 'CorePerson' );
      }

      $filterCorePerson      = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'CorePerson', $fieldsCorePerson ),
        $orm->getErrorMessages ( 'CorePerson' ),
        'search_core_person'
      );
      $condition['core_person'] = $filterCorePerson->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_core_person', Validator::EID, 'm_role_create'   ) )
        $condition['core_person']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_core_person', Validator::EID, 'm_role_change'   ) )
        $condition['core_person']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_core_person', Validator::DATE, 'm_time_created_before'   ) )
        $condition['core_person']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_core_person', Validator::DATE , 'm_time_created_after' ) )
        $condition['core_person']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_core_person', Validator::DATE, 'm_time_changed_before'  ) )
        $condition['core_person']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_core_person', Validator::DATE, 'm_time_changed_after'  ) )
        $condition['core_person']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_core_person', Validator::EID, 'm_rowid' ) )
        $condition['core_person']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_core_person', Validator::TEXT, 'm_uuid' ) )
        $condition['core_person']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysRoleUser_Viewer_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysRoleUser_Viewer_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_role_user.rowid NOT IN '
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


    //entity wbfsys_role_user
    if( !$entityWbfsysRoleUser_Viewer = $this->getRegisterd( 'entityWbfsysRoleUser_Viewer' ) )
    {
      $entityWbfsysRoleUser_Viewer   = new WbfsysRoleUser_Entity() ;
    }

    $formWbfsysRoleUser_Viewer    = $view->newForm( 'WbfsysRoleUser' );
    $formWbfsysRoleUser_Viewer->setNamespace( 'WbfsysRoleUser_Viewer' );
    $formWbfsysRoleUser_Viewer->setPrefix( 'WbfsysRoleUser_Viewer' );
    $formWbfsysRoleUser_Viewer->createSearchForm
    (
      $entityWbfsysRoleUser_Viewer,
      ( isset($searchFields['wbfsys_role_user-viewer'])?$searchFields['wbfsys_role_user-viewer']:array() )
    );

    // management core_person source core_person
    if(!$entityCorePerson = $this->getRegisterd( 'entityCorePerson' ) )
    {
      $entityCorePerson   =  new CorePerson_Entity() ;
    }

    $formCorePerson    = $view->newForm( 'CorePerson' );
    $formCorePerson->setNamespace( 'WbfsysRoleUser_Viewer' );
    $formCorePerson->setPrefix( 'CorePerson' );
    $formCorePerson->createSearchForm
    (
      $entityCorePerson,
      ( isset($searchFields['core_person'])?$searchFields['core_person']:array() )
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
      'wbfsys_role_user-viewer' => array
      (
        'name',
        'email',
        'profile',
      ),
      'core_person' => array
      (
        'firstname',
        'lastname',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysRoleUser_Viewer_Table_Model

