{{ get_title() }}

{{ partial("partials/nav/index") }}
{{ partial("partials/flash/flash") }}

<div class="{% if not(viewsetting_removecontainer is defined) %}container{% endif %}">
    {{ content() }}
</div>
<div class="container">
    {{ partial("partials/footer/index") }}
</div>

{{partial("partials/extra/stat")}}
