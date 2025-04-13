<div class="card">
  <div class="card-header with-icon">
    <i class="fa fa-tachometer-alt mr10"></i>{__("Dashboard")}
  </div>
  <div class="card-body">
    {if $user->_is_admin}
      <div id="admin-chart-dashboard" class="admin-chart mb20"></div>
      <div class="row">
        <div class="col-sm-6">
          <div class="stat-panel bg-gradient-primary">
            <div class="stat-cell narrow">
              <i class="fa fa-users bg-icon"></i>
              <span class="text-xxlg">{$insights['users']}</span><br>
              <span class="text-lg">{__("Users")}</span><br>
              <a href="{$system['system_url']}/{$control_panel['url']}/users">{__("Manage Users")}</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="stat-panel bg-gradient-success">
            <div class="stat-cell narrow">
              <i class="fa fa-newspaper bg-icon"></i>
              <span class="text-xxlg">{$insights['posts']}</span><br>
              <span class="text-lg">{__("Posts")}</span><br>
              <a href="{$system['system_url']}/{$control_panel['url']}/posts">{__("Manage Posts")}</a>
            </div>
          </div>
        </div>
      </div>
    {/if}
  </div>
</div>