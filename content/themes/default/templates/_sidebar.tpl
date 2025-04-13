<div class="card main-side-nav-card">
  <div class="card-body with-nav">
    <ul class="main-side-nav">

      <!-- favorites -->
      <li {if $page == "index" && ($view == "" || $view == "discover" || $view == "popular")}class="active" {/if}>
        {if !$user->_logged_in || (!$system['popular_posts_enabled'] && !$system['discover_posts_enabled'])}
          <a href="{$system['system_url']}">
            {include file='__svg_icons.tpl' icon="newsfeed" class="main-icon mr10" width="24px" height="24px"}
            {__("News Feed")}
          </a>
        {else}
          <a href="#newsfeed" data-bs-toggle="collapse" {if $page == "index" && ($view == "discover" || $view == "popular")}aria-expanded="true" {/if}>
            {include file='__svg_icons.tpl' icon="newsfeed" class="main-icon mr10" width="24px" height="24px"}
            {__("News Feed")}
          </a>
          <div class='collapse {if $page == "index" && ($view == "discover" || $view == "popular")}show{/if}' id="newsfeed">
            <ul>
              <li {if $page == "index" && $view == ""}class="active" {/if}>
                <a href="{$system['system_url']}">
                  {include file='__svg_icons.tpl' icon="posts_recent" class="main-icon mr10" width="24px" height="24px"}
                  {__("Recent Updates")}
                </a>
              </li>
              {if $system['popular_posts_enabled']}
                <li {if $page == "index" && $view == "popular"}class="active" {/if}>
                  <a href="{$system['system_url']}/popular">
                    {include file='__svg_icons.tpl' icon="popularity" class="main-icon mr10" width="24px" height="24px"}
                    {__("Popular Posts")}
                  </a>
                </li>
              {/if}
              {if $system['discover_posts_enabled']}
                <li {if $page == "index" && $view == "discover"}class="active" {/if}>
                  <a href="{$system['system_url']}/discover">
                    {include file='__svg_icons.tpl' icon="posts_discover" class="main-icon mr10" width="24px" height="24px"}
                    {__("Discover Posts")}
                  </a>
                </li>
              {/if}
            </ul>
          </div>
        {/if}
      </li>

      {if $user->_data['can_write_articles']}
        <li {if $page == "index" && $view == "articles"}class="active" {/if}>
          <a href="{$system['system_url']}/articles">
            {include file='__svg_icons.tpl' icon="articles" class="main-icon mr10" width="24px" height="24px"}
            {__("My Articles")}
          </a>
        </li>
      {/if}

      {if $user->_data['can_sell_products']}
        <li {if $page == "index" && $view == "products"}class="active" {/if}>
          <a href="{$system['system_url']}/products">
            {include file='__svg_icons.tpl' icon="products" class="main-icon mr10" width="24px" height="24px"}
            {__("My Products")}
          </a>
        </li>
      {/if}

      {if $user->_data['can_raise_funding']}
        <li {if $page == "index" && $view == "funding_requests"}class="active" {/if}>
          <a href="{$system['system_url']}/funding_requests">
            {include file='__svg_icons.tpl' icon="money-bag" class="main-icon mr10" width="24px" height="24px"}
            {__("My Funding")}
          </a>
        </li>
      {/if}

      {if $user->_logged_in}
        <li {if $page == "index" && $view == "saved"}class="active" {/if}>
          <a href="{$system['system_url']}/saved">
            {include file='__svg_icons.tpl' icon="saved" class="main-icon mr10" width="24px" height="24px"}
            {__("Saved Posts")}
          </a>
        </li>
      {/if}
      <!-- favorites -->

      <!-- advertising -->
      {if $user->_logged_in}
        {if $user->_data['can_create_ads'] || $system['wallet_enabled'] || $system['packages_enabled']}
          <li class="ptb5">
            <small class="text-muted">{__("Advertising")|upper}</small>
          </li>

          {if $user->_data['can_create_ads']}
            <li {if $page == "ads"}class="active" {/if}>
              <a href="{$system['system_url']}/ads">
                {include file='__svg_icons.tpl' icon="ads" class="main-icon mr10" width="24px" height="24px"}
                {__("Ads Manager")}
              </a>
            </li>
          {/if}

          {if $system['wallet_enabled']}
            <li {if $page == "wallet"}class="active" {/if}>
              <a href="{$system['system_url']}/wallet">
                {include file='__svg_icons.tpl' icon="wallet" class="main-icon mr10" width="24px" height="24px"}
                {__("Wallet")}
              </a>
            </li>
          {/if}

          {if $system['packages_enabled']}
            <a href="#boosted" data-bs-toggle="collapse" {if $page == "index" && ($view == "boosted_posts" || $view == "boosted_pages")}aria-expanded="true" {/if}>
              {include file='__svg_icons.tpl' icon="boosted" class="main-icon mr10" width="24px" height="24px"}
              {__("Boosted")}
            </a>
            <div class='collapse {if $page == "index" && ($view == "boosted_posts" || $view == "boosted_pages")}show{/if}' id="boosted">
              <ul>
                <li {if $page == "index" && $view == "boosted_posts"}class="active" {/if}>
                  <a href="{$system['system_url']}/boosted/posts">
                    {__("Boosted Posts")}
                  </a>
                </li>
                {if $system['pages_enabled']}
                  <li {if $page == "index" && $view == "boosted_pages"}class="active" {/if}>
                    <a href="{$system['system_url']}/boosted/pages">
                      {__("Boosted Pages")}
                    </a>
                  </li>
                {/if}
              </ul>
            </div>
          {/if}
        {/if}
      {/if}
      <!-- advertising -->

      <!-- explore -->
      <li class="ptb5">
        <small class="text-muted">{__("explore")|upper}</small>
      </li>

      {if $user->_logged_in}
        <li {if $page == "people"}class="active" {/if}>
          <a href="{$system['system_url']}/people">
            {include file='__svg_icons.tpl' icon="find_people" class="main-icon mr10" width="24px" height="24px"}
            {__("People")}
          </a>
        </li>
      {/if}

      {if $system['blogs_enabled']}
        <li {if $page == "blogs"}class="active" {/if}>
          <a href="{$system['system_url']}/blogs">
            {include file='__svg_icons.tpl' icon="blogs" class="main-icon mr10" width="24px" height="24px"}
            {__("Blogs")}
          </a>
        </li>
      {/if}

      {if $system['developers_apps_enabled'] || $system['developers_share_enabled']}
        <li {if $page == "developers"}class="active" {/if}>
          <a href="{$system['system_url']}/developers{if !$system['developers_apps_enabled']}/share{/if}">
            {include file='__svg_icons.tpl' icon="developers" class="main-icon mr10" width="24px" height="24px"}
            {__("Developers")}
          </a>
        </li>
      {/if}
      <!-- explore -->
    </ul>
  </div>
</div>