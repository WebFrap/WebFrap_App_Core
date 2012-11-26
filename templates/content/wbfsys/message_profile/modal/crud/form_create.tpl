  <div id="wgt-tab-form-wbfsys_message_profile-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_message_profile_details"
        title="<?php echo $I18N->l('Nachrichten Quelle','wbfsys.message_profile.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_profile-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_message_profile-default" >
          <?php echo $ELEMENT->inputWbfsysMessageProfileSaltPassword;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageProfileUserName;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileName;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfilePassword;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfilePort;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileChangePassword;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageProfileIdType;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileIdVisibility;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileIdUser;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileServer;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_profile-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_message_profile-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMessageProfileDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_profile-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_message_profile-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageProfileMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageProfileMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMessageProfileMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
