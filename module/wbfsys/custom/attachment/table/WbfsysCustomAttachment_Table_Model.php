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
class WbfsysCustomAttachment_Table_Model
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
  * @return WbfsysCustomAttachment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCustomAttachment( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysCustomAttachment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCustomAttachment( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCustomAttachment_Entity
  */
  public function getEntityWbfsysCustomAttachment( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysCustomAttachment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCustomAttachment = $this->getRegisterd( 'entityWbfsysCustomAttachment' );

    //entity wbfsys_custom_attachment
    if( !$entityWbfsysCustomAttachment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCustomAttachment = $orm->get( 'WbfsysCustomAttachment', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscustomattachment with this id '.$objid,
              'wbfsys.custom_attachment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCustomAttachment', $entityWbfsysCustomAttachment );
        $this->register( 'main_entity', $entityWbfsysCustomAttachment);

      }
      else
      {
        $entityWbfsysCustomAttachment   = new WbfsysCustomAttachment_Entity() ;
        $this->register( 'entityWbfsysCustomAttachment', $entityWbfsysCustomAttachment );
        $this->register( 'main_entity', $entityWbfsysCustomAttachment);
      }

    }
    elseif( $objid && $objid != $entityWbfsysCustomAttachment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCustomAttachment = $orm->get( 'WbfsysCustomAttachment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscustomattachment with this id '.$objid,
            'wbfsys.custom_attachment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCustomAttachment', $entityWbfsysCustomAttachment);
      $this->register( 'main_entity', $entityWbfsysCustomAttachment);
    }

    return $entityWbfsysCustomAttachment;

  }//end public function getEntityWbfsysCustomAttachment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCustomAttachment_Entity $entity
  */
  public function setEntityWbfsysCustomAttachment( $entity )
  {

    $this->register( 'entityWbfsysCustomAttachment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCustomAttachment */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EntityFile_Entity
  */
  public function getEntityEntityFile( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_file;

    $entityEntityFile = $this->getRegisterd( 'entityEntityFile' );

    //entity wbfsys_custom_attachment
    if( !$entityEntityFile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEntityFile = $orm->get( 'WbfsysFile', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsysfile with the id '.$objid,
              'wbfsys.custom_attachment.message'
            )
          );

          $entityEntityFile = new WbfsysFile_Entity;

          $entityEntityFile->setId( $objid, true );
          $orm->insert( $entityEntityFile, array(), false );

        }
        $this->register( 'entityEntityFile', $entityEntityFile );
      }
      else
      {
        $entityEntityFile   = new WbfsysFile_Entity() ;
        $this->register( 'entityEntityFile', $entityEntityFile );
      }

    }
    elseif( $objid  && $objid != $entityEntityFile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEntityFile = $orm->get( 'WbfsysFile', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsysfile with the id '.$objid,
            'wbfsys.custom_attachment.message'
          )
        );

        $entityEntityFile = new WbfsysFile_Entity;

        $entityEntityFile->setId( $objid, true );
        $orm->insert( $entityEntityFile );
      }

      $this->register( 'entityEntityFile', $entityEntityFile );
    }

    return $entityEntityFile;

  }//end public function getEntityEntityFile */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEntityFile $entity
  */
  public function setEntityEntityFile( $entity )
  {

    $this->register( 'entityEntityFile', $entity );

  }//end public function setEntityEntityFile */

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

    $data['wbfsys_custom_attachment']  = $this->getEntityWbfsysCustomAttachment();
    $data['entity_file'] = $this->getEntityEntityFile( $data['wbfsys_custom_attachment'] );


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
    if( $data['entity_file']->id_type )
    {
      $valWbfsysFileType = $orm->getField
      (
        'WbfsysFileType',
        'rowid = '.$data['entity_file']->id_type,
        'name'
      );
      $tabData['wbfsys_file_type_name'] = $valWbfsysFileType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_file_type_name'] = '';
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




      if( !$fieldsWbfsysCustomAttachment = $this->getRegisterd( 'search_fields_wbfsys_custom_attachment' ) )
      {
         $fieldsWbfsysCustomAttachment   = $orm->getSearchCols( 'WbfsysCustomAttachment' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_custom_attachment' ) )
      {
        $fieldsWbfsysCustomAttachment = array_unique( array_merge
        (
          $fieldsWbfsysCustomAttachment,
          $refs
        ));
      }

      $filterWbfsysCustomAttachment     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysCustomAttachment', $fieldsWbfsysCustomAttachment ),
        $orm->getErrorMessages( 'WbfsysCustomAttachment'  ),
        'search_wbfsys_custom_attachment'
      );
      $condition['wbfsys_custom_attachment'] = $filterWbfsysCustomAttachment->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_custom_attachment', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_custom_attachment']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_custom_attachment', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_custom_attachment']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_custom_attachment', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_custom_attachment']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_custom_attachment', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_custom_attachment']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_custom_attachment', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_custom_attachment']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_custom_attachment}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_custom_attachment']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_custom_attachment', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_custom_attachment']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_custom_attachment', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_custom_attachment']['m_uuid'] = $mUuid;

      if
      (
        !$fieldsWbfsysFile
          = $this->getRegisterd( 'search_fields_wbfsys_file' )
      )
      {
        $fieldsWbfsysFile    = $orm->getSearchCols( 'WbfsysFile' );
      }

      $filterWbfsysFile      = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysFile', $fieldsWbfsysFile ),
        $orm->getErrorMessages ( 'WbfsysFile' ),
        'search_wbfsys_file'
      );
      $condition['wbfsys_file'] = $filterWbfsysFile->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_file', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_file']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_file', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_file']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_file', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_file']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_file', Validator::DATE , 'm_time_created_after' ) )
        $condition['wbfsys_file']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_file', Validator::DATE, 'm_time_changed_before'  ) )
        $condition['wbfsys_file']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_file', Validator::DATE, 'm_time_changed_after'  ) )
        $condition['wbfsys_file']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_file', Validator::EID, 'm_rowid' ) )
        $condition['wbfsys_file']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_file', Validator::TEXT, 'm_uuid' ) )
        $condition['wbfsys_file']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysCustomAttachment_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysCustomAttachment_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_custom_attachment.rowid NOT IN '
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


    //entity wbfsys_custom_attachment
    if( !$entityWbfsysCustomAttachment = $this->getRegisterd( 'entityWbfsysCustomAttachment' ) )
    {
      $entityWbfsysCustomAttachment   = new WbfsysCustomAttachment_Entity() ;
    }

    $formWbfsysCustomAttachment    = $view->newForm( 'WbfsysCustomAttachment' );
    $formWbfsysCustomAttachment->setNamespace( 'WbfsysCustomAttachment' );
    $formWbfsysCustomAttachment->setPrefix( 'WbfsysCustomAttachment' );
    $formWbfsysCustomAttachment->createSearchForm
    (
      $entityWbfsysCustomAttachment,
      ( isset($searchFields['wbfsys_custom_attachment'])?$searchFields['wbfsys_custom_attachment']:array() )
    );

    // management wbfsys_file source wbfsys_file
    if(!$entityWbfsysFile = $this->getRegisterd( 'entityWbfsysFile' ) )
    {
      $entityWbfsysFile   =  new WbfsysFile_Entity() ;
    }

    $formWbfsysFile    = $view->newForm( 'WbfsysFile' );
    $formWbfsysFile->setNamespace( 'WbfsysCustomAttachment' );
    $formWbfsysFile->setPrefix( 'WbfsysFile' );
    $formWbfsysFile->createSearchForm
    (
      $entityWbfsysFile,
      ( isset($searchFields['wbfsys_file'])?$searchFields['wbfsys_file']:array() )
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
      'wbfsys_file' => array
      (
        'link',
        'id_type',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysCustomAttachment_Table_Model

