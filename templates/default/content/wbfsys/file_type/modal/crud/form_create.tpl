  <div id="wgt-tab-form-wbfsys_file_type-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_file_type_details"
        title="<?php echo $I18N->l('file Type','wbfsys.file_type.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_type-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_file_type-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysFileTypeName;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeIdMgmt;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeEnding;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysFileTypeAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeFlagGlobal;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeMimetype;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_type-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_file_type-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysFileTypeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_type-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_file_type-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysFileTypeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysFileTypeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysFileTypeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
