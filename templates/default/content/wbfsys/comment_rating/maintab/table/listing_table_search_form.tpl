  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_comment_rating-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_comment_rating-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_comment_rating-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_comment_rating-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_comment_rating-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_comment_rating-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_comment_rating-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_comment_rating-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_comment_rating-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCommentRatingSearchIdType;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_comment_rating-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysCommentRatingSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

