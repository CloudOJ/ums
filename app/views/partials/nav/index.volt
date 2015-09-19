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
                <li class="active"><a href="#"> {{glyphicon("home")}}{{this.i18n.navbar_home}} </a></li>
                <li><a href="#"> {{glyphicon("question-sign")}}{{this.i18n.navbar_problem}} </a></li>
                <li class = "hidden-sm"><a href="#"> {{glyphicon("globe")}}{{this.i18n.navbar_contest}} </a></li>
                <li class = "hidden-sm"><a href="#"> {{glyphicon("comment")}}{{this.i18n.navbar_discuss}} </a></li>
                <li><a href="#"> {{glyphicon("stats")}}{{this.i18n.navbar_status}} </a></li>
                <li><a href="#"> {{glyphicon("education")}}{{this.i18n.navbar_rank}} </a></li>
                <li class="hidden-lg"><a href="#"> {{glyphicon("search")}}{{this.i18n.navbar_search}} </a></li>
            </ul>
            <form class="navbar-form navbar-left visible-lg" role="search">
                <div class="form-group">
                    <input type="text" class="form-control"
                           placeholder="{{this.i18n.navbar_search_textarea | format(this.config.site.name)}}">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">{{glyphicon("log-in")}}{{this.i18n.navbar_login}}</a></li>
                <li><a href="#">{{glyphicon("new-window")}}{{this.i18n.navbar_register}}</a></li>
            </ul>
        </div>
    </div>
</nav>
