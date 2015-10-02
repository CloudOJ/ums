<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img class='img-circle ums-avatar' width='24px' height='24px' src='{{ url("profile/avatar/" ~ this.session.get("auth")["id"]) }}'></img><span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li class="disabled">
                <a href="#">
                    {{i18n.dropdown_signedin | format(this.session.get("auth")["name"]) }}
                </a>
            </li>
            <li class="divider"></li>
            <li><a href="#">{{glyphicon("user")}}{{i18n.user_profile}}</a></li>
            <li><a href="#">{{glyphicon("inbox")}}{{i18n.user_notification}}</a></li>
            <li class="divider"></li>
            <li><a href="{{url("help")}}">{{glyphicon("question-sign")}}{{i18n.footer_help}}</a></li>
            <li class="divider"></li>
            <li><a href="{{url("user/logout")}}">{{glyphicon("log-out")}}{{i18n.user_logout}}</a></li>
        </ul>
    </li>
</ul>

<style>
.ums-avatar {
    position: relative;
    margin-top: -8px;
}
</style>
