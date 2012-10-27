
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <fieldset class="wgt-space bw61">
<legend>Comment</legend>
<div class="wgt-space full">
          <?php echo $ELEMENT->inputEmbedCommentTitle;?>
          <?php echo $ELEMENT->inputEmbedCommentContent;?>
 </div>
 </fieldset>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleVid;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleIdComment;?>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_comment-simple-meta-<?php echo $VAR->entityWbfsysEntityComment_Simple; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_comment-simple-meta-<?php echo $VAR->entityWbfsysEntityComment_Simple; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.EntityComment_Simple.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left half" >
          <?php echo $ELEMENT->inputEmbedCommentMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedCommentMVersion;?>
          <?php echo $ELEMENT->inputEmbedCommentMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedCommentRowid;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputEmbedCommentMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedCommentMUuid;?>
          <?php echo $ELEMENT->inputEmbedCommentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>


<div class="wgt-clear xxsmall">&nbsp;</div>
