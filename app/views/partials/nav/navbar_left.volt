<ul class="nav navbar-nav">
    <li class="{{Nav.isControllerCurrent("index")}}"><a href="{{url("/")}}">
        {{glyphicon("home")}}
        <span class="hidden-sm">
            {{i18n.navbar_home}}
        </span>
    </a></li>
    {% for umssite in config.ums %}
    <li>
        {% if session.has("auth") %}
        <a href="{{url('/user/token/')}}/{{umssite.id}}">
        {% else %}
        <a href="{{umssite.baseUri}}">
        {% endif %}
        {{glyphicon("chevron-left")}}
        <span>{{i18n.navbar_return}} {{umssite.i18n[i18n.locale]}}</span>
        </a>
    </li>
    {% endfor %}
</ul>
