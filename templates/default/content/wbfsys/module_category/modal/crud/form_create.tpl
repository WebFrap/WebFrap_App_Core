  <div id="wgt-tab-form-wbfsys_module_category-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_module_category_details"
        title="<?php echo $I18N->l('Module Category','wbfsys.module_category.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_module_category-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_module_category-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleCategoryName;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryRevision;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryIdSecurityArea;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleCategoryAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryIdModule;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_module_category-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_module_category-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysModuleCategoryDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_module_category-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_module_category-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleCategoryMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleCategoryMUuid;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryMVersion;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysModuleCategoryMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
