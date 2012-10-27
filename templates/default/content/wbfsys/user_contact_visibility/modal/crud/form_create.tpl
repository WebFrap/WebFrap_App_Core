  <div id="wgt-tab-form-wbfsys_user_contact_visibility-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_user_contact_visibility_details"
        title="<?php echo $I18N->l('message profile visibility','wbfsys.user_contact_visibility.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_contact_visibility-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_user_contact_visibility-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityName;?>
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_contact_visibility-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_user_contact_visibility-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_contact_visibility-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_user_contact_visibility-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityMOrder;?>
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityMUuid;?>
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityMVersion;?>
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysUserContactVisibilityRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
