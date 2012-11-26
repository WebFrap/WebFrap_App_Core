<?php if( $ELEMENT->tableQuicklinks ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionQuicklinks.$ELEMENT->tableQuicklinks->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdQuicklinks?>" >

     <input
      type="hidden"
      name="search_quicklinks[id_profile]"
      value="<?php echo $VAR->refIdQuicklinks?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableQuicklinks?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Profile_Ref_Quicklinks.append<?php echo $ELEMENT->tableQuicklinks->getAccessPath();?>"
      id="wgt_append_form_wbfsys_profile_quicklinks" >

      <input
        type="hidden" name="wbfsys_profile_quicklink[id_profile]"
        value="<?php echo $VAR->refIdQuicklinks?>" />

    </form>

    <script type="application/javascript" >
      function append_wbfsys_profile_quicklinks_<?php echo $VAR->refIdQuicklinks?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_profile_quicklinks' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
