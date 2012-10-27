
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <fieldset class="wgt-space bw61">
<legend>Comment</legend>
          <?php echo $ELEMENT->inputEmbedCommentTitle;?>
          <?php echo $ELEMENT->inputEmbedCommentContent;?>
 </fieldset>
          <?php echo $ELEMENT->inputWbfsysEntityCommentVid;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentIdComment;?>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_comment-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_comment-meta" style="display:none" >
        <div class="left half" >
          <?php echo $ELEMENT->inputEmbedCommentMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedCommentMVersion;?>
          <?php echo $ELEMENT->inputEmbedCommentMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedCommentRowid;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputEmbedCommentMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedCommentMUuid;?>
          <?php echo $ELEMENT->inputEmbedCommentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>


<div class="wgt-clear xxsmall">&nbsp;</div>
