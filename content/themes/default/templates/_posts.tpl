<!-- posts-loader -->
<div class="post x-hidden js_posts_loader">
  <div class="post-body with-loader">
    <div class="panel-effect">
      <div class="fake-effect fe-0"></div>
      <div class="fake-effect fe-1"></div>
      <div class="fake-effect fe-2"></div>
      <div class="fake-effect fe-3"></div>
      <div class="fake-effect fe-4"></div>
      <div class="fake-effect fe-5"></div>
      <div class="fake-effect fe-6"></div>
      <div class="fake-effect fe-7"></div>
      <div class="fake-effect fe-8"></div>
      <div class="fake-effect fe-9"></div>
      <div class="fake-effect fe-10"></div>
      <div class="fake-effect fe-11"></div>
    </div>
  </div>
</div>
<!-- posts-loader -->

<!-- posts staging -->
<button class="btn btn-primary rounded-pill posts-staging-btn js_view-staging-posts">
  {__("View")} <span>0</span> {__("New Posts")}
</button>

<div class="js_posts_stream_staging" style="display: none;"></div>
<!-- posts staging -->

<!-- posts stream -->
<div class="js_posts_stream" data-get="{$_get}" data-filter="{if $_filter}{$_filter}{else}all{/if}" data-country="{if $selected_country}{$selected_country['country_id']}{else}all{/if}" {if $_id}data-id="{$_id}" {/if}>
  {if $posts}
    <ul>
      <!-- posts -->
      {foreach $posts as $post}
        {include file='__feeds_post.tpl' _get=$_get}
      {/foreach}
      <!-- posts -->
    </ul>

    <!-- see-more -->
    <div class="alert alert-post see-more mb20 js_see-more js_see-more-infinite" data-get="{$_get}" data-filter="{if $_filter}{$_filter}{else}all{/if}" data-country="{if $selected_country}{$selected_country['country_id']}{else}all{/if}" {if $_id}data-id="{$_id}" {/if}>
      <span>{__("More Stories")}</span>
      <div class="loader loader_small x-hidden"></div>
    </div>
    <!-- see-more -->
  {else}
    <div class="js_posts_stream" data-get="{$_get}" data-filter="{if $_filter}{$_filter}{else}all{/if}" data-country="{if $selected_country}{$selected_country['country_id']}{else}all{/if}" {if $_id}data-id="{$_id}" {/if}>
      <ul>
        {include file='_no_data.tpl'}
      </ul>
    </div>
  {/if}
</div>
<!-- posts stream -->