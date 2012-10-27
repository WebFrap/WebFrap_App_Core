
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Entity Comment','wbfsys.entity_comment.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Entity Comment base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Entity Comment.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_comment-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_comment-default" >
          <?php echo $ELEMENT->inputWbfsysEntityCommentVid;?>

          <?php echo $ELEMENT->inputWbfsysEntityCommentIdEntity;?>

          <?php echo $ELEMENT->inputWbfsysEntityCommentIdComment;?>

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
          <span onclick="$S('#wgt-box-wbfsys_entity_comment-content').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Content
        </legend>
        <div id="wgt-box-wbfsys_entity_comment-content" >
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
          <span onclick="$S('#wgt-box-wbfsys_entity_comment-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_comment-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.EntityComment.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedCommentMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedCommentMVersion;?>
          <?php echo $ELEMENT->inputEmbedCommentMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedCommentRowid;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityCommentRowid;?>
        </div>
        <div class="inline bw3" >
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

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
