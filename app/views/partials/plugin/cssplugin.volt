{% if config.application.debug %}
{{ stylesheet_link("bootstrap/dist/css/bootstrap.min.css") }}
{% else %}
{{ stylesheet_link("//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css") }}
{% endif %}
