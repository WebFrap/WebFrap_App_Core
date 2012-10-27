  <div id="wgt-tab-form-wbfsys_user_setting-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_user_setting_details"
        title="<?php echo $I18N->l('User Setting','wbfsys.user_setting.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_setting-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_user_setting-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingIdMaillocation;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingSieve;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingSmtp;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingIdLanguage;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingIdUser;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingIdTransport;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingImap;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingPop3;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingIdThemeLayout;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingIdThemeIcon;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_setting-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_user_setting-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingMUuid;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingMVersion;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
