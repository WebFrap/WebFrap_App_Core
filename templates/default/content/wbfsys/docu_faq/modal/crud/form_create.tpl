  <div id="wgt-tab-form-wbfsys_docu_faq-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_docu_faq_details"
        title="<?php echo $I18N->l('FAQ','wbfsys.docu_faq.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_docu_faq-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_docu_faq-default" >
          <?php echo $ELEMENT->inputWbfsysDocuFaqVid;?>

          <?php echo $ELEMENT->inputWbfsysDocuFaqIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocuFaqQuestion;?>
        </div>
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_docu_faq-content').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Content
        </legend>
        <div id="wgt-box-wbfsys_docu_faq-content" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocuFaqAnswer;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_docu_faq-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_docu_faq-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuFaqMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDocuFaqMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDocuFaqRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuFaqMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDocuFaqMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDocuFaqMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDocuFaqMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
