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
class WbfsysAddressItemType_Multi_Model
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
      if( !$listWbfsysAddressItemType = $this->getRegisterd( 'listWbfsysAddressItemType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAddressItemType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAddressItemType as $entityWbfsysAddressItemType )
      {
        
        if( $entityWbfsysAddressItemType->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysAddressItemType_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAddressItemType );
            
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
                      'address item Type', 
                      'wbfsys.address_item_type.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysAddressItemType ) )
          {
            $entityText = $entityWbfsysAddressItemType->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create address item Type {@text@}',
                'wbfsys.address_item_type.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysAddressItemType->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysAddressItemType_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAddressItemType );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update address item Type {@text@}',
                  'wbfsys.address_item_type.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysAddressItemType ) )
          {
            $entityText = $entityWbfsysAddressItemType->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save address item Type {@text@}',
                'wbfsys.address_item_type.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysAddressItemType->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved address item Type: {@text@}',
          'wbfsys.address_item_type.message',
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
      if( !$listWbfsysAddressItemType = $this->getRegisterd( 'listWbfsysAddressItemType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAddressItemType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAddressItemType as $entityWbfsysAddressItemType )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysAddressItemType_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAddressItemType );
          
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
                    'address item Type', 
                    'wbfsys.address_item_type.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysAddressItemType ) )
        {
          $entityText = $entityWbfsysAddressItemType->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create address item Type {@text@}',
              'wbfsys.address_item_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysAddressItemType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created address item Type: {@text@}',
          'wbfsys.address_item_type.message',
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
      if( !$listWbfsysAddressItemType = $this->getRegisterd( 'listWbfsysAddressItemType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAddressItemType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAddressItemType as $entityWbfsysAddressItemType )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysAddressItemType_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAddressItemType );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update address item Type {@text@}',
                'wbfsys.address_item_type.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysAddressItemType ) )
        {
          $entityText = $entityWbfsysAddressItemType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update address item Type {@text@}',
              'wbfsys.address_item_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysAddressItemType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated address item Type: {@text@}',
          'wbfsys.address_item_type.message',
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
   * @param WbfsysAddressItemType_Multi_Access_Delete $access
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
      
      $listWbfsysAddressItemType = $orm->getByIds( 'WbfsysAddressItemType', $deleteIds );

      foreach( $listWbfsysAddressItemType as $entityWbfsysAddressItemType )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysAddressItemType_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAddressItemType );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete address item Type {@text@}',
                'wbfsys.address_item_type.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysAddressItemType ) )
        {
          $entityText = $entityWbfsysAddressItemType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete address item Type {@text@}',
              'wbfsys.address_item_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysAddressItemType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted address item Type: {@text@}',
          'wbfsys.address_item_type.message',
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

      if( !$params->fieldsWbfsysAddressItemType )
        $params->fieldsWbfsysAddressItemType  = $orm->getCols( 'WbfsysAddressItemType', $params->categories );

      // if the validation fails report
      $listWbfsysAddressItemType = $httpRequest->validateMultiSave
      (
        'WbfsysAddressItemType',
        'wbfsys_address_item_type',
        $params->fieldsWbfsysAddressItemType
      );

      $this->register( 'listWbfsysAddressItemType', $listWbfsysAddressItemType );
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

      if( $params->fieldsWbfsysAddressItemType )
      {
        $params->fieldsWbfsysAddressItemType = $orm->getCols
        (
          'WbfsysAddressItemType',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysAddressItemType = $httpRequest->validateMultiInsert
      (
        'WbfsysAddressItemType',
        'wbfsys_address_item_type',
        $params->fieldsWbfsysAddressItemType
      );

      $this->register( 'listWbfsysAddressItemType', $listWbfsysAddressItemType );
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

      if( !$params->fieldsWbfsysAddressItemType )
        $params->fieldsWbfsysAddressItemType  = $orm->getCols( 'WbfsysAddressItemType', $params->categories );

      // if the validation fails report
      $listWbfsysAddressItemType = $httpRequest->validateMultiUpdate
      (
        'WbfsysAddressItemType',
        'wbfsys_address_item_type',
        $params->fieldsWbfsysAddressItemType
      );

      $this->register( 'listWbfsysAddressItemType', $listWbfsysAddressItemType );
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

}//end class WbfsysAddressItemType_Multi_Model

