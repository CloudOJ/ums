{% if config.recaptcha.enabled %}
<div class="form-group">
    <div class="controls">
        <div class="center-block g-recaptcha" data-sitekey="{{config.recaptcha.sitekey}}"></div>
    </div>
</div>

{% endif %}
