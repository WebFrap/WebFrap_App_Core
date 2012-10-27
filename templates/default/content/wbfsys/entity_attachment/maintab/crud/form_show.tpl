
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Entity Attachment','wbfsys.entity_attachment.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Entity Attachment base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Entity Attachment.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attachment-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_attachment-default" >
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentVid;?>

          <?php echo $ELEMENT->inputWbfsysEntityAttachmentIdEntity;?>

          <?php echo $ELEMENT->inputWbfsysEntityAttachmentIdFile;?>

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
          <span onclick="$S('#wgt-box-wbfsys_entity_attachment-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_entity_attachment-description" >
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
          <span onclick="$S('#wgt-box-wbfsys_entity_attachment-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_attachment-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.EntityAttachment.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputEntityFileMRoleChange;?>
          <?php echo $ELEMENT->inputEntityFileMVersion;?>
          <?php echo $ELEMENT->inputEntityFileMTimeCreated;?>
          <?php echo $ELEMENT->inputEntityFileRowid;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEntityFileMTimeChanged;?>
          <?php echo $ELEMENT->inputEntityFileMUuid;?>
          <?php echo $ELEMENT->inputEntityFileMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
