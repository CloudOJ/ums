<hr>
<footer>
    <ul class="list-inline">
        {% if this.i18n.locale == "zh-cn" %}
            <li><small>{{this.config.site.name}} 由 CloudOJ v2 强力驱动。</small></li>
        {% endif %}
        {% if this.i18n.locale == "en-us" %}
            <li><small>Powered by CloudOJ v2.</small></li>
        {% endif %}
        <li><small>{{ link_to('about', this.i18n.footer_about) }}</small></li>
        <li><small>{{ link_to('https://github.com/CloudOJ/CloudOJ/issues',
                              this.i18n.footer_feedback) }}</small></li>
        <li><small>{{ link_to('about', this.i18n.footer_term) }}</small></li>
    </ul>
</footer>
