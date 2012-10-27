
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_entity_comment-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_entity_comment-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_entity_comment-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_entity_comment-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_entity_comment-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_entity_comment-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_entity_comment-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_entity_comment-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-selection-wbfsys_entity_comment-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputEmbedCommentSearchTitle;?>
        </div>
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-selection-wbfsys_entity_comment-search-content-content"
          title="Content"
          wgt_key="content" >
           <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputEmbedCommentSearchContent;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-selection-wbfsys_entity_comment-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysEntityCommentSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a Entity Comment press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysEntityComment?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysEntityComment->searchForm}', null, {search:true});
});

JS
); ?>
    
