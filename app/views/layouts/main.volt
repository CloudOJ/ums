{{ get_title() }}

{{ partial("partials/nav/index") }}
{{ partial("partials/flash/flash") }}

<div class="container">
    {{ content() }}
    {{ partial("partials/footer/index") }}
</div>

{{partial("partials/extra/stat")}}
