  <div id="wgt-tab-form-wbfsys_user_profile-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_user_profile_details"
        title="<?php echo $I18N->l('User Profile','wbfsys.user_profile.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_profile-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_user_profile-default" >
          <?php echo $ELEMENT->inputWbfsysUserProfileVid;?>

          <?php echo $ELEMENT->inputWbfsysUserProfileIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserProfileKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserProfileIdUser;?>
          <?php echo $ELEMENT->inputWbfsysUserProfileIdProfile;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_profile-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_user_profile-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysUserProfileDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_profile-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_user_profile-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserProfileMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysUserProfileMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysUserProfileRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserProfileMUuid;?>
          <?php echo $ELEMENT->inputWbfsysUserProfileMVersion;?>
          <?php echo $ELEMENT->inputWbfsysUserProfileMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysUserProfileMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
