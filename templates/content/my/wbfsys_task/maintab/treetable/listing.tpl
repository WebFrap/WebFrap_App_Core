
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-treetable-my_wbfsys_task-advanced"  style="display:none" >

      <div id="wgt_tab-treetable-my_wbfsys_task-search" class=""  >
        <div 
        	id="wgt_tab-treetable-my_wbfsys_task-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-treetable-my_wbfsys_task-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-treetable-my_wbfsys_task-search-overflow-cruddropbox" >
            <ul id="wgt_tab-treetable-my_wbfsys_task-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-treetable-my_wbfsys_task-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-treetable-my_wbfsys_task-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-treetable-my_wbfsys_task-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputMyWbfsysTaskSearchTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputMyWbfsysTaskSearchHttpUrl;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputMyWbfsysTaskSearchIdType;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-treetable-my_wbfsys_task-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMRoleCreate?>
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMRoleChange?>
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMUuid?>
              <?php echo $ELEMENT->inputMyWbfsysTaskSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->treetableMyWbfsysTask; ?>

  <div class="wgt-clear xxsmall">&nbsp;</div>

<script type="application/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
