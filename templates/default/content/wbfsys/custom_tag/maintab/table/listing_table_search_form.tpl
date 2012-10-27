  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_custom_tag-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_custom_tag-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_custom_tag-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_custom_tag-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_custom_tag-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_custom_tag-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_custom_tag-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_custom_tag-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_custom_tag-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedTagSearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEmbedTagSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_custom_tag-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysCustomTagSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

