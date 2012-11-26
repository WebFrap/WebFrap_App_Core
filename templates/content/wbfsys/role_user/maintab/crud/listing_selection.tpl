  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" ></form>
    
  <div class="wgt-box info" >
  Found more than one System User, please select one of the System Users to continue
  </div>
    
  <?php echo $ELEMENT->selectionWbfsysRoleUser; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>

<script type="application/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
