

  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_track_session-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_track_session-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_track_session-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_track_session-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_track_session-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_track_session-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_track_session-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_track_session-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_track_session-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionSearchService;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionSearchOs;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionSearchBrowser;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionSearchRefer;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionSearchSession;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-wbfsys_track_session-search-content-meta"
          title="Meta"
          wgt_key="meta" >
   <div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.TrackSession.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionSearchTrackId;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_track_session-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysTrackSessionSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableWbfsysTrackSession; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="application/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
