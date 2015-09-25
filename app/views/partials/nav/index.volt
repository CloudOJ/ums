<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{this.config.application.baseUri}}"> {{this.config.site.name}} </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url("/")}}">
                    {{glyphicon("home")}}
                    <span class="hidden-sm">
                        {{this.i18n.navbar_home}}
                    </span>
                </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url("user/login")}}">{{glyphicon("log-in")}}<span class="hidden-sm">{{this.i18n.navbar_login}}</span></a></li>
                <li><a href="{{url("user/register")}}">{{glyphicon("new-window")}}<span class="hidden-sm">{{this.i18n.navbar_register}}</span></a></li>
            </ul>
        </div>
    </div>
</nav>
