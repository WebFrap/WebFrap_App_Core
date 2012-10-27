  <div id="wgt-tab-form-wbfsys_management-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_management_details"
        title="<?php echo $I18N->l('Management Node','wbfsys.management.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_management-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_management-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementName;?>
          <?php echo $ELEMENT->inputWbfsysManagementIdSecurityArea;?>
          <?php echo $ELEMENT->inputWbfsysManagementIdModule;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysManagementRevision;?>
          <?php echo $ELEMENT->inputWbfsysManagementIdEntity;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_management-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_management-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysManagementDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_management-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_management-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysManagementMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysManagementRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementMUuid;?>
          <?php echo $ELEMENT->inputWbfsysManagementMVersion;?>
          <?php echo $ELEMENT->inputWbfsysManagementMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysManagementMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
