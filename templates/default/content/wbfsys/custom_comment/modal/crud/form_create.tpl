  <div id="wgt-tab-form-wbfsys_custom_comment-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_custom_comment_details"
        title="<?php echo $I18N->l('Custom Comment','wbfsys.custom_comment.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_comment-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_custom_comment-default" >
          <?php echo $ELEMENT->inputWbfsysCustomCommentVid;?>

          <?php echo $ELEMENT->inputWbfsysCustomCommentIdEntity;?>

          <?php echo $ELEMENT->inputWbfsysCustomCommentIdUser;?>

          <?php echo $ELEMENT->inputWbfsysCustomCommentIdComment;?>

          <?php echo $ELEMENT->inputEmbedCommentLft;?>

          <?php echo $ELEMENT->inputEmbedCommentVid;?>

          <?php echo $ELEMENT->inputEmbedCommentRgt;?>

          <?php echo $ELEMENT->inputEmbedCommentIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputEmbedCommentTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedCommentMParent;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEmbedCommentIdLang;?>
          <?php echo $ELEMENT->inputEmbedCommentRate;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_comment-content').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Content
        </legend>
        <div id="wgt-box-wbfsys_custom_comment-content" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputEmbedCommentContent;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_comment-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_custom_comment-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedCommentMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedCommentMVersion;?>
          <?php echo $ELEMENT->inputEmbedCommentMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedCommentRowid;?>
          <?php echo $ELEMENT->inputWbfsysCustomCommentMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysCustomCommentMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysCustomCommentRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEmbedCommentMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedCommentMUuid;?>
          <?php echo $ELEMENT->inputEmbedCommentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCustomCommentMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCustomCommentMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCustomCommentMVersion;?>
          <?php echo $ELEMENT->inputWbfsysCustomCommentMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
