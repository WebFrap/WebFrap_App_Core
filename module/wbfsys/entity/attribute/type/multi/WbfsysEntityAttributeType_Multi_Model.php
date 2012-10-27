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
class WbfsysEntityAttributeType_Multi_Model
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
      if( !$listWbfsysEntityAttributeType = $this->getRegisterd( 'listWbfsysEntityAttributeType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysEntityAttributeType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysEntityAttributeType as $entityWbfsysEntityAttributeType )
      {
        
        if( $entityWbfsysEntityAttributeType->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysEntityAttributeType_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttributeType );
            
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
                      'entity attribute Type', 
                      'wbfsys.entity_attribute_type.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysEntityAttributeType ) )
          {
            $entityText = $entityWbfsysEntityAttributeType->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create entity attribute Type {@text@}',
                'wbfsys.entity_attribute_type.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysEntityAttributeType->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysEntityAttributeType_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttributeType );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update entity attribute Type {@text@}',
                  'wbfsys.entity_attribute_type.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysEntityAttributeType ) )
          {
            $entityText = $entityWbfsysEntityAttributeType->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save entity attribute Type {@text@}',
                'wbfsys.entity_attribute_type.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysEntityAttributeType->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved entity attribute Type: {@text@}',
          'wbfsys.entity_attribute_type.message',
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
      if( !$listWbfsysEntityAttributeType = $this->getRegisterd( 'listWbfsysEntityAttributeType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysEntityAttributeType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysEntityAttributeType as $entityWbfsysEntityAttributeType )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysEntityAttributeType_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttributeType );
          
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
                    'entity attribute Type', 
                    'wbfsys.entity_attribute_type.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysEntityAttributeType ) )
        {
          $entityText = $entityWbfsysEntityAttributeType->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create entity attribute Type {@text@}',
              'wbfsys.entity_attribute_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysEntityAttributeType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created entity attribute Type: {@text@}',
          'wbfsys.entity_attribute_type.message',
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
      if( !$listWbfsysEntityAttributeType = $this->getRegisterd( 'listWbfsysEntityAttributeType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysEntityAttributeType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysEntityAttributeType as $entityWbfsysEntityAttributeType )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysEntityAttributeType_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttributeType );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update entity attribute Type {@text@}',
                'wbfsys.entity_attribute_type.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysEntityAttributeType ) )
        {
          $entityText = $entityWbfsysEntityAttributeType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update entity attribute Type {@text@}',
              'wbfsys.entity_attribute_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysEntityAttributeType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated entity attribute Type: {@text@}',
          'wbfsys.entity_attribute_type.message',
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
   * @param WbfsysEntityAttributeType_Multi_Access_Delete $access
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
      
      $listWbfsysEntityAttributeType = $orm->getByIds( 'WbfsysEntityAttributeType', $deleteIds );

      foreach( $listWbfsysEntityAttributeType as $entityWbfsysEntityAttributeType )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysEntityAttributeType_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysEntityAttributeType );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete entity attribute Type {@text@}',
                'wbfsys.entity_attribute_type.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysEntityAttributeType ) )
        {
          $entityText = $entityWbfsysEntityAttributeType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete entity attribute Type {@text@}',
              'wbfsys.entity_attribute_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysEntityAttributeType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted entity attribute Type: {@text@}',
          'wbfsys.entity_attribute_type.message',
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

      if( !$params->fieldsWbfsysEntityAttributeType )
        $params->fieldsWbfsysEntityAttributeType  = $orm->getCols( 'WbfsysEntityAttributeType', $params->categories );

      // if the validation fails report
      $listWbfsysEntityAttributeType = $httpRequest->validateMultiSave
      (
        'WbfsysEntityAttributeType',
        'wbfsys_entity_attribute_type',
        $params->fieldsWbfsysEntityAttributeType
      );

      $this->register( 'listWbfsysEntityAttributeType', $listWbfsysEntityAttributeType );
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

      if( $params->fieldsWbfsysEntityAttributeType )
      {
        $params->fieldsWbfsysEntityAttributeType = $orm->getCols
        (
          'WbfsysEntityAttributeType',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysEntityAttributeType = $httpRequest->validateMultiInsert
      (
        'WbfsysEntityAttributeType',
        'wbfsys_entity_attribute_type',
        $params->fieldsWbfsysEntityAttributeType
      );

      $this->register( 'listWbfsysEntityAttributeType', $listWbfsysEntityAttributeType );
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

      if( !$params->fieldsWbfsysEntityAttributeType )
        $params->fieldsWbfsysEntityAttributeType  = $orm->getCols( 'WbfsysEntityAttributeType', $params->categories );

      // if the validation fails report
      $listWbfsysEntityAttributeType = $httpRequest->validateMultiUpdate
      (
        'WbfsysEntityAttributeType',
        'wbfsys_entity_attribute_type',
        $params->fieldsWbfsysEntityAttributeType
      );

      $this->register( 'listWbfsysEntityAttributeType', $listWbfsysEntityAttributeType );
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

}//end class WbfsysEntityAttributeType_Multi_Model

