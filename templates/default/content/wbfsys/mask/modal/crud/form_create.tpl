  <div id="wgt-tab-form-wbfsys_mask-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_mask_details"
        title="<?php echo $I18N->l('Mask','wbfsys.mask.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_mask-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskName;?>
          <?php echo $ELEMENT->inputWbfsysMaskRevision;?>
          <?php echo $ELEMENT->inputWbfsysMaskContext;?>
          <?php echo $ELEMENT->inputWbfsysMaskDsetMask;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysMaskIdManagement;?>
          <?php echo $ELEMENT->inputWbfsysMaskIdModule;?>
          <?php echo $ELEMENT->inputWbfsysMaskAccessUrl;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_mask-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMaskDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mask-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_mask-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMaskMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMaskRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMaskMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMaskMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMaskMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMaskMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
