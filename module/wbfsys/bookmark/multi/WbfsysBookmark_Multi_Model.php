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
class WbfsysBookmark_Multi_Model
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
      if( !$listWbfsysBookmark = $this->getRegisterd( 'listWbfsysBookmark' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysBookmark was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysBookmark as $entityWbfsysBookmark )
      {
        
        if( $entityWbfsysBookmark->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysBookmark_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysBookmark );
            
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
                      'Bookmark', 
                      'wbfsys.bookmark.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysBookmark ) )
          {
            $entityText = $entityWbfsysBookmark->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Bookmark {@text@}',
                'wbfsys.bookmark.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysBookmark->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysBookmark_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysBookmark );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Bookmark {@text@}',
                  'wbfsys.bookmark.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysBookmark ) )
          {
            $entityText = $entityWbfsysBookmark->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Bookmark {@text@}',
                'wbfsys.bookmark.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysBookmark->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Bookmark: {@text@}',
          'wbfsys.bookmark.message',
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
      if( !$listWbfsysBookmark = $this->getRegisterd( 'listWbfsysBookmark' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysBookmark was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysBookmark as $entityWbfsysBookmark )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysBookmark_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysBookmark );
          
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
                    'Bookmark', 
                    'wbfsys.bookmark.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysBookmark ) )
        {
          $entityText = $entityWbfsysBookmark->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Bookmark {@text@}',
              'wbfsys.bookmark.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysBookmark->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Bookmark: {@text@}',
          'wbfsys.bookmark.message',
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
      if( !$listWbfsysBookmark = $this->getRegisterd( 'listWbfsysBookmark' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysBookmark was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysBookmark as $entityWbfsysBookmark )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysBookmark_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysBookmark );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Bookmark {@text@}',
                'wbfsys.bookmark.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysBookmark ) )
        {
          $entityText = $entityWbfsysBookmark->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Bookmark {@text@}',
              'wbfsys.bookmark.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysBookmark->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Bookmark: {@text@}',
          'wbfsys.bookmark.message',
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
   * @param WbfsysBookmark_Multi_Access_Delete $access
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
      
      $listWbfsysBookmark = $orm->getByIds( 'WbfsysBookmark', $deleteIds );

      foreach( $listWbfsysBookmark as $entityWbfsysBookmark )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysBookmark_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysBookmark );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Bookmark {@text@}',
                'wbfsys.bookmark.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysBookmark ) )
        {
          $entityText = $entityWbfsysBookmark->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Bookmark {@text@}',
              'wbfsys.bookmark.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysBookmark->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Bookmark: {@text@}',
          'wbfsys.bookmark.message',
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

      if( !$params->fieldsWbfsysBookmark )
        $params->fieldsWbfsysBookmark  = $orm->getCols( 'WbfsysBookmark', $params->categories );

      // if the validation fails report
      $listWbfsysBookmark = $httpRequest->validateMultiSave
      (
        'WbfsysBookmark',
        'wbfsys_bookmark',
        $params->fieldsWbfsysBookmark
      );

      $this->register( 'listWbfsysBookmark', $listWbfsysBookmark );
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

      if( $params->fieldsWbfsysBookmark )
      {
        $params->fieldsWbfsysBookmark = $orm->getCols
        (
          'WbfsysBookmark',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysBookmark = $httpRequest->validateMultiInsert
      (
        'WbfsysBookmark',
        'wbfsys_bookmark',
        $params->fieldsWbfsysBookmark
      );

      $this->register( 'listWbfsysBookmark', $listWbfsysBookmark );
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

      if( !$params->fieldsWbfsysBookmark )
        $params->fieldsWbfsysBookmark  = $orm->getCols( 'WbfsysBookmark', $params->categories );

      // if the validation fails report
      $listWbfsysBookmark = $httpRequest->validateMultiUpdate
      (
        'WbfsysBookmark',
        'wbfsys_bookmark',
        $params->fieldsWbfsysBookmark
      );

      $this->register( 'listWbfsysBookmark', $listWbfsysBookmark );
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

}//end class WbfsysBookmark_Multi_Model

