<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{config.application.baseUri}}"> {{config.site.i18n[i18n.locale]}} </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            {{ navbar_element.render() }}
        </div>
    </div>
</nav>
