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
class WbfsysEntityAttachment_Multi_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// persist methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiSave( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listWbfsysEntityAttachment = $this->getRegisterd( 'listWbfsysEntityAttachment' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysEntityAttachment was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysEntityAttachment as $entityWbfsysEntityAttachment )
      {
        
        if( $entityWbfsysEntityAttachment->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysEntityAttachment_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttachment );
            
            if( !$accessDataset->insert )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to insert new entries in {@resource@}',
                  'wbf.message',
                  array
                  (
                    'resource'  => $response->i18n->l
                    ( 
                      'Entity Attachment', 
                      'wbfsys.entity_attachment.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysEntityAttachment ) )
          {
            $entityText = $entityWbfsysEntityAttachment->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Entity Attachment {@text@}',
                'wbfsys.entity_attachment.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysEntityAttachment->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysEntityAttachment_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttachment );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Entity Attachment {@text@}',
                  'wbfsys.entity_attachment.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysEntityAttachment ) )
          {
            $entityText = $entityWbfsysEntityAttachment->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Entity Attachment {@text@}',
                'wbfsys.entity_attachment.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysEntityAttachment->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Entity Attachment: {@text@}',
          'wbfsys.entity_attachment.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {


      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {


      return $e;
    }



    
    // check if there were any errors, if not fine
    return null;

  }//end public function multiSave */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiInsert( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listWbfsysEntityAttachment = $this->getRegisterd( 'listWbfsysEntityAttachment' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysEntityAttachment was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysEntityAttachment as $entityWbfsysEntityAttachment )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysEntityAttachment_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttachment );
          
          if( !$accessDataset->insert )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to insert new entries in {@resource@}',
                'wbf.message',
                array
                (
                  'resource'  => $response->i18n->l
                  ( 
                    'Entity Attachment', 
                    'wbfsys.entity_attachment.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysEntityAttachment ) )
        {
          $entityText = $entityWbfsysEntityAttachment->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Entity Attachment {@text@}',
              'wbfsys.entity_attachment.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysEntityAttachment->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Entity Attachment: {@text@}',
          'wbfsys.entity_attachment.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {
      return $e;
    }

    // check if there were any errors, if not fine
    return null;

  }//end public function multiInsert */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiUpdate( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listWbfsysEntityAttachment = $this->getRegisterd( 'listWbfsysEntityAttachment' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysEntityAttachment was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysEntityAttachment as $entityWbfsysEntityAttachment )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysEntityAttachment_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttachment );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Entity Attachment {@text@}',
                'wbfsys.entity_attachment.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysEntityAttachment ) )
        {
          $entityText = $entityWbfsysEntityAttachment->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Entity Attachment {@text@}',
              'wbfsys.entity_attachment.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysEntityAttachment->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Entity Attachment: {@text@}',
          'wbfsys.entity_attachment.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {
      return $e;
    }

    // check if there were any errors, if not fine
    return null;

  }//end public function multiUpdate */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param WbfsysEntityAttachment_Multi_Access_Delete $access
   * @param array $deleteIds
   * @param TFlag $params named parameters
   *
   * @return boolean
   */
  public function multiDelete( $access, $deleteIds, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();


      $entityTexts = array();
      
      $listWbfsysEntityAttachment = $orm->getByIds( 'WbfsysEntityAttachment', $deleteIds );

      foreach( $listWbfsysEntityAttachment as $entityWbfsysEntityAttachment )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysEntityAttachment_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttachment );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Entity Attachment {@text@}',
                'wbfsys.entity_attachment.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysEntityAttachment ) )
        {
          $entityText = $entityWbfsysEntityAttachment->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Entity Attachment {@text@}',
              'wbfsys.entity_attachment.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysEntityAttachment->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Entity Attachment: {@text@}',
          'wbfsys.entity_attachment.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {


      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {


      return $e;
    }



    // check if there were any errors, if not fine
    return null;

  }//end public function multiDelete */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiSaveData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( !$params->fieldsWbfsysEntityAttachment )
        $params->fieldsWbfsysEntityAttachment  = $orm->getCols( 'WbfsysEntityAttachment', $params->categories );

      // if the validation fails report
      $listWbfsysEntityAttachment = $httpRequest->validateMultiSave
      (
        'WbfsysEntityAttachment',
        'wbfsys_entity_attachment',
        $params->fieldsWbfsysEntityAttachment
      );

      $this->register( 'listWbfsysEntityAttachment', $listWbfsysEntityAttachment );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiSaveData */

  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiInsertData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( $params->fieldsWbfsysEntityAttachment )
      {
        $params->fieldsWbfsysEntityAttachment = $orm->getCols
        (
          'WbfsysEntityAttachment',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysEntityAttachment = $httpRequest->validateMultiInsert
      (
        'WbfsysEntityAttachment',
        'wbfsys_entity_attachment',
        $params->fieldsWbfsysEntityAttachment
      );

      $this->register( 'listWbfsysEntityAttachment', $listWbfsysEntityAttachment );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiInsertData */

  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiUpdateData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( !$params->fieldsWbfsysEntityAttachment )
        $params->fieldsWbfsysEntityAttachment  = $orm->getCols( 'WbfsysEntityAttachment', $params->categories );

      // if the validation fails report
      $listWbfsysEntityAttachment = $httpRequest->validateMultiUpdate
      (
        'WbfsysEntityAttachment',
        'wbfsys_entity_attachment',
        $params->fieldsWbfsysEntityAttachment
      );

      $this->register( 'listWbfsysEntityAttachment', $listWbfsysEntityAttachment );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiUpdateData */

  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiDelete( $params  )
  {

    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    $deleteIds = $request->data( 'delid', Validator::INT );
    
    return $deleteIds;

  }//end public function fetchMultiDelete */

}//end class WbfsysEntityAttachment_Multi_Model

