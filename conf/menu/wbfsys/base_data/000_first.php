<?php

$this->crumbs = array
(
  array
  (
    'Root',
    $this->interface.'?c=Webfrap.Navigation.explorer',
    'places/desktop.png'
  ),
  array
  (
    'Wbfsys',
    $this->interface.'?c=wbfsys.base.menu',
    'places/module.png'
  ),
  /*
  array
  (
    $this->view->i18n->l('Categories','wbf.label'),
    $this->interface.'?c=wbfsys.base.menu&amp;menu=categories',
    'places/category.png'
  ),
  */
  array
  (
    'Base Data',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=base_data',
    'places/folder.png'
  ),
);

$this->firstEntry = array
(
  'menu_categories_wbfsys_back',
  Wgt::AJAX,
  '..',
  $this->view->i18n->l('Back','wbf.label'),
  $this->interface.'?c=wbfsys.base.menu',
  'places/category.png',
);

// check if the active role has access for Audio
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_audio:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_audio',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Audios',
      'wbfsys.audio.label'
    ),
    $this->view->i18n->l
    (
      'Audios',
      'wbfsys.audio.label'
    ),
    $this->interface.'?c=Wbfsys.Audio.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_audio'
  );

}

// check if the active role has access for Color Model
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_color_model',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Color Models',
      'wbfsys.color_model.label'
    ),
    $this->view->i18n->l
    (
      'Color Models',
      'wbfsys.color_model.label'
    ),
    $this->interface.'?c=Wbfsys.ColorModel.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Content Licence
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_content_licence',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Content Licences',
      'wbfsys.content_licence.label'
    ),
    $this->view->i18n->l
    (
      'Content Licences',
      'wbfsys.content_licence.label'
    ),
    $this->interface.'?c=Wbfsys.ContentLicence.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Domain
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_domain',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Domains',
      'wbfsys.domain.label'
    ),
    $this->view->i18n->l
    (
      'Domains',
      'wbfsys.domain.label'
    ),
    $this->interface.'?c=Wbfsys.Domain.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for file Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_file_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_file_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'file Types',
      'wbfsys.file_type.label'
    ),
    $this->view->i18n->l
    (
      'file Types',
      'wbfsys.file_type.label'
    ),
    $this->interface.'?c=Wbfsys.FileType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_file_type'
  );

}

// check if the active role has access for file storage Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_file_storage_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_file_storage_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'file storage Types',
      'wbfsys.file_storage_type.label'
    ),
    $this->view->i18n->l
    (
      'file storage Types',
      'wbfsys.file_storage_type.label'
    ),
    $this->interface.'?c=Wbfsys.FileStorageType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_file_storage_type'
  );

}

// check if the active role has access for File Storage
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_file_storage',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'File Storages',
      'wbfsys.file_storage.label'
    ),
    $this->view->i18n->l
    (
      'File Storages',
      'wbfsys.file_storage.label'
    ),
    $this->interface.'?c=Wbfsys.FileStorage.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Image
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_image:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_image',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Images',
      'wbfsys.image.label'
    ),
    $this->view->i18n->l
    (
      'Images',
      'wbfsys.image.label'
    ),
    $this->interface.'?c=Wbfsys.Image.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_image'
  );

}

// check if the active role has access for Ipaddress
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_ipaddress',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Ipaddress',
      'wbfsys.ipaddress.label'
    ),
    $this->view->i18n->l
    (
      'Ipaddress',
      'wbfsys.ipaddress.label'
    ),
    $this->interface.'?c=Wbfsys.Ipaddress.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Mediathek
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_mediathek',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Mediatheks',
      'wbfsys.mediathek.label'
    ),
    $this->view->i18n->l
    (
      'Mediatheks',
      'wbfsys.mediathek.label'
    ),
    $this->interface.'?c=Wbfsys.Mediathek.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Network Protocol
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_net_protocol',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Network Protocols',
      'wbfsys.net_protocol.label'
    ),
    $this->view->i18n->l
    (
      'Network Protocols',
      'wbfsys.net_protocol.label'
    ),
    $this->interface.'?c=Wbfsys.NetProtocol.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Text
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_text',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Texts',
      'wbfsys.text.label'
    ),
    $this->view->i18n->l
    (
      'Texts',
      'wbfsys.text.label'
    ),
    $this->interface.'?c=Wbfsys.Text.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Video
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_video:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_video',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Videos',
      'wbfsys.video.label'
    ),
    $this->view->i18n->l
    (
      'Videos',
      'wbfsys.video.label'
    ),
    $this->interface.'?c=Wbfsys.Video.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_video'
  );

}
