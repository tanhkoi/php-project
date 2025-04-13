{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="{if $system['fluid_design']}container-fluid{else}container{/if} sg-offcanvas">
  <div class="row">

    <!-- side panel -->
    <div class="col-12 d-block d-md-none sg-offcanvas-sidebar mt20">
      {include file='_sidebar.tpl'}
    </div>
    <!-- side panel -->

    <!-- content panel -->
    <div class="col-12 sg-offcanvas-mainbar">
      <!-- profile-header -->
      <div class="profile-header">
        <!-- profile-cover -->
        <div class="profile-cover-wrapper">
          {if $profile['user_cover_id']}
            <!-- full-cover -->
            <img class="js_position-cover-full x-hidden" src="{$profile['user_cover_full']}">
            <!-- full-cover -->

            <!-- cropped-cover -->
            <img class="js_position-cover-cropped {if $user->_logged_in && $profile['user_cover_lightbox']}js_lightbox{/if}" data-init-position="{$profile['user_cover_position']}" data-id="{$profile['user_cover_id']}" data-image="{$profile['user_cover_full']}" data-context="album" src="{$profile['user_cover']}" alt="{$profile['name']}">
            <!-- cropped-cover -->
          {/if}

          {if $profile['user_id'] == $user->_data['user_id']}
            <!-- buttons -->
            <div class="profile-cover-buttons">
              <div class="profile-cover-change">
                <i class="fa fa-camera" data-bs-toggle="dropdown" data-display="static"></i>
                <div class="dropdown-menu action-dropdown-menu">
                  <!-- upload -->
                  <div class="dropdown-item pointer js_x-uploader" data-handle="cover-user">
                    <div class="action">
                      {include file='__svg_icons.tpl' icon="camera" class="main-icon mr10" width="20px" height="20px"}
                      {__("Upload Photo")}
                    </div>
                    <div class="action-desc">{__("Upload a new photo")}</div>
                  </div>
                  <!-- upload -->
                  <!-- select -->
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="users/photos.php?filter=cover&type=user&id={$profile['user_id']}">
                    <div class="action">
                      {include file='__svg_icons.tpl' icon="photos" class="main-icon mr10" width="20px" height="20px"}
                      {__("Select Photo")}
                    </div>
                    <div class="action-desc">{__("Select a photo")}</div>
                  </div>
                  <!-- select -->
                </div>
              </div>
              <div class="profile-cover-position {if !$profile['user_cover']}x-hidden{/if}">
                <input class="js_position-picture-val" type="hidden" name="position-picture-val">
                <i class="fa fa-crop-alt js_init-position-picture" data-handle="user" data-id="{$profile['user_id']}"></i>
              </div>
              <div class="profile-cover-position-buttons">
                <i class="fa fa-check fa-fw js_save-position-picture"></i>
              </div>
              <div class="profile-cover-position-buttons">
                <i class="fa fa-times fa-fw js_cancel-position-picture"></i>
              </div>
              <div class="profile-cover-delete {if !$profile['user_cover']}x-hidden{/if}">
                <i class="fa fa-trash js_delete-cover" data-handle="cover-user"></i>
              </div>
            </div>
            <!-- buttons -->

            <!-- loaders -->
            <div class="profile-cover-change-loader">
              <div class="progress x-progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="profile-cover-position-loader">
              <i class="fa fa-arrows-alt mr5"></i>{__("Drag to reposition cover")}
            </div>
            <!-- loaders -->
          {/if}
        </div>
        <!-- profile-cover -->

        <!-- profile-avatar -->
        <div class="profile-avatar-wrapper">
          <img {if $profile['user_picture_id']} {if $user->_logged_in && $profile['user_picture_lightbox']}class="js_lightbox" {/if} data-id="{$profile['user_picture_id']}" data-context="album" data-image="{$profile['user_picture_full']}" {elseif !$profile['user_picture_default']} class="js_lightbox-nodata" data-image="{$profile['user_picture']}" {/if} src="{$profile['user_picture']}" alt="{$profile['name']}">

          {if $profile['user_id'] == $user->_data['user_id']}
            <!-- buttons -->
            <div class="profile-avatar-change">
              <i class="fa fa-camera" data-bs-toggle="dropdown" data-display="static"></i>
              <div class="dropdown-menu action-dropdown-menu">
                <!-- upload -->
                <div class="dropdown-item pointer js_x-uploader" data-handle="picture-user">
                  <div class="action">
                    {include file='__svg_icons.tpl' icon="camera" class="main-icon mr10" width="20px" height="20px"}
                    {__("Upload Photo")}
                  </div>
                  <div class="action-desc">{__("Upload a new photo")}</div>
                </div>
                <!-- upload -->
                <!-- select -->
                <div class="dropdown-item pointer" data-toggle="modal" data-url="users/photos.php?filter=avatar&type=user&id={$profile['user_id']}">
                  <div class="action">
                    {include file='__svg_icons.tpl' icon="photos" class="main-icon mr10" width="20px" height="20px"}
                    {__("Select Photo")}
                  </div>
                  <div class="action-desc">{__("Select a photo")}</div>
                </div>
                <!-- select -->
              </div>
            </div>
            <div class="profile-avatar-crop {if $profile['user_picture_default'] || !$profile['user_picture_id']}x-hidden{/if}">
              <i class="fa fa-crop-alt js_init-crop-picture" data-image="{$profile['user_picture_full']}" data-handle="user" data-id="{$profile['user_id']}"></i>
            </div>
            <div class="profile-avatar-delete {if $profile['user_picture_default']}x-hidden{/if}">
              <i class="fa fa-trash js_delete-picture" data-handle="picture-user"></i>
            </div>
            <!-- buttons -->
            <!-- loaders -->
            <div class="profile-avatar-change-loader">
              <div class="progress x-progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <!-- loaders -->
          {/if}
        </div>
        <!-- profile-avatar -->

        <!-- profile-name -->
        <div class="profile-name-wrapper">
          <a href="{$system['system_url']}/{$profile['user_name']}">{$profile['name']}</a>
          {if $profile['user_subscribed']}
            <a href="{$system['system_url']}/packages" class="badge bg-danger" data-bs-toggle="tooltip" title="{__($profile['package_name'])}">{__($profile['package_name'])}</a>
          {/if}
        </div>
        <!-- profile-name -->

        <!-- profile-buttons -->
        <div class="profile-buttons-wrapper">
          {if $user->_logged_in}
            {if $user->_data['user_id'] != $profile['user_id']}
              <!-- add friend -->
              {if $profile['we_friends']}
                <button type="button" class="btn btn-md rounded-pill btn-success btn-delete js_friend-remove" data-uid="{$profile['user_id']}">
                  <i class="fa fa-check"></i>
                  <span class="d-none d-xxl-inline-block ml5">{__("Friends")}</span>
                </button>
              {elseif $profile['he_request']}
                <button type="button" class="btn btn-md rounded-pill btn-primary js_friend-accept" data-uid="{$profile['user_id']}">
                  <i class="fa fa-user-plus"></i>
                  <span class="d-none d-xxl-inline-block ml5">{__("Confirm")}</span>
                </button>
                <button type="button" class="btn btn-md rounded-pill btn-danger js_friend-decline" data-uid="{$profile['user_id']}">
                  <i class="fa fa-times"></i>
                  <span class="d-none d-xxl-inline-block ml5">{__("Decline")}</span>
                </button>
              {elseif $profile['i_request']}
                <button type="button" class="btn btn-md rounded-pill btn-light js_friend-cancel" data-uid="{$profile['user_id']}">
                  <i class="fa fa-clock"></i>
                  <span class="d-none d-xxl-inline-block ml5">{__("Sent")}</span>
                </button>
              {elseif !$profile['friendship_declined']}
                <button type="button" class="btn btn-md rounded-pill btn-success js_friend-add" data-uid="{$profile['user_id']}">
                  <i class="fa fa-user-plus"></i>
                  <span class="d-none d-xxl-inline-block ml5">{__("Add Friend")}</span>
                </button>
              {/if}
              <!-- add friend -->

              <!-- follow -->
              {if $profile['i_follow']}
                <button type="button" class="btn btn-md rounded-pill btn-light js_unfollow" data-uid="{$profile['user_id']}">
                  <i class="fa fa-check"></i>
                  <span class="d-none d-xxl-inline-block ml5">{__("Following")}</span>
                </button>
              {else}
                <button type="button" class="btn btn-md rounded-pill btn-light js_follow" data-uid="{$profile['user_id']}">
                  <i class="fa fa-rss"></i>
                  <span class="d-none d-xxl-inline-block ml5">{__("Follow")}</span>
                </button>
              {/if}
              <!-- follow -->

              <!-- message -->
              <button type="button" class="btn btn-icon rounded-pill btn-light mlr5 js_chat-start" data-uid="{$profile['user_id']}" data-name="{$profile['name']}" data-link="{$profile['user_name']}" data-picture="{$profile['user_picture']}">
                {include file='__svg_icons.tpl' icon="header-messages" class="main-icon" width="20px" height="20px"}
              </button>
              <!-- message -->

              <!-- poke & report & block menu -->
              <div class="d-inline-block dropdown">
                <button type="button" class="btn btn-icon rounded-pill btn-light" data-bs-toggle="dropdown" data-display="static">
                  <i class="fa fa-ellipsis-v fa-fw"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end action-dropdown-menu">
                  <!-- poke -->
                  {if $system['pokes_enabled'] && !$profile['i_poked']}
                    {if $profile['user_privacy_poke'] == "public" || ($profile['user_privacy_poke'] == "friends" && $profile['we_friends'])}
                      <div class="dropdown-item pointer js_poke" data-id="{$profile['user_id']}" data-name="{$profile['name']}">
                        <div class="action">
                          {include file='__svg_icons.tpl' icon="poke" class="main-icon mr10" width="20px" height="20px"}
                          {__("Poke")}
                        </div>
                        <div class="action-desc">{__("Let them know you are here")}</div>
                      </div>
                    {/if}
                  {/if}
                  <!-- poke -->
                  <!-- share -->
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="modules/share.php?node_type=user&node_username={$profile['user_name']}">
                    <div class="action">
                      {include file='__svg_icons.tpl' icon="share" class="main-icon mr10" width="20px" height="20px"}
                      {__("Share")}
                    </div>
                    <div class="action-desc">{__("Share this profile")}</div>
                  </div>
                  <!-- share -->
                  <!-- report -->
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="data/report.php?do=create&handle=user&id={$profile['user_id']}">
                    <div class="action">
                      {include file='__svg_icons.tpl' icon="report" class="main-icon mr10" width="20px" height="20px"}
                      {__("Report")}
                    </div>
                    <div class="action-desc">{__("Report this to admins")}</div>
                  </div>
                  <!-- report -->
                  <!-- block -->
                  <div class="dropdown-item pointer js_block-user" data-uid="{$profile['user_id']}">
                    <div class="action">
                      {include file='__svg_icons.tpl' icon="block" class="main-icon mr10" width="20px" height="20px"}
                      {__("Block")}
                    </div>
                    <div class="action-desc">{__("This user won't be able to reach you")}</div>
                  </div>
                  <!-- block -->
                  <!-- manage -->
                  {if $user->_is_admin}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{$system['system_url']}/admincp/users/edit/{$profile['user_id']}">
                      {include file='__svg_icons.tpl' icon="edit_profile" class="main-icon mr10" width="20px" height="20px"}
                      {__("Edit in Admin Panel")}
                    </a>
                  {elseif $user->_is_moderator}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{$system['system_url']}/modcp/users/edit/{$profile['user_id']}">
                      {include file='__svg_icons.tpl' icon="edit_profile" class="main-icon mr10" width="20px" height="20px"}
                      {__("Edit in Moderator Panel")}
                    </a>
                  {/if}
                  <!-- manage -->
                </div>
              </div>
              <!-- poke & report & block menu -->
            {else}
              <!-- edit -->
              <a href="{$system['system_url']}/settings/profile" class="btn btn-icon btn-rounded btn-light">
                <i class="fa fa-pencil-alt fa-fw"></i>
              </a>
              <!-- edit -->
            {/if}
          {/if}
        </div>
        <!-- profile-buttons -->
      </div>
      <!-- profile-header -->

      <!-- profile-tabs -->
      <div class="profile-tabs-wrapper d-flex justify-content-evenly">
        <a href="{$system['system_url']}/{$profile['user_name']}" {if $view == ""}class="active" {/if}>
          {include file='__svg_icons.tpl' icon="newsfeed" class="main-icon mr5" width="24px" height="24px"}
          <span class="ml5 d-none d-xxl-inline-block">{__("Timeline")}</span>
        </a>
        <a href="{$system['system_url']}/{$profile['user_name']}/friends" {if $view == "friends" || $view == "followers" || $view == "followings"}class="active" {/if}>
          {include file='__svg_icons.tpl' icon="friends" class="main-icon mr5" width="24px" height="24px"}
          <span class="ml5 d-none d-xxl-inline-block">{__("Friends")}</span>
        </a>
        <a href="{$system['system_url']}/{$profile['user_name']}/photos" {if $view == "photos" || $view == "albums" || $view == "album"}class="active" {/if}>
          {include file='__svg_icons.tpl' icon="photos" class="main-icon mr5" width="24px" height="24px"}
          <span class="ml5 d-none d-xxl-inline-block">{__("Photos")}</span>
        </a>
      </div>
      <!-- profile-tabs -->

      <!-- profile-content -->
      <div class="row">
        <!-- view content -->
        {if $view == ""}

          <!-- left panel -->
          <div class="col-lg-4 order-2 order-lg-1">
            <!-- panel [about] -->
            <div class="card">
              <div class="card-body">
                {if $system['biography_info_enabled']}
                  {if !is_empty($profile['user_biography'])}
                    <div class="about-bio">
                      <div class="js_readmore overflow-hidden">
                        {$profile['user_biography']|nl2br}
                      </div>
                    </div>
                  {/if}
                {/if}

                <ul class="about-list">
                  <!-- posts -->
                  <li>
                    <div class="about-list-item">
                      {include file='__svg_icons.tpl' icon="newsfeed" class="main-icon" width="24px" height="24px"}
                      {__($profile['posts_count'])} {__("Posts")}
                    </div>
                  </li>
                  <!-- posts -->
                  <!-- photos -->
                  <li>
                    <div class="about-list-item">
                      {include file='__svg_icons.tpl' icon="photos" class="main-icon" width="24px" height="24px"}
                      {__($profile['photos_count'])} {__("Photos")}
                    </div>
                  </li>
                  <!-- photos -->
                  <!-- info -->
                  <li>
                    <div class="about-list-item">
                      {include file='__svg_icons.tpl' icon="friends" class="main-icon" width="24px" height="24px"}
                      {__("Followed by")}
                      <a href="{$system['system_url']}/{$profile['user_name']}/followers">{$profile['followers_count']} {__("people")}</a>
                    </div>
                  </li>
                  <!-- info -->
                </ul>
              </div>
            </div>
            <!-- panel [about] -->

            <!-- custom fields [basic] -->
            {if $custom_fields['basic']}
              {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_basic'] == "public" || ($profile['user_privacy_basic'] == "friends" && $profile['we_friends'])}
                <div class="card">
                  <div class="card-header bg-transparent">
                    {include file='__svg_icons.tpl' icon="profile" class="main-icon mr5" width="24px" height="24px"}
                    <strong>{__("Basic Info")}</strong>
                  </div>
                  <div class="card-body">
                    <ul class="about-list">
                      {foreach $custom_fields['basic'] as $custom_field}
                        {if $custom_field['value']}
                          <li>
                            <strong>{__($custom_field['label'])}</strong><br>
                            {if $custom_field['type'] == "textbox" && $custom_field['is_link']}
                              <a href="{$custom_field['value']}">{$custom_field['value']}</a>
                            {elseif $custom_field['type'] == "multipleselectbox"}
                              {$custom_field['value_string']}
                            {else}
                              {$custom_field['value']}
                            {/if}
                          </li>
                        {/if}
                      {/foreach}
                    </ul>
                  </div>
                </div>
              {/if}
            {/if}
            <!-- custom fields [basic] -->

            <!-- custom fields [work] -->
            

            <!-- custom fields [location] -->
            
            <!-- custom fields [location] -->

            <!-- custom fields [education] -->
            
            <!-- custom fields [education] -->

            <!-- custom fields [other] -->
            
            <!-- custom fields [other] -->

            <!-- social links -->
            
            <!-- social links -->

            <!-- photos -->
            {if $profile['photos']}
              <div class="card panel-photos">
                <div class="card-header bg-transparent">
                  {include file='__svg_icons.tpl' icon="photos" class="main-icon mr5" width="24px" height="24px"}
                  <strong><a href="{$system['system_url']}/{$profile['user_name']}/photos">{__("Photos")}</a></strong>
                  {if $profile['user_id'] == $user->_data['user_id']}
                    <small>
                      <a href="{$system['system_url']}/{$profile['user_name']}/photos" class="float-end">
                        {__("Manage")}
                      </a>
                    </small>
                  {/if}
                </div>
                <div class="card-body">
                  <div class="row">
                    {foreach $profile['photos'] as $photo}
                      {include file='__feeds_photo.tpl' _context="photos" _small=true}
                    {/foreach}
                  </div>
                </div>
              </div>
            {/if}
            <!-- photos -->

            <!-- friends -->
            {if $profile['friends_count'] > 0}
              <div class="card">
                <div class="card-header bg-transparent">
                  {include file='__svg_icons.tpl' icon="friends" class="main-icon mr5" width="24px" height="24px"}
                  <strong><a href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a></strong>
                  <span class="badge rounded-pill bg-light text-primary ml5">{$profile['friends_count']}</span>
                  {if $profile['mutual_friends_count'] && $profile['mutual_friends_count'] > 0}
                    <small>
                      (<span class="text-underline" data-toggle="modal" data-url="users/mutual_friends.php?uid={$profile['user_id']}">{$profile['mutual_friends_count']} {__("mutual friends")}</span>)
                    </small>
                  {/if}
                  {if $profile['user_id'] == $user->_data['user_id']}
                    <small>
                      <a href="{$system['system_url']}/{$profile['user_name']}/friends" class="float-end">
                        {__("Manage")}
                      </a>
                    </small>
                  {/if}
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row">
                    {foreach $profile['friends'] as $_friend}
                      <div class="col-3 col-lg-4">
                        <div class="circled-user-box">
                          <a class="user-box" href="{$system['system_url']}/{$_friend['user_name']}">
                            <img src="{$_friend['user_picture']}" />
                            <div class="name">
                              {if $system['show_usernames_enabled']}{$_friend['user_name']}{else}{$_friend['user_firstname']} {$_friend['user_lastname']}{/if}
                            </div>
                          </a>
                        </div>
                      </div>
                    {/foreach}
                  </div>
                </div>
              </div>
            {/if}
            <!-- friends -->

            <!-- subscribers -->
            
            <!-- subscribers -->

            <!-- pages -->
            
            <!-- pages -->

            <!-- groups -->
            
            <!-- groups -->

            <!-- events -->
            
            <!-- events -->

            <!-- mini footer -->
            {include file='_footer_mini.tpl'}
            <!-- mini footer -->
          </div>
          <!-- left panel -->

          <!-- right panel -->
          <div class="col-lg-8 order-1 order-lg-2">

            <!-- publisher -->
            {if $user->_logged_in}
              {if $user->_data['user_id'] == $profile['user_id']}
                {include file='_publisher.tpl' _handle="me" _node_can_monetize_content=$user->_data['can_monetize_content'] _node_monetization_enabled=$user->_data['user_monetization_enabled'] _node_monetization_plans=$user->_data['user_monetization_plans'] _privacy=true}
              {elseif $system['wall_posts_enabled'] && ( $profile['user_privacy_wall'] == 'friends' && $profile['we_friends'] || $profile['user_privacy_wall'] == 'public' )}
                {include file='_publisher.tpl' _handle="user" _id=$profile['user_id'] _privacy=true}
              {/if}

            {/if}
            <!-- publisher -->

            <!-- pinned post -->
            {if $pinned_post}
              {include file='_pinned_post.tpl' post=$pinned_post}
            {/if}
            <!-- pinned post -->

            <!-- posts -->
            {include file='_posts.tpl' _get="posts_profile" _id=$profile['user_id']}
            <!-- posts -->

          </div>
          <!-- right panel -->

        {elseif $view == "friends"}
          <!-- friends -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  {include file='__svg_icons.tpl' icon="friends" class="main-icon mr10" width="24px" height="24px"}
                  {__("Friends")}
                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/friends">
                      {__("Friends")}
                      <span class="badge rounded-pill bg-info">{$profile['friends_count']}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followers">{__("Followers")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followings">{__("Followings")}</a>
                  </li>
                  {if $profile['has_subscriptions_plans']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscribers">{__("Subscribers")}</a>
                    </li>
                  {/if}
                  {if $system['monetization_enabled']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscriptions">{__("Subscriptions")}</a>
                    </li>
                  {/if}
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                {if $profile['friends']}
                  <ul class="row">
                    {foreach $profile['friends'] as $_user}
                      {include file='__feeds_user.tpl' _tpl="box" _connection=$_user["connection"] _darker=true}
                    {/foreach}
                  </ul>
                  {if $profile['friends_count'] >= $system['max_results_even']}
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="friends" data-uid="{$profile['user_id']}">
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  {/if}
                {else}
                  <p class="text-center text-muted mt10">
                    {$profile['name']} {__("doesn't have friends to show")}
                  </p>
                {/if}
              </div>
            </div>
          </div>
          <!-- friends -->

        {elseif $view == "followers"}
          <!-- followers -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  {include file='__svg_icons.tpl' icon="friends" class="main-icon mr10" width="24px" height="24px"}
                  {__("Followers")}
                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/followers">
                      {__("Followers")}
                      <span class="badge rounded-pill bg-info">{$profile['followers_count']}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followings">{__("Followings")}</a>
                  </li>
                  {if $profile['has_subscriptions_plans']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscribers">{__("Subscribers")}</a>
                    </li>
                  {/if}
                  {if $system['monetization_enabled']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscriptions">{__("Subscriptions")}</a>
                    </li>
                  {/if}
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                {if $profile['followers']}
                  <ul class="row">
                    {foreach $profile['followers'] as $_user}
                      {include file='__feeds_user.tpl' _tpl="box" _connection=$_user["connection"] _darker=true}
                    {/foreach}
                  </ul>

                  {if $profile['followers_count'] >= $system['max_results_even']}
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="followers" data-uid="{$profile['user_id']}">
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  {/if}
                {else}
                  <p class="text-center text-muted mt10">
                    {$profile['name']} {__("doesn't have followers to show")}
                  </p>
                {/if}
              </div>
            </div>
          </div>
          <!-- followers -->

        {elseif $view == "followings"}
          <!-- followings -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  {include file='__svg_icons.tpl' icon="friends" class="main-icon mr10" width="24px" height="24px"}
                  {__("Followings")}
                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followers">{__("Followers")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/followings">
                      {__("Followings")}
                      <span class="badge rounded-pill bg-info">{$profile['followings_count']}</span>
                    </a>
                  </li>
                  {if $profile['has_subscriptions_plans']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscribers">{__("Subscribers")}</a>
                    </li>
                  {/if}
                  {if $system['monetization_enabled']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscriptions">{__("Subscriptions")}</a>
                    </li>
                  {/if}
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                {if $profile['followings']}
                  <ul class="row">
                    {foreach $profile['followings'] as $_user}
                      {include file='__feeds_user.tpl' _tpl="box" _connection=$_user["connection"] _darker=true}
                    {/foreach}
                  </ul>

                  {if $profile['followings_count'] >= $system['max_results_even']}
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="followings" data-uid="{$profile['user_id']}">
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  {/if}
                {else}
                  <p class="text-center text-muted mt10">
                    {$profile['name']} {__("doesn't have followings to show")}
                  </p>
                {/if}
              </div>
            </div>
          </div>
          <!-- followings -->

        {elseif $view == "subscribers"}
          <!-- subscribers -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  {include file='__svg_icons.tpl' icon="friends" class="main-icon mr10" width="24px" height="24px"}
                  {__("Subscribers")}
                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followers">{__("Followers")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followings">{__("Followings")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/subscribers">
                      {__("Subscribers")}
                      <span class="badge rounded-pill bg-info">{$profile['subscribers_count']}</span>
                    </a>
                  </li>
                  {if $system['monetization_enabled']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscriptions">{__("Subscriptions")}</a>
                    </li>
                  {/if}
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                {if $profile['subscribers']}
                  <ul class="row">
                    {foreach $profile['subscribers'] as $_user}
                      {include file='__feeds_user.tpl' _tpl="box" _connection=$_user["connection"] _darker=true}
                    {/foreach}
                  </ul>
                  {if $profile['subscribers_count'] >= $system['max_results_even']}
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="subscribers" data-uid="{$profile['user_id']}" data-type="user">
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  {/if}
                {else}
                  <p class="text-center text-muted mt10">
                    {$profile['name']} {__("doesn't have subscribers to show")}
                  </p>
                {/if}
              </div>
            </div>
          </div>
          <!-- subscribers -->

        {elseif $view == "subscriptions"}
          <!-- subscriptions -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  {include file='__svg_icons.tpl' icon="friends" class="main-icon mr10" width="24px" height="24px"}
                  {__("Subscribers")}
                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followers">{__("Followers")}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followings">{__("Followings")}</a>
                  </li>
                  {if $profile['has_subscriptions_plans']}
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/subscribers">{__("Subscribers")}</a>
                    </li>
                  {/if}
                  <li class="nav-item">
                    <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/subscriptions">
                      {__("Subscriptions")}
                      <span class="badge rounded-pill bg-info">{$profile['subscriptions_count']}</span>
                    </a>
                  </li>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                {if $profile['subscriptions']}
                  <ul class="row">
                    {foreach $profile['subscriptions'] as $_subscription}
                      {if $_subscription['node_type'] == "profile"}
                        {include file='__feeds_user.tpl' _user=$_subscription _tpl="box" _connection='unsubscribe' _darker=true}
                      {elseif $_subscription['node_type'] == "page"}
                        {include file='__feeds_page.tpl' _page=$_subscription _tpl="box" _connection='unsubscribe' _darker=true}
                      {elseif $_subscription['node_type'] == "group"}
                        {include file='__feeds_group.tpl' _group=$_subscription _tpl="box" _connection='unsubscribe' _darker=true}
                      {/if}
                    {/foreach}
                  </ul>
                  {if $profile['subscriptions_count'] >= $system['max_results_even']}
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="subscriptions" data-uid="{$profile['user_id']}">
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  {/if}
                {else}
                  <p class="text-center text-muted mt10">
                    {$profile['name']} {__("doesn't have subscriptions to show")}
                  </p>
                {/if}
              </div>
            </div>
          </div>
          <!-- subscriptions -->

        {elseif $view == "photos"}
          <!-- photos -->
          <div class="col-12">
            {if $profile['needs_subscription']}
              {include file='_need_subscription.tpl' node_type='profile' node_id=$profile['user_id'] price=$profile['user_monetization_min_price']}
            {else}
              <div class="card panel-photos">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    {include file='__svg_icons.tpl' icon="photos" class="main-icon mr10" width="24px" height="24px"}
                    {__("Photos")}
                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/photos">{__("Photos")}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/albums">{__("Albums")}</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  {if $profile['photos']}
                    <ul class="row">
                      {foreach $profile['photos'] as $photo}
                        {include file='__feeds_photo.tpl' _context="photos" _can_pin=true}
                      {/foreach}
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt20 js_see-more" data-get="photos" data-id="{$profile['user_id']}" data-type='user'>
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  {else}
                    <p class="text-center text-muted mt10">
                      {$profile['name']} {__("doesn't have photos to show")}
                    </p>
                  {/if}
                </div>
              </div>
            {/if}
          </div>
          <!-- photos -->

        {elseif $view == "albums"}
          <!-- albums -->
          <div class="col-12">
            {if $profile['needs_subscription']}
              {include file='_need_subscription.tpl' node_type='profile' node_id=$profile['user_id'] price=$profile['user_monetization_min_price']}
            {else}
              <div class="card">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    {include file='__svg_icons.tpl' icon="photos" class="main-icon mr10" width="24px" height="24px"}
                    {__("Photos")}
                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/photos">{__("Photos")}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/albums">{__("Albums")}</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  {if $profile['albums']}
                    <ul class="row">
                      {foreach $profile['albums'] as $album}
                        {include file='__feeds_album.tpl'}
                      {/foreach}
                    </ul>
                    {if count($profile['albums']) >= $system['max_results_even']}
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="albums" data-id="{$profile['user_id']}" data-type='user'>
                        <span>{__("See More")}</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    {/if}
                  {else}
                    <p class="text-center text-muted mt10">
                      {$profile['name']} {__("doesn't have albums to show")}
                    </p>
                  {/if}
                </div>
              </div>
            {/if}
          </div>
          <!-- albums -->

        {elseif $view == "album"}
          <!-- albums -->
          <div class="col-12">
            {if $profile['needs_subscription']}
              {include file='_need_subscription.tpl' node_type='profile' node_id=$profile['user_id'] price=$profile['user_monetization_min_price']}
            {else}
              <div class="card panel-photos">
                <div class="card-header with-icon with-nav">
                  <!-- back to albums -->
                  <div class="float-end">
                    <a href="{$system['system_url']}/{$profile['user_name']}/albums" class="btn btn-md btn-light">
                      <i class="fa fa-arrow-circle-left mr5"></i>{__("Back to Albums")}
                    </a>
                  </div>
                  <!-- back to albums -->

                  <!-- panel title -->
                  <div class="mb20">
                    {include file='__svg_icons.tpl' icon="photos" class="main-icon mr10" width="24px" height="24px"}
                    {__("Photos")}
                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/photos">{__("Photos")}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{$system['system_url']}/{$profile['user_name']}/albums">{__("Albums")}</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  {include file='_album.tpl'}
                </div>
              </div>
            {/if}
          </div>
          <!-- albums -->

        {elseif $view == "videos"}
          <!-- videos -->
          <div class="col-12">
            {if $profile['needs_subscription']}
              {include file='_need_subscription.tpl' node_type='profile' node_id=$profile['user_id'] price=$profile['user_monetization_min_price']}
            {else}
              <div class="card panel-videos">
                <div class="card-header with-icon">
                  <!-- panel title -->
                  <div class="mb20">
                    {include file='__svg_icons.tpl' icon="videos" class="main-icon mr10" width="24px" height="24px"}
                    {__("Videos")}
                  </div>
                  <!-- panel title -->
                </div>
                <div class="card-body">
                  {if $profile['videos']}
                    <ul class="row">
                      {foreach $profile['videos'] as $video}
                        {include file='__feeds_video.tpl'}
                      {/foreach}
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="videos" data-id="{$profile['user_id']}" data-type='user'>
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  {else}
                    <p class="text-center text-muted mt10">
                      {$profile['name']} {__("doesn't have videos to show")}
                    </p>
                  {/if}
                </div>
              </div>
            {/if}
          </div>
          <!-- videos -->

        {elseif $view == "products"}
          <!-- products -->
          <div class="col-12">
            {if $profile['needs_subscription']}
              {include file='_need_subscription.tpl' node_type='profile' node_id=$profile['user_id'] price=$profile['user_monetization_min_price']}
            {else}
              {if $posts}
                <ul class="row">
                  {foreach $posts as $post}
                    {include file='__feeds_product.tpl'}
                  {/foreach}
                </ul>

                <!-- see-more -->
                <div class="alert alert-post see-more js_see-more" data-get="products" data-id="{$profile['user_id']}">
                  <span>{__("See More")}</span>
                  <div class="loader loader_small x-hidden"></div>
                </div>
                <!-- see-more -->
              {else}
                {include file='_no_data.tpl'}
              {/if}
            {/if}
          </div>
          <!-- products -->

        {elseif $view == "likes"}
          <!-- likes -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                {include file='__svg_icons.tpl' icon="pages" class="main-icon mr10" width="24px" height="24px"}
                {__("Likes")}
                <!-- panel title -->
              </div>
              <div class="card-body">
                {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_pages'] == "public" || ($profile['user_privacy_pages'] == "friends" && $profile['we_friends'])}
                  {if count($profile['pages']) > 0}
                    <ul class="row">
                      {foreach $profile['pages'] as $_page}
                        {include file='__feeds_page.tpl' _tpl="box" _darker=true}
                      {/foreach}
                    </ul>

                    {if count($profile['pages']) >= $system['max_results_even']}
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="profile_pages" data-uid="{$profile['user_id']}">
                        <span>{__("See More")}</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    {/if}
                  {else}
                    {include file='_no_data.tpl'}
                  {/if}
                {else}
                  {include file='_no_data.tpl'}
                {/if}
              </div>
            </div>
          </div>
          <!-- likes -->

        {elseif $view == "groups"}
          <!-- groups -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                {include file='__svg_icons.tpl' icon="groups" class="main-icon mr10" width="24px" height="24px"}
                {__("Groups")}
                <!-- panel title -->
              </div>
              <div class="card-body">
                {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_groups'] == "public" || ($profile['user_privacy_groups'] == "friends" && $profile['we_friends'])}
                  {if count($profile['groups']) > 0}
                    <ul class="row">
                      {foreach $profile['groups'] as $_group}
                        {include file='__feeds_group.tpl' _tpl="box" _darker=true}
                      {/foreach}
                    </ul>

                    {if count($profile['groups']) >= $system['max_results_even']}
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="profile_groups" data-uid="{$profile['user_id']}">
                        <span>{__("See More")}</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    {/if}
                  {else}
                    {include file='_no_data.tpl'}
                  {/if}
                {else}
                  {include file='_no_data.tpl'}
                {/if}
              </div>
            </div>
          </div>
          <!-- groups -->

        {elseif $view == "events"}
          <!-- events -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                {include file='__svg_icons.tpl' icon="events" class="main-icon mr10" width="24px" height="24px"}
                {__("Events")}
                <!-- panel title -->
              </div>
              <div class="card-body">
                {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_events'] == "public" || ($profile['user_privacy_events'] == "friends" && $profile['we_friends'])}
                  {if count($profile['events']) > 0}
                    <ul class="row">
                      {foreach $profile['events'] as $_event}
                        {include file='__feeds_event.tpl' _tpl="box" _darker=true}
                      {/foreach}
                    </ul>

                    {if count($profile['events']) >= $system['max_results_even']}
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="profile_events" data-uid="{$profile['user_id']}">
                        <span>{__("See More")}</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    {/if}
                  {else}
                    {include file='_no_data.tpl'}
                  {/if}
                {else}
                  {include file='_no_data.tpl'}
                {/if}
              </div>
            </div>
          </div>
          <!-- events -->

        {/if}
        <!-- view content -->
      </div>
      <!-- profile-content -->

      <!-- footer links -->
      {if $view != ""}
        {include file='_footer.links.tpl'}
      {/if}
      <!-- footer links -->
    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}

{if $gift}
  <script>
    $(function() {
      modal('#gift');
    });
  </script>
{/if}