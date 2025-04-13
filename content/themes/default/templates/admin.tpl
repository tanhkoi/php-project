{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="{if $system['fluid_design']}container-fluid{else}container{/if} mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar admin-sidebar">

      <!-- System -->
      <div class="card mb15">
        <div class="card-header block-title">
          {__("System")}
        </div>
        <div class="card-body with-nav">
          <ul class="side-nav">
            <!-- Dashboard -->
            <li {if $view == "dashboard"}class="active" {/if}>
              <a href="{$system['system_url']}/{$control_panel['url']}">
                <i class="fa fa-tachometer-alt fa-lg fa-fw mr10" style="color: #5e72e4"></i>{__("Dashboard")}
              </a>
            </li>
            <!-- Dashboard -->
          </ul>
        </div>

        <div class="card-body with-nav">
          <ul class="side-nav">
            {if $user->_is_admin}
              <!-- Users -->
              <li {if $view == "users"}class="active" {/if}>
                <a href="#users" data-bs-toggle="collapse" {if $view == "users"}aria-expanded="true" {/if}>
                  <i class="fa fa-user fa-lg fa-fw mr10" style="color: #9C27B0"></i>{__("Users")}
                </a>
                <div class='collapse {if $view == "users"}show{/if}' id="users">
                  <ul>
                    <li {if $view == "users" && $sub_view == ""}class="active" {/if}>
                      <a href="{$system['system_url']}/{$control_panel['url']}/users">
                        {__("List Users")}
                      </a>
                    </li>
                    <li {if $view == "users" && $sub_view == "admins"}class="active" {/if}>
                      <a href="{$system['system_url']}/{$control_panel['url']}/users/admins">
                        {__("List Admins")}
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Users -->
            {/if}
          </ul>
        </div>

        <div class="card-body with-nav">
          <ul class="side-nav">
            <!-- Posts -->
            <li {if $view == "posts"}class="active" {/if}>
              <a href="#posts" data-bs-toggle="collapse" {if $view == "posts"}aria-expanded="true" {/if}>
                <i class="fa fa-newspaper fa-lg fa-fw mr10" style="color: #F44336"></i>{__("Posts")}
              </a>
              <div class='collapse {if $view == "posts"}show{/if}' id="posts">
                <ul>
                  <li {if $view == "posts" && $sub_view == ""}class="active" {/if}>
                    <a href="{$system['system_url']}/{$control_panel['url']}/posts">
                      {__("List Posts")}
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Posts -->

            <!-- Pages -->
            
            <!-- Pages -->

            <!-- Groups -->
            
            <!-- Groups -->

            <!-- Events -->
            
            <!-- Events -->

            <!-- Blogs -->
            <li {if $view == "blogs"}class="active" {/if}>
              <a href="#blogs" data-bs-toggle="collapse" {if $view == "blogs"}aria-expanded="true" {/if}>
                <i class="fab fa-blogger-b fa-lg fa-fw mr10" style="color: #F44336"></i>{__("Blogs")}
              </a>
              <div class='collapse {if $view == "blogs"}show{/if}' id="blogs">
                <ul>
                  <li {if $view == "blogs" && $sub_view == ""}class="active" {/if}>
                    <a href="{$system['system_url']}/{$control_panel['url']}/blogs">
                      {__("List Articles")}
                    </a>
                  </li>
                  <li {if $view == "blogs" && $sub_view == "categories"}class="active" {/if}>
                    <a href="{$system['system_url']}/{$control_panel['url']}/blogs/categories">
                      {__("List Categories")}
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Blogs -->
          </ul>
        </div>
      </div>
      <!-- System -->
    </div>
    <!-- left panel -->

    <!-- right panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
      {include file="admin.$view.tpl"}
    </div>
    <!-- right panel -->

  </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}