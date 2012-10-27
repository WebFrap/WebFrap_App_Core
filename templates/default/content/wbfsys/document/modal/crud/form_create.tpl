  <div id="wgt-tab-form-wbfsys_document-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_document_details"
        title="<?php echo $I18N->l('Document','wbfsys.document.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_document-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_document-default" >
          <?php echo $ELEMENT->inputWbfsysDocumentMimetype;?>

          <?php echo $ELEMENT->inputWbfsysDocumentFileHash;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocumentTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocumentName;?>
          <?php echo $ELEMENT->inputWbfsysDocumentFileSize;?>
          <?php echo $ELEMENT->inputWbfsysDocumentFile;?>
          <?php echo $ELEMENT->inputWbfsysDocumentIdMediathek;?>
          <?php echo $ELEMENT->inputWbfsysDocumentIdConfidentiality;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDocumentAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysDocumentIdLang;?>
          <?php echo $ELEMENT->inputWbfsysDocumentIdLicence;?>
          <?php echo $ELEMENT->inputWbfsysDocumentIdType;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocumentContent;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_document-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_document-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocumentDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_document-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_document-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocumentMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDocumentMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDocumentRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDocumentMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDocumentMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDocumentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDocumentMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
