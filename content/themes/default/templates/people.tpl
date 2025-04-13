{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="{if $system['fluid_design']}container-fluid{else}container{/if} mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar js_sticky-sidebar">
      {include file='_sidebar.tpl'}
    </div>
    <!-- left panel -->

    <!-- content panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">

      <!-- tabs -->
      <div class="content-tabs rounded-sm shadow-sm clearfix">
        <ul>
          <li {if $view == "" || $view == "find"}class="active" {/if}>
            <a href="{$system['system_url']}/people">{__("Discover")}</a>
          </li>
          <li {if $view == "friend_requests"}class="active" {/if}>
            <a href="{$system['system_url']}/people/friend_requests">
              {__("Friend Requests")}
              {if $user->_data['friend_requests']}
                <span class="badge badge-lg bg-info ml5">{count($user->_data['friend_requests'])}</span>
              {/if}
            </a>
          </li>
          <li {if $view == "sent_requests"}class="active" {/if}>
            <a href="{$system['system_url']}/people/sent_requests">
              {__("Sent Requests")}
              {if $user->_data['friend_requests_sent_total']}
                <span class="badge badge-lg bg-warning ml5">{$user->_data['friend_requests_sent_total']}</span>
              {/if}
            </a>
          </li>
        </ul>
      </div>
      <!-- tabs -->

      <!-- content -->
      <div class="">
        <!-- left panel -->
        <div class="">
          <div class="card">

            {if $view == ""}
              <div class="card-header bg-transparent">
                <strong>{__("People You May Know")}</strong>
              </div>
              <div class="card-body">
                {if $people}
                  <ul>
                    {foreach $people as $_user}
                      {include file='__feeds_user.tpl' _tpl="list" _connection="add"}
                    {/foreach}
                  </ul>

                  <!-- see-more -->
                  {if count($people) >= $system['min_results']}
                    <div class="alert alert-post see-more js_see-more" data-get="new_people">
                      <span>{__("See More")}</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                  {/if}
                  <!-- see-more -->
                {else}
                  <p class="text-center text-muted">
                    {__("No people available")}
                  </p>
                {/if}
              </div>

            {elseif $view == "find"}
              <div class="card-header bg-transparent">
                <strong>{__("Search Results")}</strong>
              </div>
              <div class="card-body">
                {if $people}
                  <ul>
                    {foreach $people as $_user}
                      {include file='__feeds_user.tpl' _tpl="list" _connection=$_user['connection']}
                    {/foreach}
                  </ul>
                {else}
                  <p class="text-center text-muted">
                    {__("No people available for your search")}
                  </p>
                {/if}
              </div>

            {elseif $view == "friend_requests"}
              <div class="card-header bg-transparent">
                <strong>{__("Respond to Your Friend Request")}</strong>
              </div>
              <div class="card-body">
                {if $user->_data['friend_requests']}
                  <ul>
                    {foreach $user->_data['friend_requests'] as $_user}
                      {include file='__feeds_user.tpl' _tpl="list" _connection="request"}
                    {/foreach}
                  </ul>
                {else}
                  <p class="text-center text-muted">
                    {__("No new requests")}
                  </p>
                {/if}

                <!-- see-more -->
                {if count($user->_data['friend_requests']) >= $system['max_results']}
                  <div class="alert alert-info see-more js_see-more" data-get="friend_requests">
                    <span>{__("See More")}</span>
                    <div class="loader loader_small x-hidden"></div>
                  </div>
                {/if}
                <!-- see-more -->
              </div>

            {elseif $view == "sent_requests"}
              <div class="card-header bg-transparent">
                <strong>{__("Friend Requests Sent")}</strong>
              </div>
              <div class="card-body">
                {if $user->_data['friend_requests_sent']}
                  <ul>
                    {foreach $user->_data['friend_requests_sent'] as $_user}
                      {include file='__feeds_user.tpl' _tpl="list" _connection="cancel"}
                    {/foreach}
                  </ul>
                {else}
                  <p class="text-center text-muted">
                    {__("No new requests")}
                  </p>
                {/if}

                <!-- see-more -->
                {if count($user->_data['friend_requests_sent']) >= $system['max_results']}
                  <div class="alert alert-info see-more js_see-more" data-get="friend_requests_sent">
                    <span>{__("See More")}</span>
                    <div class="loader loader_small x-hidden"></div>
                  </div>
                {/if}
                <!-- see-more -->
              </div>

            {/if}

          </div>
        </div>
        <!-- left panel -->

      </div>
      <!-- content -->

    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}