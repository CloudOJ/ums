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
                <li><a href="{{url("problem")}}">
                    {{glyphicon("question-sign")}}
                    <span class="hidden-sm">
                        {{this.i18n.navbar_problem}}
                    </span>
                </a></li>
                <li class="hidden-sm"><a href="{{url("contest")}}">
                    {{glyphicon("globe")}}
                    <span class="hidden-sm">
                        {{this.i18n.navbar_contest}}
                    </span>
                </a></li>
                <li><a href="{{url("discuss")}}">
                    {{glyphicon("comment")}}
                    <span class="hidden-sm">
                        {{this.i18n.navbar_discuss}}
                    </span>
                </a></li>
                <li><a href="{{url("status")}}">
                    {{glyphicon("stats")}}
                    <span class="hidden-sm">
                        {{this.i18n.navbar_status}}
                    </span>
                </a></li>
                <li><a href="{{url("rank")}}">
                    {{glyphicon("education")}}
                    <span class="hidden-sm">
                        {{this.i18n.navbar_rank}}
                    </span></a></li>
                <li class="hidden-lg"><a href="{{url("search")}}">
                    {{glyphicon("search")}}
                    <span class="hidden-sm">
                        {{this.i18n.navbar_search}}
                    </span>
                </a></li>
            </ul>
            <form class="navbar-form navbar-left visible-lg">
                <div class="form-group">
                    <input type="text" class="form-control"
                           placeholder="{{this.i18n.navbar_search_textarea | format(this.config.site.name)}}">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url("user/login")}}">{{glyphicon("log-in")}}<span class="hidden-sm">{{this.i18n.navbar_login}}</span></a></li>
                <li><a href="{{url("user/register")}}">{{glyphicon("new-window")}}<span class="hidden-sm">{{this.i18n.navbar_register}}</span></a></li>
            </ul>
        </div>
    </div>
</nav>
