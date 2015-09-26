<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img class='img-rounded' width='17px' height='17px' src='{{ url("profile/avatar/" ~ this.session.get("auth")["id"]) }}'></img><span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li class="disabled">
                <a href="#">
                    {{this.i18n.dropdown_signedin | format(this.session.get("auth")["name"]) }}
                </a>
            </li>
            <li class="divider"></li>
            <li><a href="#">{{glyphicon("user")}}{{this.i18n.user_profile}}</a></li>
            <li><a href="#">{{glyphicon("inbox")}}{{this.i18n.user_notification}}</a></li>
            <li class="divider"></li>
            <li><a href="{{url("help")}}">{{glyphicon("question-sign")}}{{this.i18n.footer_help}}</a></li>
            <li class="divider"></li>
            <li><a href="{{url("user/logout")}}">{{glyphicon("log-out")}}{{this.i18n.user_logout}}</a></li>
        </ul>
    </li>
</ul>
