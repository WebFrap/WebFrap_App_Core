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
    'Master Data',
    $this->interface.'?c=wbfsys.base.menu&amp;menu=master_data',
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

// check if the active role has access for calendar Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_calendar_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_calendar_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'calendar Types',
      'wbfsys.calendar_type.label'
    ),
    $this->view->i18n->l
    (
      'calendar Types',
      'wbfsys.calendar_type.label'
    ),
    $this->interface.'?c=Wbfsys.CalendarType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_calendar_type'
  );

}

// check if the active role has access for Holiday
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_calendar_holiday',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Holidays',
      'wbfsys.calendar_holiday.label'
    ),
    $this->view->i18n->l
    (
      'Holidays',
      'wbfsys.calendar_holiday.label'
    ),
    $this->interface.'?c=Wbfsys.CalendarHoliday.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for audio codec
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_audio_codec:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_audio_codec',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'audio codecs',
      'wbfsys.audio_codec.label'
    ),
    $this->view->i18n->l
    (
      'audio codecs',
      'wbfsys.audio_codec.label'
    ),
    $this->interface.'?c=Wbfsys.AudioCodec.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_audio_codec'
  );

}

// check if the active role has access for Browser
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_browser',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Browsers',
      'wbfsys.browser.label'
    ),
    $this->view->i18n->l
    (
      'Browsers',
      'wbfsys.browser.label'
    ),
    $this->interface.'?c=Wbfsys.Browser.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for comment rating Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_comment_rating_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_comment_rating_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'comment rating Types',
      'wbfsys.comment_rating_type.label'
    ),
    $this->view->i18n->l
    (
      'comment rating Types',
      'wbfsys.comment_rating_type.label'
    ),
    $this->interface.'?c=Wbfsys.CommentRatingType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_comment_rating_type'
  );

}

// check if the active role has access for document Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_document_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_document_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'document Types',
      'wbfsys.document_type.label'
    ),
    $this->view->i18n->l
    (
      'document Types',
      'wbfsys.document_type.label'
    ),
    $this->interface.'?c=Wbfsys.DocumentType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_document_type'
  );

}

// check if the active role has access for image format
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_image_format:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_image_format',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'image formats',
      'wbfsys.image_format.label'
    ),
    $this->view->i18n->l
    (
      'image formats',
      'wbfsys.image_format.label'
    ),
    $this->interface.'?c=Wbfsys.ImageFormat.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_image_format'
  );

}

// check if the active role has access for Operating System
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_os',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Operating Systems',
      'wbfsys.os.label'
    ),
    $this->view->i18n->l
    (
      'Operating Systems',
      'wbfsys.os.label'
    ),
    $this->interface.'?c=Wbfsys.Os.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for video video codec
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_video_codec:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_video_codec',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'video video codecs',
      'wbfsys.video_codec.label'
    ),
    $this->view->i18n->l
    (
      'video video codecs',
      'wbfsys.video_codec.label'
    ),
    $this->interface.'?c=Wbfsys.VideoCodec.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_video_codec'
  );

}

// check if the active role has access for announcement Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_announcement_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_announcement_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'announcement Types',
      'wbfsys.announcement_type.label'
    ),
    $this->view->i18n->l
    (
      'announcement Types',
      'wbfsys.announcement_type.label'
    ),
    $this->interface.'?c=Wbfsys.AnnouncementType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_announcement_type'
  );

}

// check if the active role has access for task Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_task_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_task_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'task Types',
      'wbfsys.task_type.label'
    ),
    $this->view->i18n->l
    (
      'task Types',
      'wbfsys.task_type.label'
    ),
    $this->interface.'?c=Wbfsys.TaskType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_task_type'
  );

}

// check if the active role has access for issue Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_issue_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_issue_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'issue Types',
      'wbfsys.issue_type.label'
    ),
    $this->view->i18n->l
    (
      'issue Types',
      'wbfsys.issue_type.label'
    ),
    $this->interface.'?c=Wbfsys.IssueType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_issue_type'
  );

}

// check if the active role has access for issue category
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_category:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_category',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'issue categorys',
      'wbfsys.category.label'
    ),
    $this->view->i18n->l
    (
      'issue categorys',
      'wbfsys.category.label'
    ),
    $this->interface.'?c=Wbfsys.Category.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_category'
  );

}

// check if the active role has access for issue severity
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_issue_severity:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_issue_severity',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'issue severitys',
      'wbfsys.issue_severity.label'
    ),
    $this->view->i18n->l
    (
      'issue severitys',
      'wbfsys.issue_severity.label'
    ),
    $this->interface.'?c=Wbfsys.IssueSeverity.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_issue_severity'
  );

}

// check if the active role has access for issue priority
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_priority:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_priority',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'issue prioritys',
      'wbfsys.priority.label'
    ),
    $this->view->i18n->l
    (
      'issue prioritys',
      'wbfsys.priority.label'
    ),
    $this->interface.'?c=Wbfsys.Priority.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_priority'
  );

}

