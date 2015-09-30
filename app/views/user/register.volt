<div class="page-header">
    <h1>{{i18n.user_signup_title}}</h1>
</div>

{{ form('user/register') }}
    <fieldset>
        {% for element in form %}
            <div class="form-group">
                <div class="controls">{{ element }}</div>
            </div>
        {% endfor %}
        <div class="form-group">
            {{ submit_button(i18n.user_signup_title, 'class': 'btn btn-primary btn-block') }}
        </div>
        {{partial("partials/security/csrf")}}
        <div class="row">
            <div class="col-xs-12">
                <p class="help-block">
                    {% if i18n.locale is "en-us"%}
                    By signing up, you accept terms of service and privacy policy.
                    {% endif %}
                    {% if i18n.locale is "zh-cn" %}
                    注册即表示您同意《用户许可协议》和《隐私保护协议》。
                    {% endif %}
                </p>
            </div>
        </div>
    </fieldset>
{{ endform() }}
