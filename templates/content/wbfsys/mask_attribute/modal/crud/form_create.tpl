  <div id="wgt-tab-form-wbfsys_mask_attribute-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_mask_attribute_details"
        title="<?php echo $I18N->l('Mask Attribute','wbfsys.mask_attribute.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask_attribute-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_mask_attribute-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskAttributeIdAttribute;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskAttributeRevision;?>
          <?php echo $ELEMENT->inputWbfsysMaskAttributeIdMask;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask_attribute-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_mask_attribute-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMaskAttributeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask_attribute-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_mask_attribute-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskAttributeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMaskAttributeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMaskAttributeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskAttributeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMaskAttributeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMaskAttributeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMaskAttributeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
