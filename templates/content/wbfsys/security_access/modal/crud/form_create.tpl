  <div id="wgt-tab-form-wbfsys_security_access-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_security_access_details"
        title="<?php echo $I18N->l('Access','wbfsys.security_access.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_access-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_security_access-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessRefAccessLevel;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessIdGroup;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessDateStart;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessPartial;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessAccessLevel;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessIdArea;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessDateEnd;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_access-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_security_access-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_access-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_security_access-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMUuid;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMVersion;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
