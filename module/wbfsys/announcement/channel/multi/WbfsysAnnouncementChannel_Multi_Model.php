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
class WbfsysAnnouncementChannel_Multi_Model
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
      if( !$listWbfsysAnnouncementChannel = $this->getRegisterd( 'listWbfsysAnnouncementChannel' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAnnouncementChannel was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAnnouncementChannel as $entityWbfsysAnnouncementChannel )
      {
        
        if( $entityWbfsysAnnouncementChannel->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysAnnouncementChannel_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAnnouncementChannel );
            
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
                      'Announcement Channel', 
                      'wbfsys.announcement_channel.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysAnnouncementChannel ) )
          {
            $entityText = $entityWbfsysAnnouncementChannel->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Announcement Channel {@text@}',
                'wbfsys.announcement_channel.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysAnnouncementChannel->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysAnnouncementChannel_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAnnouncementChannel );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Announcement Channel {@text@}',
                  'wbfsys.announcement_channel.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysAnnouncementChannel ) )
          {
            $entityText = $entityWbfsysAnnouncementChannel->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Announcement Channel {@text@}',
                'wbfsys.announcement_channel.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysAnnouncementChannel->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Announcement Channel: {@text@}',
          'wbfsys.announcement_channel.message',
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
      if( !$listWbfsysAnnouncementChannel = $this->getRegisterd( 'listWbfsysAnnouncementChannel' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAnnouncementChannel was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAnnouncementChannel as $entityWbfsysAnnouncementChannel )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysAnnouncementChannel_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAnnouncementChannel );
          
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
                    'Announcement Channel', 
                    'wbfsys.announcement_channel.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysAnnouncementChannel ) )
        {
          $entityText = $entityWbfsysAnnouncementChannel->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Announcement Channel {@text@}',
              'wbfsys.announcement_channel.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysAnnouncementChannel->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Announcement Channel: {@text@}',
          'wbfsys.announcement_channel.message',
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
      if( !$listWbfsysAnnouncementChannel = $this->getRegisterd( 'listWbfsysAnnouncementChannel' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAnnouncementChannel was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAnnouncementChannel as $entityWbfsysAnnouncementChannel )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysAnnouncementChannel_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAnnouncementChannel );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Announcement Channel {@text@}',
                'wbfsys.announcement_channel.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysAnnouncementChannel ) )
        {
          $entityText = $entityWbfsysAnnouncementChannel->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Announcement Channel {@text@}',
              'wbfsys.announcement_channel.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysAnnouncementChannel->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Announcement Channel: {@text@}',
          'wbfsys.announcement_channel.message',
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
   * @param WbfsysAnnouncementChannel_Multi_Access_Delete $access
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
      
      $listWbfsysAnnouncementChannel = $orm->getByIds( 'WbfsysAnnouncementChannel', $deleteIds );

      foreach( $listWbfsysAnnouncementChannel as $entityWbfsysAnnouncementChannel )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysAnnouncementChannel_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAnnouncementChannel );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Announcement Channel {@text@}',
                'wbfsys.announcement_channel.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysAnnouncementChannel ) )
        {
          $entityText = $entityWbfsysAnnouncementChannel->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Announcement Channel {@text@}',
              'wbfsys.announcement_channel.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysAnnouncementChannel->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Announcement Channel: {@text@}',
          'wbfsys.announcement_channel.message',
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

      if( !$params->fieldsWbfsysAnnouncementChannel )
        $params->fieldsWbfsysAnnouncementChannel  = $orm->getCols( 'WbfsysAnnouncementChannel', $params->categories );

      // if the validation fails report
      $listWbfsysAnnouncementChannel = $httpRequest->validateMultiSave
      (
        'WbfsysAnnouncementChannel',
        'wbfsys_announcement_channel',
        $params->fieldsWbfsysAnnouncementChannel
      );

      $this->register( 'listWbfsysAnnouncementChannel', $listWbfsysAnnouncementChannel );
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

      if( $params->fieldsWbfsysAnnouncementChannel )
      {
        $params->fieldsWbfsysAnnouncementChannel = $orm->getCols
        (
          'WbfsysAnnouncementChannel',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysAnnouncementChannel = $httpRequest->validateMultiInsert
      (
        'WbfsysAnnouncementChannel',
        'wbfsys_announcement_channel',
        $params->fieldsWbfsysAnnouncementChannel
      );

      $this->register( 'listWbfsysAnnouncementChannel', $listWbfsysAnnouncementChannel );
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

      if( !$params->fieldsWbfsysAnnouncementChannel )
        $params->fieldsWbfsysAnnouncementChannel  = $orm->getCols( 'WbfsysAnnouncementChannel', $params->categories );

      // if the validation fails report
      $listWbfsysAnnouncementChannel = $httpRequest->validateMultiUpdate
      (
        'WbfsysAnnouncementChannel',
        'wbfsys_announcement_channel',
        $params->fieldsWbfsysAnnouncementChannel
      );

      $this->register( 'listWbfsysAnnouncementChannel', $listWbfsysAnnouncementChannel );
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

}//end class WbfsysAnnouncementChannel_Multi_Model

