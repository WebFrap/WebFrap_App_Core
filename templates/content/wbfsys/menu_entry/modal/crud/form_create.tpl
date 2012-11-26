  <div id="wgt-tab-form-wbfsys_menu_entry-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_menu_entry_details"
        title="<?php echo $I18N->l('Menu Entry','wbfsys.menu_entry.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_menu_entry-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_menu_entry-default" >
          <?php echo $ELEMENT->inputWbfsysMenuEntryMimetype;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMenuEntryMParent;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryHttpUrl;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMenuEntryLabel;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryIdMenu;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryIcon;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_menu_entry-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_menu_entry-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMenuEntryDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_menu_entry-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_menu_entry-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMenuEntryMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMenuEntryMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntryMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
