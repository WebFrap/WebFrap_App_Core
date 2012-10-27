  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_entity_comment-simple-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_entity_comment-simple-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_entity_comment-simple-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_entity_comment-simple-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_entity_comment-simple-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_entity_comment-simple-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_entity_comment-simple-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_entity_comment-simple-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_entity_comment-simple-search-content-default"
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
          id="wgt_tab-table-wbfsys_entity_comment-simple-search-content-content"
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
            id="wgt_tab-table-wbfsys_entity_comment-simple-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysEntityComment_SimpleSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

