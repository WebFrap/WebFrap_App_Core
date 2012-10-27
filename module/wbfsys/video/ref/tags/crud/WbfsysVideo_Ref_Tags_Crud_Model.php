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
class WbfsysVideo_Ref_Tags_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityTag_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityTag( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityTag_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityTag(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityTag_Entity
  */
  public function getEntityWbfsysEntityTag( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityTag = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityTag = $this->getRegisterd( 'entityWbfsysEntityTag' );


    //entity wbfsys_entity_tag
    if( !$entityWbfsysEntityTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityTag = $orm->get( 'WbfsysEntityTag', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentitytag with this id '.$objid,
              'wbfsys.entity_tag.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
        $this->register( 'main_entity', $entityWbfsysEntityTag );

      }
      else
      {
        $entityWbfsysEntityTag   = new WbfsysEntityTag_Entity() ;
        $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
        $this->register( 'main_entity', $entityWbfsysEntityTag );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityTag = $orm->get( 'WbfsysEntityTag', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentitytag with this id '.$objid,
            'wbfsys.entity_tag.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
      $this->register( 'main_entity', $entityWbfsysEntityTag );
    }

    return $entityWbfsysEntityTag;

  }//end public function getEntityWbfsysEntityTag */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityTag_Entity $entity
  */
  public function setEntityWbfsysEntityTag( $entity )
  {

    $this->register( 'entityWbfsysEntityTag', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityTag */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedTag_Entity
  */
  public function getEntityEmbedTag( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_tag;

    $entityEmbedTag = $this->getRegisterd( 'entityEmbedTag' );

    //entity wbfsys_entity_tag
    if( !$entityEmbedTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedTag = $orm->get( 'WbfsysTag', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsystag with the id '.$objid,
              'wbfsys.entity_tag.message'
            )
          );

          $entityEmbedTag = new WbfsysTag_Entity;

          $entityEmbedTag->name = ' ';
          $entityEmbedTag->setId( $objid, true );
          $orm->insert( $entityEmbedTag, array(), false );

        }
        $this->register( 'entityEmbedTag', $entityEmbedTag );
      }
      else
      {
        $entityEmbedTag   = new WbfsysTag_Entity() ;
        $this->register( 'entityEmbedTag', $entityEmbedTag );
      }

    }
    elseif( $objid  && $objid != $entityEmbedTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedTag = $orm->get( 'WbfsysTag', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsystag with the id '.$objid,
            'wbfsys.entity_tag.message'
          )
        );

        $entityEmbedTag = new WbfsysTag_Entity;

          $entityEmbedTag->name = ' ';
        $entityEmbedTag->setId( $objid, true );
        $orm->insert( $entityEmbedTag );
      }

      $this->register( 'entityEmbedTag', $entityEmbedTag );
    }

    return $entityEmbedTag;

  }//end public function getEntityEmbedTag */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedTag $entity
  */
  public function setEntityEmbedTag( $entity )
  {

    $this->register( 'entityEmbedTag', $entity );

  }//end public function setEntityEmbedTag */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysTag_Entity
  */
  public function getEntityWbfsysTag( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysTag = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysTag = $this->getRegisterd( 'entityWbfsysTag' );

    //entity wbfsys_tag
    if( !$entityWbfsysTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysTag = $orm->get( 'WbfsysTag', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsystag with this id '.$objid,
              'wbfsys.tag.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysTag', $entityWbfsysTag );
        $this->register( 'main_entity', $entityWbfsysTag );

      }
      else
      {
        $entityWbfsysTag   = new WbfsysTag_Entity() ;
        $this->register( 'entityWbfsysTag', $entityWbfsysTag );
        $this->register( 'main_entity', $entityWbfsysTag );
      }

    }
    elseif( $objid && $objid != $entityWbfsysTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysTag = $orm->get( 'WbfsysTag', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsystag with this id '.$objid,
            'wbfsys.tag.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysTag', $entityWbfsysTag );
      $this->register( 'main_entity', $entityWbfsysTag );
    }

    return $entityWbfsysTag;

  }//end public function getEntityWbfsysTag */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysTag_Entity $entity
  */
  public function setEntityWbfsysTag( $entity )
  {

    $this->register( 'entityWbfsysTag', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysTag */

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
      if( !$entityWbfsysEntityTag = $this->getEntityWbfsysEntityTag() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysEntityTag was not registered'
        );
      }

      if( !$orm->insert($entityWbfsysEntityTag) )
      {

        $entityText = $entityWbfsysEntityTag->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Entity Tag {@label@}',
            'wbfsys.video.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysEntityTag->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Entity Tag {@label@}',
            'wbfsys.video.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Entity Tag: '.$entityText,
          'create',
          $entityWbfsysEntityTag
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

      //management  wbfsys_entity_tag source wbfsys_entity_tag
      $entityWbfsysEntityTag = $orm->newEntity( 'WbfsysEntityTag' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityTag,
        'wbfsys_entity_tag',
        array( 'id_tag', 'vid' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );


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
      $entity =  $this->getRegisterd('entityWbfsysEntityTag');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_tag', 'vid' )
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
      'wbfsys_entity_tag' => array
      (
        'vid',
        'id_entity',
        'id_tag',
        'm_version',
      ),
      'embed_tag' => array
      (
        'name',
        'access_key',
        'id_lang',
        'm_parent',
        'description',
      ),
      'wbfsys_tag' => array
      (
        'name',
        'access_key',
        'id_lang',
        'm_parent',
        'description',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysVideo_Ref_Tags_Crud_Model

