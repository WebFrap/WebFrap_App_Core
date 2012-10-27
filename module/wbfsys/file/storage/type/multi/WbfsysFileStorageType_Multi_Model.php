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
class WbfsysFileStorageType_Multi_Model
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
      if( !$listWbfsysFileStorageType = $this->getRegisterd( 'listWbfsysFileStorageType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysFileStorageType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysFileStorageType as $entityWbfsysFileStorageType )
      {
        
        if( $entityWbfsysFileStorageType->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysFileStorageType_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysFileStorageType );
            
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
                      'file storage Type', 
                      'wbfsys.file_storage_type.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysFileStorageType ) )
          {
            $entityText = $entityWbfsysFileStorageType->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create file storage Type {@text@}',
                'wbfsys.file_storage_type.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysFileStorageType->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysFileStorageType_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysFileStorageType );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update file storage Type {@text@}',
                  'wbfsys.file_storage_type.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysFileStorageType ) )
          {
            $entityText = $entityWbfsysFileStorageType->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save file storage Type {@text@}',
                'wbfsys.file_storage_type.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysFileStorageType->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved file storage Type: {@text@}',
          'wbfsys.file_storage_type.message',
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
      if( !$listWbfsysFileStorageType = $this->getRegisterd( 'listWbfsysFileStorageType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysFileStorageType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysFileStorageType as $entityWbfsysFileStorageType )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysFileStorageType_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysFileStorageType );
          
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
                    'file storage Type', 
                    'wbfsys.file_storage_type.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysFileStorageType ) )
        {
          $entityText = $entityWbfsysFileStorageType->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create file storage Type {@text@}',
              'wbfsys.file_storage_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysFileStorageType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created file storage Type: {@text@}',
          'wbfsys.file_storage_type.message',
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
      if( !$listWbfsysFileStorageType = $this->getRegisterd( 'listWbfsysFileStorageType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysFileStorageType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysFileStorageType as $entityWbfsysFileStorageType )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysFileStorageType_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysFileStorageType );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update file storage Type {@text@}',
                'wbfsys.file_storage_type.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysFileStorageType ) )
        {
          $entityText = $entityWbfsysFileStorageType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update file storage Type {@text@}',
              'wbfsys.file_storage_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysFileStorageType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated file storage Type: {@text@}',
          'wbfsys.file_storage_type.message',
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
   * @param WbfsysFileStorageType_Multi_Access_Delete $access
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
      
      $listWbfsysFileStorageType = $orm->getByIds( 'WbfsysFileStorageType', $deleteIds );

      foreach( $listWbfsysFileStorageType as $entityWbfsysFileStorageType )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysFileStorageType_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysFileStorageType );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete file storage Type {@text@}',
                'wbfsys.file_storage_type.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysFileStorageType ) )
        {
          $entityText = $entityWbfsysFileStorageType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete file storage Type {@text@}',
              'wbfsys.file_storage_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysFileStorageType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted file storage Type: {@text@}',
          'wbfsys.file_storage_type.message',
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

      if( !$params->fieldsWbfsysFileStorageType )
        $params->fieldsWbfsysFileStorageType  = $orm->getCols( 'WbfsysFileStorageType', $params->categories );

      // if the validation fails report
      $listWbfsysFileStorageType = $httpRequest->validateMultiSave
      (
        'WbfsysFileStorageType',
        'wbfsys_file_storage_type',
        $params->fieldsWbfsysFileStorageType
      );

      $this->register( 'listWbfsysFileStorageType', $listWbfsysFileStorageType );
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

      if( $params->fieldsWbfsysFileStorageType )
      {
        $params->fieldsWbfsysFileStorageType = $orm->getCols
        (
          'WbfsysFileStorageType',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysFileStorageType = $httpRequest->validateMultiInsert
      (
        'WbfsysFileStorageType',
        'wbfsys_file_storage_type',
        $params->fieldsWbfsysFileStorageType
      );

      $this->register( 'listWbfsysFileStorageType', $listWbfsysFileStorageType );
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

      if( !$params->fieldsWbfsysFileStorageType )
        $params->fieldsWbfsysFileStorageType  = $orm->getCols( 'WbfsysFileStorageType', $params->categories );

      // if the validation fails report
      $listWbfsysFileStorageType = $httpRequest->validateMultiUpdate
      (
        'WbfsysFileStorageType',
        'wbfsys_file_storage_type',
        $params->fieldsWbfsysFileStorageType
      );

      $this->register( 'listWbfsysFileStorageType', $listWbfsysFileStorageType );
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

}//end class WbfsysFileStorageType_Multi_Model

