<div class="modal-header">
  <h6 class="modal-title">
    {include file='__svg_icons.tpl' icon="24_hours" class="main-icon mr10" width="24px" height="24px"}
    {__("Create New Story")}
  </h6>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form class="publisher-mini">
  <div class="modal-body">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-label">{__("Message")}</label>
          <textarea name="message" rows="5" dir="auto" class="form-control"></textarea>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">{__("Photos")}</label>
      <div class="attachments clearfix" data-type="photos">
        <ul>
          <li class="add">
            <i class="fa fa-camera js_x-uploader" data-handle="publisher-mini" data-multiple="true"></i>
          </li>
        </ul>
      </div>
    </div>

    <!-- error -->
    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
    <!-- error -->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary js_publisher-btn js_publisher-story">{__("Publish")}</button>
  </div>
</form>