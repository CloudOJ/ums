<div class="row">
    <div class="col-md-6">
        <div class="page-header">
            <h1>{{this.i18n.user_login_title}}</h1>
        </div>
        {{ form('user/login') }}
            <fieldset>
                {% for element in form %}
                    <div class="form-group">
                        <div class="controls">{{ element }}</div>
                    </div>
                {% endfor %}
                <div class="form-group">
                    {{ submit_button(this.i18n.user_login_title, 'class': 'btn btn-primary btn-block') }}
                </div>
            </fieldset>
        {{ endform() }}
    </div>

    <div class="col-md-6">
        {% if this.i18n.locale == "zh-cn" %}
        <div class="page-header">
            <h1>还没有帐号？</h1>
        </div>
        <h5>立刻注册！</h5>
        <p>在 {{this.config.site.name}} 上</p>
        <ul>
            <li>提交代码并在线查看评测结果</li>
            <li>和好友以及其他用户自由讨论</li>
        </ul>
        {% endif %}
        {% if this.i18n.locale == "en-us" %}
        <div class="page-header">
            <h1>Don't have an account yet?</h1>
        </div>
        <h5>Sign up now!</h5>
        <p>{{this.config.site.name}} enables you:</p>
        <ul>
            <li>To submit your code and see the result online</li>
            <li>And to keep in touch with your friends</li>
        </ul>
        {% endif %}
        <div class="clearfix">
            {{ link_to('user/register', this.i18n.user_signup_title, 'class': 'btn btn-primary btn-block btn-success') }}
        </div>
    </div>
</div>
