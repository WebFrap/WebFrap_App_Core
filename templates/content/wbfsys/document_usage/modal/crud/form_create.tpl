  <div id="wgt-tab-form-wbfsys_document_usage-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_document_usage_details"
        title="<?php echo $I18N->l('Document Usage','wbfsys.document_usage.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_document_usage-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_document_usage-default" >
          <?php echo $ELEMENT->inputWbfsysDocumentUsageVid;?>

          <?php echo $ELEMENT->inputWbfsysDocumentUsageIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocumentUsageIdDocument;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_document_usage-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_document_usage-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocumentUsageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDocumentUsageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDocumentUsageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDocumentUsageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDocumentUsageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDocumentUsageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDocumentUsageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
