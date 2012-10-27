  <div id="wgt-tab-form-wbfsys_tag_reference-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_tag_reference_details"
        title="<?php echo $I18N->l('Tag Reference','wbfsys.tag_reference.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_tag_reference-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_tag_reference-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTagReferenceFlagPersonal;?>
          <?php echo $ELEMENT->inputWbfsysTagReferenceIdTag;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTagReferenceVid;?>
          <?php echo $ELEMENT->inputWbfsysTagReferenceIdEntity;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_tag_reference-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_tag_reference-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTagReferenceMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysTagReferenceMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysTagReferenceRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTagReferenceMUuid;?>
          <?php echo $ELEMENT->inputWbfsysTagReferenceMVersion;?>
          <?php echo $ELEMENT->inputWbfsysTagReferenceMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysTagReferenceMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
