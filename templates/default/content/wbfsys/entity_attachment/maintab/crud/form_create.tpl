
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <fieldset class="wgt-space bw61">
<legend>File</legend>
          <?php echo $ELEMENT->inputEntityFileName;?>
          <?php echo $ELEMENT->inputEntityFileLink;?>
          <?php echo $ELEMENT->inputEntityFileIdType;?>
 </fieldset>
<fieldset class="wgt-space bw61">
<legend>Description</legend>
          <?php echo $ELEMENT->inputEntityFileDescription;?>
 </fieldset>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentVid;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentIdFile;?>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_attachment-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_attachment-meta" style="display:none" >
        <div class="left half" >
          <?php echo $ELEMENT->inputEntityFileMRoleChange;?>
          <?php echo $ELEMENT->inputEntityFileMVersion;?>
          <?php echo $ELEMENT->inputEntityFileMTimeCreated;?>
          <?php echo $ELEMENT->inputEntityFileRowid;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttachmentRowid;?>
        </div>
        <div class="inline half" >
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


<div class="wgt-clear xxsmall">&nbsp;</div>
