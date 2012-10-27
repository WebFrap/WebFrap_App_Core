
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('Custom Attachment','wbfsys.custom_attachment.label')?></a></h3>
        <div>
                
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<p>Be aware that you first have to create a new Custom Attachment by clicking on "Create"
before you can add references to other data or assign user / roles.</p>



<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
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
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
