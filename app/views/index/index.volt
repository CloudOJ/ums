{% if this.i18n.locale == "zh-cn" %}
<h1>欢迎使用 {{this.config.site.name}}!</h1>
<p>紧急施工中 = =</p>
{% endif %}
{% if this.i18n.locale == "en-us" %}
<h1>Hi, {{this.config.site.name}}!</h1>
<p>Under Construction.</p>
{% endif %}
