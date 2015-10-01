{% if config.application.debug %}
{{ javascript_include("jquery/dist/jquery.min.js") }}
{{ javascript_include("bootstrap/dist/js/bootstrap.min.js") }}
{% else %}
{{ javascript_include("//cdn.bootcss.com/jquery/2.1.4/jquery.min.js") }}
{{ javascript_include("//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.js") }}
{% endif %}

<script type="text/javascript" src="{{url("js/utils.js")}}"></script>
