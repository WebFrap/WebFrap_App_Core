  <div id="wgt-tab-form-wbfsys_comment_rating-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_comment_rating_details"
        title="<?php echo $I18N->l('Comment Rating','wbfsys.comment_rating.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_comment_rating-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_comment_rating-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCommentRatingIdComment;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCommentRatingUglyLevel;?>
          <?php echo $ELEMENT->inputWbfsysCommentRatingIdType;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_comment_rating-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_comment_rating-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCommentRatingMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysCommentRatingMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysCommentRatingRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCommentRatingMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCommentRatingMVersion;?>
          <?php echo $ELEMENT->inputWbfsysCommentRatingMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCommentRatingMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
