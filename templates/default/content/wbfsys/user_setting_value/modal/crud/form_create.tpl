  <div id="wgt-tab-form-wbfsys_user_setting_value-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_user_setting_value_details"
        title="<?php echo $I18N->l('User Setting','wbfsys.user_setting_value.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_setting_value-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_user_setting_value-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingValueValues;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingValueIdUser;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingValueIdType;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingValueValue;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_setting_value-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_user_setting_value-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingValueMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingValueMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingValueRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserSettingValueMUuid;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingValueMVersion;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingValueMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysUserSettingValueMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
