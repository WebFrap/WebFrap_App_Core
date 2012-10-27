
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Video','wbfsys.video.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Video base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Video.
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
        wgt_src="ajax.php?c=Wbfsys.Video_Ref_Comments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysVideo->getId();
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
          ?>&a_node=mgmt-wbfsys_video-ref-comments" ><?php echo $I18N->l('Comments','wbfsys.video.label.tab_comments')?></a>
    </h3>
    <div>
      
<label>Comments</label>
<p>Here you can assign Comments to the currently selected Video.</p>
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
        wgt_src="ajax.php?c=Wbfsys.Video_Ref_Tags.tab&amp;objid=<?php
            echo $VAR->entityWbfsysVideo->getId();
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
          ?>&a_node=mgmt-wbfsys_video-ref-tags" ><?php echo $I18N->l('Tags','wbfsys.video.label.tab_tags')?></a>
    </h3>
    <div>
      
<label>Tags</label>
<p>Here you can assign Tags to the currently selected Video.</p>
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
          <span onclick="$S('#wgt-box-wbfsys_video-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_video-default" >
          <?php echo $ELEMENT->inputWbfsysVideoMimetype;?>

          <?php echo $ELEMENT->inputWbfsysVideoFileHash;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysVideoTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysVideoFile;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdLang;?>
          <?php echo $ELEMENT->inputWbfsysVideoLength;?>
          <?php echo $ELEMENT->inputWbfsysVideoHeight;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdConfidentiality;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdVideoCodec;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoFlagSound;?>
          <?php echo $ELEMENT->inputWbfsysVideoFileSize;?>
          <?php echo $ELEMENT->inputWbfsysVideoFlagColor;?>
          <?php echo $ELEMENT->inputWbfsysVideoWidth;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdLicence;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdMediathek;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdAudioCodec;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_video-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysVideoDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_video-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Video.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysVideoMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysVideoRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoMUuid;?>
          <?php echo $ELEMENT->inputWbfsysVideoMVersion;?>
          <?php echo $ELEMENT->inputWbfsysVideoMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysVideoMTimeCreated;?>
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
