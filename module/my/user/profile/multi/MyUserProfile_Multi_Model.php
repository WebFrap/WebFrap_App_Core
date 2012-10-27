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
class MyUserProfile_Multi_Model
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
      if( !$listMyUserProfile = $this->getRegisterd( 'listMyUserProfile' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMyUserProfile was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listMyUserProfile as $entityMyUserProfile )
      {
        
        if( $entityMyUserProfile->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new MyUserProfile_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityMyUserProfile );
            
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
                      'My Profile', 
                      'my.user_profile.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityMyUserProfile ) )
          {
            $entityText = $entityMyUserProfile->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create My Profile {@text@}',
                'my.user_profile.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityMyUserProfile->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new MyUserProfile_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityMyUserProfile );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update My Profile {@text@}',
                  'my.user_profile.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityMyUserProfile ) )
          {
            $entityText = $entityMyUserProfile->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save My Profile {@text@}',
                'my.user_profile.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityMyUserProfile->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved My Profile: {@text@}',
          'my.user_profile.message',
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
      if( !$listMyUserProfile = $this->getRegisterd( 'listMyUserProfile' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMyUserProfile was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listMyUserProfile as $entityMyUserProfile )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new MyUserProfile_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityMyUserProfile );
          
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
                    'My Profile', 
                    'my.user_profile.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityMyUserProfile ) )
        {
          $entityText = $entityMyUserProfile->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create My Profile {@text@}',
              'my.user_profile.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityMyUserProfile->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created My Profile: {@text@}',
          'my.user_profile.message',
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
      if( !$listMyUserProfile = $this->getRegisterd( 'listMyUserProfile' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMyUserProfile was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listMyUserProfile as $entityMyUserProfile )
      {
        if( !$access->update )
        {
          $accessDataset = new MyUserProfile_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityMyUserProfile );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update My Profile {@text@}',
                'my.user_profile.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityMyUserProfile ) )
        {
          $entityText = $entityMyUserProfile->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update My Profile {@text@}',
              'my.user_profile.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityMyUserProfile->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated My Profile: {@text@}',
          'my.user_profile.message',
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
   * @param MyUserProfile_Multi_Access_Delete $access
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
      
      $listMyUserProfile = $orm->getByIds( 'MyUserProfile', $deleteIds );

      foreach( $listMyUserProfile as $entityMyUserProfile )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new MyUserProfile_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityMyUserProfile );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete My Profile {@text@}',
                'my.user_profile.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityMyUserProfile ) )
        {
          $entityText = $entityMyUserProfile->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete My Profile {@text@}',
              'my.user_profile.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityMyUserProfile->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted My Profile: {@text@}',
          'my.user_profile.message',
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

      if( !$params->fieldsMyUserProfile )
        $params->fieldsMyUserProfile  = $orm->getCols( 'WbfsysRoleUser', $params->categories );

      // if the validation fails report
      $listMyUserProfile = $httpRequest->validateMultiSave
      (
        'WbfsysRoleUser',
        'my_user_profile',
        $params->fieldsMyUserProfile
      );

      $this->register( 'listMyUserProfile', $listMyUserProfile );
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

      if( $params->fieldsMyUserProfile )
      {
        $params->fieldsMyUserProfile = $orm->getCols
        (
          'WbfsysRoleUser',
          $params->categories
        );
      }

      // if the validation fails report
      $listMyUserProfile = $httpRequest->validateMultiInsert
      (
        'WbfsysRoleUser',
        'my_user_profile',
        $params->fieldsMyUserProfile
      );

      $this->register( 'listMyUserProfile', $listMyUserProfile );
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

      if( !$params->fieldsMyUserProfile )
        $params->fieldsMyUserProfile  = $orm->getCols( 'WbfsysRoleUser', $params->categories );

      // if the validation fails report
      $listMyUserProfile = $httpRequest->validateMultiUpdate
      (
        'WbfsysRoleUser',
        'my_user_profile',
        $params->fieldsMyUserProfile
      );

      $this->register( 'listMyUserProfile', $listMyUserProfile );
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

}//end class MyUserProfile_Multi_Model

