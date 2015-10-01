<div class="top-nav">
    <div class="row">
        {% if not(isIndex) %}
        <ol class="breadcrumb">
            <li><a href="{{url("/")}}">{{i18n.site_name}}</a></li>
            <li><a href="{{url("help")}}">{{i18n.title_help}}</a></li>
            <li class="active" id="help_title_nav"></li>
        </ol>
        {% else %}
        <ol class="breadcrumb">
            <li><a href="{{url("/")}}">{{i18n.site_name}}</a></li>
            <li class="active">{{i18n.title_help}}</li>
        </ol>
        {% endif %}
    </div>
</div>

{{partial(path)}}

<script>
$("#help_title_nav").html($("#help_title").html());
</script>
