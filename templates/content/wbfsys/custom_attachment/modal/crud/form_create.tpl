  <div id="wgt-tab-form-wbfsys_custom_attachment-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_custom_attachment_details"
        title="<?php echo $I18N->l('Custom Attachment','wbfsys.custom_attachment.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_attachment-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_custom_attachment-default" >
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentVid;?>

          <?php echo $ELEMENT->inputWbfsysCustomAttachmentIdEntity;?>

          <?php echo $ELEMENT->inputWbfsysCustomAttachmentIdUser;?>

          <?php echo $ELEMENT->inputWbfsysCustomAttachmentIdFile;?>

          <?php echo $ELEMENT->inputEntityFileMaxVersion;?>

          <?php echo $ELEMENT->inputEntityFileIdVisibility;?>

          <?php echo $ELEMENT->inputEntityFileMimetype;?>

          <?php echo $ELEMENT->inputEntityFileFileHash;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputEntityFileAccessKey;?>
          <?php echo $ELEMENT->inputEntityFileFileSize;?>
          <?php echo $ELEMENT->inputEntityFileFlagVersioning;?>
          <?php echo $ELEMENT->inputEntityFileIdLicence;?>
          <?php echo $ELEMENT->inputEntityFileActiv;?>
          <?php echo $ELEMENT->inputEntityFileIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEntityFileIdStorage;?>
          <?php echo $ELEMENT->inputEntityFileIdMediathek;?>
          <?php echo $ELEMENT->inputEntityFileFlagLocal;?>
          <?php echo $ELEMENT->inputEntityFileIdConfidentiality;?>
          <?php echo $ELEMENT->inputEntityFileName;?>
          <?php echo $ELEMENT->inputEntityFileLink;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_attachment-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_custom_attachment-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputEntityFileDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_attachment-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_custom_attachment-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputEntityFileMRoleChange;?>
          <?php echo $ELEMENT->inputEntityFileMVersion;?>
          <?php echo $ELEMENT->inputEntityFileMTimeCreated;?>
          <?php echo $ELEMENT->inputEntityFileRowid;?>
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEntityFileMTimeChanged;?>
          <?php echo $ELEMENT->inputEntityFileMUuid;?>
          <?php echo $ELEMENT->inputEntityFileMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentMVersion;?>
          <?php echo $ELEMENT->inputWbfsysCustomAttachmentMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
