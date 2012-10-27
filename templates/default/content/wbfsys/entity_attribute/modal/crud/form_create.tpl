  <div id="wgt-tab-form-wbfsys_entity_attribute-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_attribute_details"
        title="<?php echo $I18N->l('Entity Attribute','wbfsys.entity_attribute.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attribute-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_attribute-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeName;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeIdCategory;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeRevision;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeIdEntity;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attribute-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_entity_attribute-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attribute-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_attribute-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
