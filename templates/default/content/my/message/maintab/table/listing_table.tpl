

  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-my_message-advanced"  style="display:none" >

      <div id="wgt_tab-table-my_message-search" class=""  >
        <div 
        	id="wgt_tab-table-my_message-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-my_message-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-my_message-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-my_message-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-my_message-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-my_message-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-my_message-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputMyMessageSearchTitle;?>
        </div>
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputMyMessageSearchMessage;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-my_message-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputMyMessageSearchMRoleCreate?>
              <?php echo $ELEMENT->inputMyMessageSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputMyMessageSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputMyMessageSearchMRoleChange?>
              <?php echo $ELEMENT->inputMyMessageSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputMyMessageSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputMyMessageSearchMUuid?>
              <?php echo $ELEMENT->inputMyMessageSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableMyMessage; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
