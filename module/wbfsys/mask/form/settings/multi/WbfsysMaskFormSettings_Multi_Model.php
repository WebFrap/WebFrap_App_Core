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
class WbfsysMaskFormSettings_Multi_Model
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
      if( !$listWbfsysMaskFormSettings = $this->getRegisterd( 'listWbfsysMaskFormSettings' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysMaskFormSettings was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysMaskFormSettings as $entityWbfsysMaskFormSettings )
      {
        
        if( $entityWbfsysMaskFormSettings->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysMaskFormSettings_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMaskFormSettings );
            
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
                      'Mask Form Settings', 
                      'wbfsys.mask_form_settings.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysMaskFormSettings ) )
          {
            $entityText = $entityWbfsysMaskFormSettings->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Mask Form Settings {@text@}',
                'wbfsys.mask_form_settings.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysMaskFormSettings->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysMaskFormSettings_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMaskFormSettings );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Mask Form Settings {@text@}',
                  'wbfsys.mask_form_settings.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysMaskFormSettings ) )
          {
            $entityText = $entityWbfsysMaskFormSettings->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Mask Form Settings {@text@}',
                'wbfsys.mask_form_settings.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysMaskFormSettings->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Mask Form Settings: {@text@}',
          'wbfsys.mask_form_settings.message',
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
      if( !$listWbfsysMaskFormSettings = $this->getRegisterd( 'listWbfsysMaskFormSettings' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysMaskFormSettings was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysMaskFormSettings as $entityWbfsysMaskFormSettings )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysMaskFormSettings_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMaskFormSettings );
          
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
                    'Mask Form Settings', 
                    'wbfsys.mask_form_settings.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysMaskFormSettings ) )
        {
          $entityText = $entityWbfsysMaskFormSettings->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Mask Form Settings {@text@}',
              'wbfsys.mask_form_settings.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysMaskFormSettings->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Mask Form Settings: {@text@}',
          'wbfsys.mask_form_settings.message',
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
      if( !$listWbfsysMaskFormSettings = $this->getRegisterd( 'listWbfsysMaskFormSettings' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysMaskFormSettings was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysMaskFormSettings as $entityWbfsysMaskFormSettings )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysMaskFormSettings_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMaskFormSettings );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Mask Form Settings {@text@}',
                'wbfsys.mask_form_settings.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysMaskFormSettings ) )
        {
          $entityText = $entityWbfsysMaskFormSettings->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Mask Form Settings {@text@}',
              'wbfsys.mask_form_settings.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysMaskFormSettings->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Mask Form Settings: {@text@}',
          'wbfsys.mask_form_settings.message',
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
   * @param WbfsysMaskFormSettings_Multi_Access_Delete $access
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
      
      $listWbfsysMaskFormSettings = $orm->getByIds( 'WbfsysMaskFormSettings', $deleteIds );

      foreach( $listWbfsysMaskFormSettings as $entityWbfsysMaskFormSettings )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysMaskFormSettings_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMaskFormSettings );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Mask Form Settings {@text@}',
                'wbfsys.mask_form_settings.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysMaskFormSettings ) )
        {
          $entityText = $entityWbfsysMaskFormSettings->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Mask Form Settings {@text@}',
              'wbfsys.mask_form_settings.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysMaskFormSettings->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Mask Form Settings: {@text@}',
          'wbfsys.mask_form_settings.message',
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

      if( !$params->fieldsWbfsysMaskFormSettings )
        $params->fieldsWbfsysMaskFormSettings  = $orm->getCols( 'WbfsysMaskFormSettings', $params->categories );

      // if the validation fails report
      $listWbfsysMaskFormSettings = $httpRequest->validateMultiSave
      (
        'WbfsysMaskFormSettings',
        'wbfsys_mask_form_settings',
        $params->fieldsWbfsysMaskFormSettings
      );

      $this->register( 'listWbfsysMaskFormSettings', $listWbfsysMaskFormSettings );
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

      if( $params->fieldsWbfsysMaskFormSettings )
      {
        $params->fieldsWbfsysMaskFormSettings = $orm->getCols
        (
          'WbfsysMaskFormSettings',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysMaskFormSettings = $httpRequest->validateMultiInsert
      (
        'WbfsysMaskFormSettings',
        'wbfsys_mask_form_settings',
        $params->fieldsWbfsysMaskFormSettings
      );

      $this->register( 'listWbfsysMaskFormSettings', $listWbfsysMaskFormSettings );
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

      if( !$params->fieldsWbfsysMaskFormSettings )
        $params->fieldsWbfsysMaskFormSettings  = $orm->getCols( 'WbfsysMaskFormSettings', $params->categories );

      // if the validation fails report
      $listWbfsysMaskFormSettings = $httpRequest->validateMultiUpdate
      (
        'WbfsysMaskFormSettings',
        'wbfsys_mask_form_settings',
        $params->fieldsWbfsysMaskFormSettings
      );

      $this->register( 'listWbfsysMaskFormSettings', $listWbfsysMaskFormSettings );
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

}//end class WbfsysMaskFormSettings_Multi_Model

