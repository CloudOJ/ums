<div class="top-nav">
    <div class="row">
        <div class="col-md-6" align="left">
            {% if not(isIndex) %}
            <p>{{link_to(
                this.view.getControllerName(),
                "class": "btn btn-default",
                glyphicon("chevron-left") ~ this.i18n.title_help
                )}}</p>
            {% else %}
            <p>{{link_to(
                "index",
                "class": "btn btn-default",
                glyphicon("chevron-left") ~ this.i18n.title_home
                )}}</p>
            {% endif %}
        </div>
    </div>
</div>

{{partial(path)}}
