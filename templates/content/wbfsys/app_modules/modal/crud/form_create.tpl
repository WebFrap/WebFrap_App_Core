  <div id="wgt-tab-form-wbfsys_app_modules-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_app_modules_details"
        title="<?php echo $I18N->l('App Modules','wbfsys.app_modules.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_app_modules-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_app_modules-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAppModulesIdApp;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAppModulesIdModule;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_app_modules-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_app_modules-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAppModulesMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAppModulesMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAppModulesRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAppModulesMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAppModulesMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAppModulesMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAppModulesMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
