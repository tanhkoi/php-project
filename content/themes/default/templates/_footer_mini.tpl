<div class="mini-footer mtb20 plr10">
  <div class="copyrights dropdown">
    <span class="mr5">&copy; {date('Y')} {__($system['system_title'])}</span>
  </div>
  <ul class="links">
    {if $system['contact_enabled']}
      <li>
        <a href="{$system['system_url']}/contacts">
          {__("Contact Us")}
        </a>
      </li>
    {/if}
  </ul>
</div>