// check if the active role has access for message addressee Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message_addressee_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_message_addressee_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'message addressee Types',
      'wbfsys.message_addressee_type.label'
    ),
    $this->view->i18n->l
    (
      'message addressee Types',
      'wbfsys.message_addressee_type.label'
    ),
    $this->interface.'?c=Wbfsys.MessageAddresseeType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_message_addressee_type'
  );

}

// check if the active role has access for message channel Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message_channel_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_message_channel_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'message channel Types',
      'wbfsys.message_channel_type.label'
    ),
    $this->view->i18n->l
    (
      'message channel Types',
      'wbfsys.message_channel_type.label'
    ),
    $this->interface.'?c=Wbfsys.MessageChannelType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_message_channel_type'
  );

}

// check if the active role has access for message profile Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message_profile_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_message_profile_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'message profile Types',
      'wbfsys.message_profile_type.label'
    ),
    $this->view->i18n->l
    (
      'message profile Types',
      'wbfsys.message_profile_type.label'
    ),
    $this->interface.'?c=Wbfsys.MessageProfileType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_message_profile_type'
  );

}

// check if the active role has access for process step Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_process_step_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_process_step_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'process step Types',
      'wbfsys.process_step_type.label'
    ),
    $this->view->i18n->l
    (
      'process step Types',
      'wbfsys.process_step_type.label'
    ),
    $this->interface.'?c=Wbfsys.ProcessStepType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_process_step_type'
  );

}

// check if the active role has access for security area Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_security_area_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_security_area_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'security area Types',
      'wbfsys.security_area_type.label'
    ),
    $this->view->i18n->l
    (
      'security area Types',
      'wbfsys.security_area_type.label'
    ),
    $this->interface.'?c=Wbfsys.SecurityAreaType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_security_area_type'
  );

}

// check if the active role has access for entity attribute Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_entity_attribute_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_entity_attribute_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'entity attribute Types',
      'wbfsys.entity_attribute_type.label'
    ),
    $this->view->i18n->l
    (
      'entity attribute Types',
      'wbfsys.entity_attribute_type.label'
    ),
    $this->interface.'?c=Wbfsys.EntityAttributeType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_entity_attribute_type'
  );

}

// check if the active role has access for package Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_package_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_package_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'package Types',
      'wbfsys.package_type.label'
    ),
    $this->view->i18n->l
    (
      'package Types',
      'wbfsys.package_type.label'
    ),
    $this->interface.'?c=Wbfsys.PackageType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_package_type'
  );

}

// check if the active role has access for address item Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_address_item_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_address_item_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'address item Types',
      'wbfsys.address_item_type.label'
    ),
    $this->view->i18n->l
    (
      'address item Types',
      'wbfsys.address_item_type.label'
    ),
    $this->interface.'?c=Wbfsys.AddressItemType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_address_item_type'
  );

}

// check if the active role has access for role group Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_role_group_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_role_group_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'role group Types',
      'wbfsys.role_group_type.label'
    ),
    $this->view->i18n->l
    (
      'role group Types',
      'wbfsys.role_group_type.label'
    ),
    $this->interface.'?c=Wbfsys.RoleGroupType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_role_group_type'
  );

}

// check if the active role has access for user setting value type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_user_setting_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_user_setting_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'user setting value types',
      'wbfsys.user_setting_type.label'
    ),
    $this->view->i18n->l
    (
      'user setting value types',
      'wbfsys.user_setting_type.label'
    ),
    $this->interface.'?c=Wbfsys.UserSettingType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_user_setting_type'
  );

}

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
    'Core',
    $this->interface.'?c=core.base.menu',
    'places/module.png'
  ),
  /*
  array
  (
    $this->view->i18n->l('Categories','wbf.label'),
    $this->interface.'?c=core.base.menu&amp;menu=categories',
    'places/category.png'
  ),
  */
  array
  (
    'Master Data',
    $this->interface.'?c=core.base.menu&amp;menu=master_data',
    'places/folder.png'
  ),
);

$this->firstEntry = array
(
  'menu_categories_core_back',
  Wgt::AJAX,
  '..',
  $this->view->i18n->l('Back','wbf.label'),
  $this->interface.'?c=core.base.menu',
  'places/category.png',
);

// check if the active role has access for country Category
if( $acl->access( 'mod-core>mgmt-core_country_category:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_country_category',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'country Categorys',
      'core.country_category.label'
    ),
    $this->view->i18n->l
    (
      'country Categorys',
      'core.country_category.label'
    ),
    $this->interface.'?c=Core.CountryCategory.listing',
    'places/entity.png',
     'mod-core>mgmt-core_country_category'
  );

}

// check if the active role has access for name Type
if( $acl->access( 'mod-core>mgmt-core_name_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_name_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'name Types',
      'core.name_type.label'
    ),
    $this->view->i18n->l
    (
      'name Types',
      'core.name_type.label'
    ),
    $this->interface.'?c=Core.NameType.listing',
    'places/entity.png',
     'mod-core>mgmt-core_name_type'
  );

}
