
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Image','wbfsys.image.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Image base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Image.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysEntityComment_Entity')
        && Webfrap::classLoadable('WbfsysComment_Entity')
        && $VAR->showTabComments
    ){
    ?>

    <!-- tab: comments in management: WbfsysComment manytomany -->
    <h3>
      <a
        tab="comments"
        wgt_src="ajax.php?c=Wbfsys.Image_Ref_Comments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysImage->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-comments&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_image-ref-comments" ><?php echo $I18N->l('Comments','wbfsys.image.label.tab_comments')?></a>
    </h3>
    <div>
      
<label>Comments</label>
<p>Here you can assign Comments to the currently selected Image.</p>
<p>To do so click on "Append new Comment", search for the designated Comment
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysEntityTag_Entity')
        && Webfrap::classLoadable('WbfsysTag_Entity')
        && $VAR->showTabTags
    ){
    ?>

    <!-- tab: tags in management: WbfsysTag manytomany -->
    <h3>
      <a
        tab="tags"
        wgt_src="ajax.php?c=Wbfsys.Image_Ref_Tags.tab&amp;objid=<?php
            echo $VAR->entityWbfsysImage->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-tags&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_image-ref-tags" ><?php echo $I18N->l('Tags','wbfsys.image.label.tab_tags')?></a>
    </h3>
    <div>
      
<label>Tags</label>
<p>Here you can assign Tags to the currently selected Image.</p>
<p>To do so click on "Append new Tag", search for the designated Tag
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_image-default" >
          <?php echo $ELEMENT->inputWbfsysImageMimetype;?>

          <?php echo $ELEMENT->inputWbfsysImageFileHash;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysImageTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysImageAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysImageIdFormat;?>
          <?php echo $ELEMENT->inputWbfsysImageFlagColor;?>
          <?php echo $ELEMENT->inputWbfsysImageHeight;?>
          <?php echo $ELEMENT->inputWbfsysImageIdLicence;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysImageFile;?>
          <?php echo $ELEMENT->inputWbfsysImageFileSize;?>
          <?php echo $ELEMENT->inputWbfsysImageWidth;?>
          <?php echo $ELEMENT->inputWbfsysImageIdConfidentiality;?>
          <?php echo $ELEMENT->inputWbfsysImageColorModel;?>
          <?php echo $ELEMENT->inputWbfsysImageIdMediathek;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_image-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysImageDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_image-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Image.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysImageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysImageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysImageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysImageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysImageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysImageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysImageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-comments" ></div>

      <div class="container" id="<?php echo $this->id?>-content-tags" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
