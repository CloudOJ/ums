<ul class="nav navbar-nav navbar-right">
    <li class="{{Nav.isActionCurrent("user", "login")}}"><a href="{{url("user/login")}}">{{glyphicon("log-in")}}<span class="hidden-sm">{{i18n.navbar_login}}</span></a></li>
    <li class="{{Nav.isActionCurrent("user", "register")}}"><a href="{{url("user/register")}}">{{glyphicon("new-window")}}<span class="hidden-sm">{{i18n.navbar_register}}</span></a></li>
</ul>
