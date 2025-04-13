{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="{if $system['fluid_design']}container-fluid{else}container{/if} mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar">
      <div class="card">
        <div class="card-body with-nav">
          <ul class="side-nav">
            <li {if $view == ""}class="active" {/if}>
              <a href="{$system['system_url']}/settings">
                {include file='__svg_icons.tpl' icon="settings" class="main-icon mr10" width="24px" height="24px"}
                {__("Account Settings")}
              </a>
            </li>

            <li {if $view == "profile"}class="active" {/if}>
              <a href="#info-settings" data-bs-toggle="collapse" {if $view == "profile"}aria-expanded="true" {/if}>
                {include file='__svg_icons.tpl' icon="edit_profile" class="main-icon mr10" width="24px" height="24px"}
                {__("Edit Profile")}
              </a>
              <div class='collapse {if $view == "profile"}show{/if}' id="info-settings">
                <ul>
                  <li {if $view == "profile" && $sub_view == ""}class="active" {/if}>
                    <a href="{$system['system_url']}/settings/profile">
                      {__("Basic")}
                    </a>
                  </li>
                  {if $system['work_info_enabled']}
                    <li {if $view == "profile" && $sub_view == "work"}class="active" {/if}>
                      <a href="{$system['system_url']}/settings/profile/work">
                        {__("Work")}
                      </a>
                    </li>
                  {/if}
                </ul>
              </div>
            </li>

            <li {if $view == "security"}class="active" {/if}>
              <a href="#security-settings" data-bs-toggle="collapse" {if $view == "security"}aria-expanded="true" {/if}>
                {include file='__svg_icons.tpl' icon="security" class="main-icon mr10" width="24px" height="24px"}
                {__("Security Settings")}
              </a>
              <div class='collapse {if $view == "security"}show{/if}' id="security-settings">
                <ul>
                  <li {if $view == "security" && $sub_view == "password"}class="active" {/if}>
                    <a href="{$system['system_url']}/settings/security/password">
                      {__("Password")}
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <div class="divider mtb5"></div>

            {if $system['delete_accounts_enabled']}
              <li {if $view == "delete"}class="active" {/if}>
                <a href="{$system['system_url']}/settings/delete">
                  {include file='__svg_icons.tpl' icon="delete_user" class="main-icon mr10" width="24px" height="24px"}
                  {__("Delete Account")}
                </a>
              </li>
            {/if}
          </ul>
        </div>
      </div>
    </div>
    <!-- left panel -->

    <!-- right panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
      <div class="card">
        {if $view == ""}
          {include file='settings.account.tpl'}
        {elseif $view == "profile"}
          {include file='settings.profile.tpl'}
        {elseif $view == "security"}
          {include file='settings.security.tpl'}
        {elseif $view == "privacy"}
          {include file='settings.privacy.tpl'}
        {elseif $view == "notifications"}
          {include file='settings.notifications.tpl'}
        {elseif $view == "accounts"}
          {include file='settings.accounts.tpl'}
        {elseif $view == "linked"}
          {include file='settings.linked.tpl'}
        {elseif $view == "membership"}
          {include file='settings.membership.tpl'}
        {elseif $view == "invitations"}
          {include file='settings.invitations.tpl'}
        {elseif $view == "affiliates"}
          {include file='settings.affiliates.tpl'}
        {elseif $view == "points"}
          {include file='settings.points.tpl'}
        {elseif $view == "market"}
          {include file='settings.market.tpl'}
        {elseif $view == "funding"}
          {include file='settings.funding.tpl'}
        {elseif $view == "monetization"}
          {include file='settings.monetization.tpl'}
        {elseif $view == "coinpayments"}
          {include file='settings.coinpayments.tpl'}
        {elseif $view == "bank"}
          {include file='settings.bank.tpl'}
        {elseif $view == "verification"}
          {include file='settings.verification.tpl'}
        {elseif $view == "apps"}
          {include file='settings.apps.tpl'}
        {elseif $view == "blocking"}
          {include file='settings.blocking.tpl'}
        {elseif $view == "addresses"}
          {include file='settings.addresses.tpl'}
        {elseif $view == "information"}
          {include file='settings.information.tpl'}
        {elseif $view == "delete"}
          {include file='settings.delete.tpl'}
        {/if}
      </div>
    </div>
    <!-- right panel -->

  </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}