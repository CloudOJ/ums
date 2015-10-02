<div class="row">
    <div class="col-md-6">
        <div class="page-header">
            <h1>{{i18n.user_login_title}}</h1>
        </div>
        {{ form('user/login/') }}
            <fieldset>
                {% for element in form %}
                    <div class="form-group">
                        <div class="controls">{{ element }}</div>
                    </div>
                {% endfor %}
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember-me" />
                        {{i18n.user_login_remember_me}}
                    </label>
                </div>
                <div class="form-group">
                    {{ submit_button(i18n.user_login_title, 'class': 'btn btn-primary btn-block') }}
                </div>
                {{partial("partials/security/csrf")}}
            </fieldset>
        {{ endform() }}
    </div>

    <div class="col-md-6">
        {% if i18n.locale == "zh-cn" %}
        <div class="page-header">
            <h1>还没有帐号？</h1>
        </div>
        <h5>立刻注册！</h5>
        <p>在 {{config.site.i18n[i18n.locale]}} 上</p>
        <ul>
            <li>一键登录所有 {{config.site.i18n[i18n.locale]}} 产品</li>
            <li>和好友以及其他用户自由交流</li>
        </ul>
        {% endif %}
        {% if i18n.locale == "en-us" %}
        <div class="page-header">
            <h1>Don't have an account yet?</h1>
        </div>
        <h5>Sign up now!</h5>
        <p>{{config.site.i18n[i18n.locale]}} enables you:</p>
        <ul>
            <li>Log In in all products of {{config.site.i18n[i18n.locale]}}</li>
            <li>And to keep in touch with your friends</li>
        </ul>
        {% endif %}
        <div class="clearfix">
            {{ link_to('user/register', i18n.user_signup_title, 'class': 'btn btn-primary btn-block btn-success') }}
        </div>
    </div>
</div>
