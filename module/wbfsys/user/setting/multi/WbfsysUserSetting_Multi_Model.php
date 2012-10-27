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
class WbfsysUserSetting_Multi_Model
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
      if( !$listWbfsysUserSetting = $this->getRegisterd( 'listWbfsysUserSetting' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysUserSetting was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysUserSetting as $entityWbfsysUserSetting )
      {
        
        if( $entityWbfsysUserSetting->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysUserSetting_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysUserSetting );
            
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
                      'User Setting', 
                      'wbfsys.user_setting.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysUserSetting ) )
          {
            $entityText = $entityWbfsysUserSetting->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create User Setting {@text@}',
                'wbfsys.user_setting.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysUserSetting->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysUserSetting_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysUserSetting );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update User Setting {@text@}',
                  'wbfsys.user_setting.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysUserSetting ) )
          {
            $entityText = $entityWbfsysUserSetting->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save User Setting {@text@}',
                'wbfsys.user_setting.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysUserSetting->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved User Setting: {@text@}',
          'wbfsys.user_setting.message',
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
      if( !$listWbfsysUserSetting = $this->getRegisterd( 'listWbfsysUserSetting' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysUserSetting was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysUserSetting as $entityWbfsysUserSetting )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysUserSetting_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysUserSetting );
          
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
                    'User Setting', 
                    'wbfsys.user_setting.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysUserSetting ) )
        {
          $entityText = $entityWbfsysUserSetting->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create User Setting {@text@}',
              'wbfsys.user_setting.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysUserSetting->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created User Setting: {@text@}',
          'wbfsys.user_setting.message',
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
      if( !$listWbfsysUserSetting = $this->getRegisterd( 'listWbfsysUserSetting' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysUserSetting was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysUserSetting as $entityWbfsysUserSetting )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysUserSetting_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysUserSetting );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update User Setting {@text@}',
                'wbfsys.user_setting.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysUserSetting ) )
        {
          $entityText = $entityWbfsysUserSetting->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update User Setting {@text@}',
              'wbfsys.user_setting.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysUserSetting->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated User Setting: {@text@}',
          'wbfsys.user_setting.message',
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
   * @param WbfsysUserSetting_Multi_Access_Delete $access
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
      
      $listWbfsysUserSetting = $orm->getByIds( 'WbfsysUserSetting', $deleteIds );

      foreach( $listWbfsysUserSetting as $entityWbfsysUserSetting )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysUserSetting_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysUserSetting );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete User Setting {@text@}',
                'wbfsys.user_setting.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysUserSetting ) )
        {
          $entityText = $entityWbfsysUserSetting->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete User Setting {@text@}',
              'wbfsys.user_setting.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysUserSetting->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted User Setting: {@text@}',
          'wbfsys.user_setting.message',
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

      if( !$params->fieldsWbfsysUserSetting )
        $params->fieldsWbfsysUserSetting  = $orm->getCols( 'WbfsysUserSetting', $params->categories );

      // if the validation fails report
      $listWbfsysUserSetting = $httpRequest->validateMultiSave
      (
        'WbfsysUserSetting',
        'wbfsys_user_setting',
        $params->fieldsWbfsysUserSetting
      );

      $this->register( 'listWbfsysUserSetting', $listWbfsysUserSetting );
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

      if( $params->fieldsWbfsysUserSetting )
      {
        $params->fieldsWbfsysUserSetting = $orm->getCols
        (
          'WbfsysUserSetting',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysUserSetting = $httpRequest->validateMultiInsert
      (
        'WbfsysUserSetting',
        'wbfsys_user_setting',
        $params->fieldsWbfsysUserSetting
      );

      $this->register( 'listWbfsysUserSetting', $listWbfsysUserSetting );
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

      if( !$params->fieldsWbfsysUserSetting )
        $params->fieldsWbfsysUserSetting  = $orm->getCols( 'WbfsysUserSetting', $params->categories );

      // if the validation fails report
      $listWbfsysUserSetting = $httpRequest->validateMultiUpdate
      (
        'WbfsysUserSetting',
        'wbfsys_user_setting',
        $params->fieldsWbfsysUserSetting
      );

      $this->register( 'listWbfsysUserSetting', $listWbfsysUserSetting );
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

}//end class WbfsysUserSetting_Multi_Model

