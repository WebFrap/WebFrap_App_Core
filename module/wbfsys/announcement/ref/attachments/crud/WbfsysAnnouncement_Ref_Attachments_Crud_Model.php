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
class WbfsysAnnouncement_Ref_Attachments_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttachment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityAttachment( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttachment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityAttachment(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttachment_Entity
  */
  public function getEntityWbfsysEntityAttachment( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityAttachment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityAttachment = $this->getRegisterd( 'entityWbfsysEntityAttachment' );


    //entity wbfsys_entity_attachment
    if( !$entityWbfsysEntityAttachment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityAttachment = $orm->get( 'WbfsysEntityAttachment', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityattachment with this id '.$objid,
              'wbfsys.entity_attachment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
        $this->register( 'main_entity', $entityWbfsysEntityAttachment );

      }
      else
      {
        $entityWbfsysEntityAttachment   = new WbfsysEntityAttachment_Entity() ;
        $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
        $this->register( 'main_entity', $entityWbfsysEntityAttachment );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityAttachment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityAttachment = $orm->get( 'WbfsysEntityAttachment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityattachment with this id '.$objid,
            'wbfsys.entity_attachment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
      $this->register( 'main_entity', $entityWbfsysEntityAttachment );
    }

    return $entityWbfsysEntityAttachment;

  }//end public function getEntityWbfsysEntityAttachment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttachment_Entity $entity
  */
  public function setEntityWbfsysEntityAttachment( $entity )
  {

    $this->register( 'entityWbfsysEntityAttachment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityAttachment */

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

    //entity wbfsys_entity_attachment
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
              'wbfsys.entity_attachment.message'
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
            'wbfsys.entity_attachment.message'
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
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysFile_Entity
  */
  public function getEntityWbfsysFile( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysFile = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysFile = $this->getRegisterd( 'entityWbfsysFile' );

    //entity wbfsys_file
    if( !$entityWbfsysFile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysFile = $orm->get( 'WbfsysFile', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysfile with this id '.$objid,
              'wbfsys.file.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysFile', $entityWbfsysFile );
        $this->register( 'main_entity', $entityWbfsysFile );

      }
      else
      {
        $entityWbfsysFile   = new WbfsysFile_Entity() ;
        $this->register( 'entityWbfsysFile', $entityWbfsysFile );
        $this->register( 'main_entity', $entityWbfsysFile );
      }

    }
    elseif( $objid && $objid != $entityWbfsysFile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysFile = $orm->get( 'WbfsysFile', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysfile with this id '.$objid,
            'wbfsys.file.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysFile', $entityWbfsysFile );
      $this->register( 'main_entity', $entityWbfsysFile );
    }

    return $entityWbfsysFile;

  }//end public function getEntityWbfsysFile */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysFile_Entity $entity
  */
  public function setEntityWbfsysFile( $entity )
  {

    $this->register( 'entityWbfsysFile', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysFile */

////////////////////////////////////////////////////////////////////////////////
// crud methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * insert an entity
   * this method fetchs the activ entity from the registry an tries to
   * insert it at the database
   * all connected entities will be added too
   *
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function insert( $params )
  {

    $orm       = $this->getOrm();
    $view      = $this->getView();
    $response  = $this->getResponse();

    try
    {
      if( !$entityWbfsysEntityAttachment = $this->getEntityWbfsysEntityAttachment() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysEntityAttachment was not registered'
        );
      }

      if( !$orm->insert( $entityWbfsysEntityAttachment ) )
      {

        $entityText = $entityWbfsysEntityAttachment->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Entity Attachment {@label@}',
            'wbfsys.announcement.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysEntityAttachment->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Entity Attachment {@label@}',
            'wbfsys.announcement.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Entity Attachment: '.$entityText,
          'create',
          $entityWbfsysEntityAttachment
        );


      }

    }
    catch( LibDb_Exception $e )
    {

      $response->addError($e->getMessage());
    }
    catch( Model_Exception $e )
    {

      $response->addError($e->getMessage());
    }

    return !$this->getResponse()->hasErrors();

  }//end public function insert */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchConnectData( $params )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view        = $this->getView();

    try
    {

      //management  wbfsys_entity_attachment source wbfsys_entity_attachment
      $entityWbfsysEntityAttachment = $orm->newEntity( 'WbfsysEntityAttachment' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityAttachment,
        'wbfsys_entity_attachment',
        array( 'id_file', 'vid' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );


      return !$this->getResponse()->hasErrors();
    }
    catch( InvalidInput_Exception $e )
    {
      return null;
    }

  }//end public function fetchConnectData */

////////////////////////////////////////////////////////////////////////////////
// check methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * check if the reference allready exists
   * @param Entity $entity
   * @return boolean
   */
  public function checkUnique( $entity = null )
  {

    $orm = $this->getOrm();

    if(!$entity)
      $entity =  $this->getRegisterd('entityWbfsysEntityAttachment');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_file', 'vid' )
    );

  }//end public function checkUnique */

////////////////////////////////////////////////////////////////////////////////
// get fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'wbfsys_entity_attachment' => array
      (
        'm_version',
        'vid',
        'id_file',
      ),
      'wbfsys_file' => array
      (
      ),
      'entity_file' => array
      (
        'name',
        'link',
        'id_type',
        'm_version',
        'description',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysAnnouncement_Ref_Attachments_Crud_Model

