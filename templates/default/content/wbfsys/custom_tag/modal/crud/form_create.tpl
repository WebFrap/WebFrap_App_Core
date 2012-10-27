  <div id="wgt-tab-form-wbfsys_custom_tag-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_custom_tag_details"
        title="<?php echo $I18N->l('Custom Tag','wbfsys.custom_tag.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_tag-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_custom_tag-default" >
          <?php echo $ELEMENT->inputWbfsysCustomTagVid;?>

          <?php echo $ELEMENT->inputWbfsysCustomTagIdEntity;?>

          <?php echo $ELEMENT->inputWbfsysCustomTagIdUser;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedTagMParent;?>
          <?php echo $ELEMENT->inputEmbedTagIdLang;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagIdTag;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEmbedTagName;?>
          <?php echo $ELEMENT->inputEmbedTagAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_tag-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_custom_tag-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputEmbedTagDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_tag-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_custom_tag-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedTagMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedTagRowid;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEmbedTagMRoleCreate;?>
          <?php echo $ELEMENT->inputEmbedTagMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagMVersion;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCustomTagMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
