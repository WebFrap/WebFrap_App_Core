  <div id="wgt-tab-form-wbfsys_tags_related-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_tags_related_details"
        title="<?php echo $I18N->l('Tags Related','wbfsys.tags_related.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_tags_related-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_tags_related-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTagsRelatedIdTag;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTagsRelatedIdRelated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_tags_related-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_tags_related-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTagsRelatedMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysTagsRelatedMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysTagsRelatedRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTagsRelatedMUuid;?>
          <?php echo $ELEMENT->inputWbfsysTagsRelatedMVersion;?>
          <?php echo $ELEMENT->inputWbfsysTagsRelatedMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysTagsRelatedMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
