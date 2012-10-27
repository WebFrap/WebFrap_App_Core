  <div id="wgt-tab-form-wbfsys_mask_form_settings-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_mask_form_settings_details"
        title="<?php echo $I18N->l('Mask Form Settings','wbfsys.mask_form_settings.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask_form_settings-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_mask_form_settings-default" >
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsRevision;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsReferenceSettings;?>
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsColSettings;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask_form_settings-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_mask_form_settings-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask_form_settings-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_mask_form_settings-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMaskFormSettingsMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
