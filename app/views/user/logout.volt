{{ script }}
<style>
.iframe-logout {
    display: none;
}
</style>
<h1 id="progress-hint">正在同步登出...</h1>
<div class="progress">
  <div class="progress-bar" id="logout-progress" style="width: 0%;">
    <span id="logout-text">(0/0)</span>
  </div>
</div>
<script type="text/javascript">
var __count = 0;
var sitecount = {{ site_count | json_encode }};
window.onmessage = function(e) {
    var window = $("#iframe-logout-" + e.data)[0].contentWindow;
    window.postMessage("logout", "*");
    __count++;
    $("#logout-progress").css("width", (__count / sitecount * 100) + "%");
    $("#logout-text").text(__count + " / " + sitecount);
    if(__count >= sitecount) {
      $("#progress-hint").text("您已经成功登出");
    }
};
</script>
