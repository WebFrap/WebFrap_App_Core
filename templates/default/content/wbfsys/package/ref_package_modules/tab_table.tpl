  <?php if( $ELEMENT->tablePackageModules ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionPackageModules.$ELEMENT->tablePackageModules->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdPackageModules?>" >

       <input
        type="hidden"
        name="search_wbfsys_package_modules[id_package]"
        value="<?php echo $VAR->refIdPackageModules?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tablePackageModules ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdPackageModules?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.Package_Ref_PackageModules.connect<?php echo $ELEMENT->tablePackageModules->getJsAccessPath();?>',{
            'wbfsys_package_modules[id_package]':'<?php echo $VAR->refIdPackageModules?>',
            'wbfsys_package_modules[id_module]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>