<div class="page-header">
    <h1>{{this.i18n.user_signup_title}}</h1>
</div>

{{ form('user/register') }}
    <fieldset>
        {% for element in form %}
            <div class="form-group">
                <div class="controls">{{ element }}</div>
            </div>
        {% endfor %}
        <div class="form-group">
            {{ submit_button(this.i18n.user_signup_title, 'class': 'btn btn-primary btn-block') }}
        </div>
        {{partial("partials/security/csrf")}}
        <div class="row">
            <div class="col-xs-12">
                <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>
            </div>
        </div>
    </fieldset>
{{ endform() }}
