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
class WbfsysModuleSetting_Multi_Model
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
      if( !$listWbfsysModuleSetting = $this->getRegisterd( 'listWbfsysModuleSetting' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysModuleSetting was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysModuleSetting as $entityWbfsysModuleSetting )
      {
        
        if( $entityWbfsysModuleSetting->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysModuleSetting_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysModuleSetting );
            
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
                      'Module Setting', 
                      'wbfsys.module_setting.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysModuleSetting ) )
          {
            $entityText = $entityWbfsysModuleSetting->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Module Setting {@text@}',
                'wbfsys.module_setting.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysModuleSetting->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysModuleSetting_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysModuleSetting );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Module Setting {@text@}',
                  'wbfsys.module_setting.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysModuleSetting ) )
          {
            $entityText = $entityWbfsysModuleSetting->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Module Setting {@text@}',
                'wbfsys.module_setting.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysModuleSetting->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Module Setting: {@text@}',
          'wbfsys.module_setting.message',
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
      if( !$listWbfsysModuleSetting = $this->getRegisterd( 'listWbfsysModuleSetting' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysModuleSetting was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysModuleSetting as $entityWbfsysModuleSetting )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysModuleSetting_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysModuleSetting );
          
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
                    'Module Setting', 
                    'wbfsys.module_setting.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysModuleSetting ) )
        {
          $entityText = $entityWbfsysModuleSetting->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Module Setting {@text@}',
              'wbfsys.module_setting.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysModuleSetting->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Module Setting: {@text@}',
          'wbfsys.module_setting.message',
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
      if( !$listWbfsysModuleSetting = $this->getRegisterd( 'listWbfsysModuleSetting' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysModuleSetting was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysModuleSetting as $entityWbfsysModuleSetting )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysModuleSetting_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysModuleSetting );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Module Setting {@text@}',
                'wbfsys.module_setting.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysModuleSetting ) )
        {
          $entityText = $entityWbfsysModuleSetting->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Module Setting {@text@}',
              'wbfsys.module_setting.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysModuleSetting->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Module Setting: {@text@}',
          'wbfsys.module_setting.message',
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
   * @param WbfsysModuleSetting_Multi_Access_Delete $access
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
      
      $listWbfsysModuleSetting = $orm->getByIds( 'WbfsysModuleSetting', $deleteIds );

      foreach( $listWbfsysModuleSetting as $entityWbfsysModuleSetting )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysModuleSetting_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysModuleSetting );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Module Setting {@text@}',
                'wbfsys.module_setting.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysModuleSetting ) )
        {
          $entityText = $entityWbfsysModuleSetting->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Module Setting {@text@}',
              'wbfsys.module_setting.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysModuleSetting->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Module Setting: {@text@}',
          'wbfsys.module_setting.message',
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

      if( !$params->fieldsWbfsysModuleSetting )
        $params->fieldsWbfsysModuleSetting  = $orm->getCols( 'WbfsysModuleSetting', $params->categories );

      // if the validation fails report
      $listWbfsysModuleSetting = $httpRequest->validateMultiSave
      (
        'WbfsysModuleSetting',
        'wbfsys_module_setting',
        $params->fieldsWbfsysModuleSetting
      );

      $this->register( 'listWbfsysModuleSetting', $listWbfsysModuleSetting );
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

      if( $params->fieldsWbfsysModuleSetting )
      {
        $params->fieldsWbfsysModuleSetting = $orm->getCols
        (
          'WbfsysModuleSetting',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysModuleSetting = $httpRequest->validateMultiInsert
      (
        'WbfsysModuleSetting',
        'wbfsys_module_setting',
        $params->fieldsWbfsysModuleSetting
      );

      $this->register( 'listWbfsysModuleSetting', $listWbfsysModuleSetting );
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

      if( !$params->fieldsWbfsysModuleSetting )
        $params->fieldsWbfsysModuleSetting  = $orm->getCols( 'WbfsysModuleSetting', $params->categories );

      // if the validation fails report
      $listWbfsysModuleSetting = $httpRequest->validateMultiUpdate
      (
        'WbfsysModuleSetting',
        'wbfsys_module_setting',
        $params->fieldsWbfsysModuleSetting
      );

      $this->register( 'listWbfsysModuleSetting', $listWbfsysModuleSetting );
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

}//end class WbfsysModuleSetting_Multi_Model

