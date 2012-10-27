  <div id="wgt-tab-form-wbfsys_role_mandant-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_role_mandant_details"
        title="<?php echo $I18N->l('Mandant','wbfsys.role_mandant.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_mandant-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_role_mandant-default" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantResetPwdKey;?>

          <?php echo $ELEMENT->inputWbfsysRoleMandantResetPwdDate;?>

          <?php echo $ELEMENT->inputWbfsysRoleMandantSaltPassword;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantName;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantType;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantIdThemeLayout;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantDefLevel;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantNonCertLogin;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantPassword;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantChangePassword;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantIdThemeIcon;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantDefProfile;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantInactive;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_mandant-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_role_mandant-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_mandant-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_mandant-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
