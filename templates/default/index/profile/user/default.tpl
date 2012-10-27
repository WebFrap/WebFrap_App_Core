
<div id="wbf-body">

<?php echo $VAR->desktopPanel ?>

  <div id="wbf-menu">
    <div id="wbf-menu-panel">
      <span class="close-accordion"  >
      <b>&lt;&lt;</b>
       </span>
    </div>
    <div id="wbf-inner-menu" >
      <?php echo $VAR->desktopNavigation ?>
    </div>
  </div>

  <div id="wbf-content">

    <!-- page -->
    <div  id="wbf-inner-content" >
    <?php echo ($CONTENT?$CONTENT:$this->buildMainContent($TEMPLATE)) ?>
    </div>
    <!-- end page -->

  </div>

  <div id="wbf-footer-history" >
    <table>
      <thead class="ui-widget-header ui-state-active" >
        <th class="footer-status">Status</th>
        <th class="footer_time">Time</th>
        <th class="footer_message">Message</th>
      </thead>
      <tbody class="ui-widget-content" ></tbody>
    </table>
  </div>

  <div id="wbf-footer" class="wcm wcm_mwin_footer" >
    <table id="footer-status"  >
      <tbody>
        <tr>
          <td class="footer-status" ></td>
        </tr>
      </tbody>
    </table>
  </div>

</div>

<?php echo $this->includeTemplate( 'window' , 'index' ) ?>
