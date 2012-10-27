  <div id="wgt-tab-form-wbfsys_entity_reference-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_reference_details"
        title="<?php echo $I18N->l('Entity Reference','wbfsys.entity_reference.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_reference-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_reference-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityReferenceAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceIdFieldTo;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceIdTo;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityReferenceRevision;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceIdFieldFrom;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceIdFrom;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_reference-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_entity_reference-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysEntityReferenceDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_reference-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_reference-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityReferenceMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityReferenceMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityReferenceMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
