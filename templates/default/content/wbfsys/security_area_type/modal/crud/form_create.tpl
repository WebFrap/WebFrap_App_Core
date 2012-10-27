  <div id="wgt-tab-form-wbfsys_security_area_type-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_security_area_type_details"
        title="<?php echo $I18N->l('security area Type','wbfsys.security_area_type.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area_type-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_security_area_type-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area_type-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_security_area_type-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area_type-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_security_area_type-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
