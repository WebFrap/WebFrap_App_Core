  <div id="wgt-tab-form-wbfsys_security_path-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_security_path_details"
        title="<?php echo $I18N->l('Security Path','wbfsys.security_path.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_path-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_security_path-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityPathMParent;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathIdReference;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathIdGroup;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityPathAccessLevel;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathIdArea;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathIdRoot;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_path-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_security_path-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysSecurityPathDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_path-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_security_path-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityPathMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityPathMUuid;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathMVersion;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityPathMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
