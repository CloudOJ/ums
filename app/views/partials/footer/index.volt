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

        {% if this.i18n.locale == "zh-cn" %}
            <li><small><a href="?locale=en-us">English</a></small></li>
        {% endif %}
        {% if this.i18n.locale == "en-us" %}
            <li><small><a href="?locale=zh-cn">中文</a></small></li>
        {% endif %}
    </ul>
    <ul class="list-inline">
        {% if this.i18n.locale == "zh-cn" %}
            <li><small>服务器时间 <?=date('Y-m-d H:i:s',time());?></small></li>
            <li><small>页面响应时间 {{this.exetime}}秒</small></li>
            <!--<li><small>语言 {{this.i18n.locale}}</small></li>-->
        {% endif %}
        {% if this.i18n.locale == "en-us" %}
            <li><small>Server Time <?=date('Y-m-d H:i:s',time());?></small></li>
            <li><small>Page Processed in {{this.exetime}}s</small></li>
            <!--<li><small>Language {{this.i18n.locale}}</small></li>-->
        {% endif %}
    </ul>
</footer>
