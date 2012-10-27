<?php if( $ELEMENT->tableDesktops ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionDesktops.$ELEMENT->tableDesktops->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdDesktops?>" >

     <input
      type="hidden"
      name="search_desktops[id_app]"
      value="<?php echo $VAR->refIdDesktops?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableDesktops?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.App_Ref_Desktops.append<?php echo $ELEMENT->tableDesktops->getAccessPath();?>"
      id="wgt_append_form_wbfsys_app_desktops" >

      <input
        type="hidden" name="wbfsys_desktop[id_app]"
        value="<?php echo $VAR->refIdDesktops?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_app_desktops_<?php echo $VAR->refIdDesktops?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_app_desktops' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
