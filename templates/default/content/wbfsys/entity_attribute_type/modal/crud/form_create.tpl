  <div id="wgt-tab-form-wbfsys_entity_attribute_type-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_attribute_type_details"
        title="<?php echo $I18N->l('entity attribute Type','wbfsys.entity_attribute_type.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attribute_type-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_attribute_type-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attribute_type-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_entity_attribute_type-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attribute_type-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_attribute_type-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeTypeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
