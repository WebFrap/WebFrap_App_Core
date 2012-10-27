  <div id="wgt-tab-form-wbfsys_track_session-create" class="wcm wcm_ui_tab" >
    <div class="wgt_tab_body" >

    <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
    <form
      method="post"
      accept-charset="utf-8"
      class="<?php echo $VAR->formClass?>"
      id="<?php echo $VAR->formId?>"
      action="<?php echo $VAR->formAction?>" ></form>

      <!-- Tab Details -->
      <div  
        id="<?php echo $this->id?>_tab_wbfsys_track_session_details"
        title="<?php echo $I18N->l('Track Session','wbfsys.track_session.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_track_session-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_track_session-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionOsVersion;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionIdPerson;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionIdSession;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionOs;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionSession;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionRefer;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionService;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionBrowser;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionBrowserVersion;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_track_session-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_track_session-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionTrackId;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
