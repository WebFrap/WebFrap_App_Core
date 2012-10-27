<div id="wgt-maintab" class="wcm wcm_ui_tab"  >

  <div id="wgt-maintab-body" class="wgt_tab_body"  >

    <div id="wgt-ui-desktop" class="wgt_tab wgt-maintab" title="Desktop" >
    
			<h1 class="wgt-dashboard-header"  ><?php echo Conf::status('default.title'); ?>  | Profile: <?php echo $this->getUser()->getProfileLabel(); ?></h1>

      <table cellpadding="0" cellspacing="0" style="width:100%;" >
        <tr>
          <td style="width:790px;" valign="top" >
          	
            <?php if( WBF_SHOW_MOCKUP ){ ?>
              <div class="wgt-space full" >
              
                <?php echo $ELEMENT->searchBox ?>
        
              </div>
            <?php } ?>
            
            <div class="wgt-space full" >
              
              <div class="wgt-content_box wgt-widget inline wgt-space" >
                <div class="_wcm _wcm_ui_toggle_controls head" >
                  <h2>Quick Links</h2>                  
                  <div class="right" >
                    <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-gear" ></span></button>
                    <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-help" ></span></button>
                  </div>
                </div>
                <div class="content" ><?php echo $ELEMENT->listQuicklinks ?></div>
              </div>
              
              <div class="wgt-content_box wgt-widget inline wgt-space" >
                <div class="_wcm _wcm_ui_toggle_controls head" >
                  <h2>Last visited</h2>                  
                  <div class="right" >
                    <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-gear" ></span></button>
                    <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-help" ></span></button>
                  </div>
                </div>
                <div class="content" ><?php echo $ELEMENT->lastVisited ?></div>
              </div>
              
              <div class="wgt-content_box wgt-widget inline wgt-space" >
                <div class="_wcm _wcm_ui_toggle_controls head" >
                  <h2>Bookmarks</h2>                  
                  <div class="right" >
                    <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-gear" ></span></button>
                    <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-help" ></span></button>
                  </div>
                </div>
                <div class="content" ><?php echo $ELEMENT->listBookmarks ?></div>
              </div>
            </div>
              
            <div class="wgt-content_box wgt-widget inline wgt-space" >
              <div class="_wcm _wcm_ui_toggle_controls head" >
                <h2>Most visited</h2>                  
                <div class="right" >
                  <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-gear" ></span></button>
                  <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-help" ></span></button>
                </div>
              </div>
              <div class="content" ><?php echo $ELEMENT->mostVisited ?></div>
            </div>
            
          </td>
          <td valign="top" width="*" style="padding-right:10px;" >
            <div class="left wgt-news-box wgt-space"  >
              <div class="_wcm _wcm_ui_toggle_controls head" >
                <h2>News</h2>                  
                <div class="right" >
                  <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-gear" ></span></button>
                  <button class="wgt-button controls hidden" ><span class="ui-icon ui-icon-help" ></span></button>
                </div>
              </div>
              <div class="content"  >
                <?php echo $ELEMENT->news ?>
              </div>
            </div>
          </td>
        <tr>
      </table>

    </div>
    
  </div>
  
</div>
