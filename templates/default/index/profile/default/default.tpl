
<div id="wbf-body">

<?php echo $VAR->desktopPanel ?>

  <div id="wbf-content" >

    <?php echo ($CONTENT?$CONTENT:$this->buildMainContent($TEMPLATE)) ?>

  </div>

  <div id="wbf-footer" >
    <div id="wbf-maintab_bar"  >
      <div id="wgt-maintab-head" ></div>
    </div>
  </div>
  
</div>

<?php echo $this->includeTemplate( 'window' , 'index' ) ?>
