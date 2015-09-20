<hr>
<footer>
    <div class="row">
        <div class="col-sm-6">
            <ul class="list-inline">
                <li><small>{{ link_to('help/view/about', this.i18n.footer_about) }}</small></li>
                <li><small>{{ link_to('help/view/feedback',
                                      this.i18n.footer_feedback) }}</small></li>
                <li><small>{{ link_to('help/view/term', this.i18n.footer_term) }}</small></li>
                <li><small>{{ link_to('help', this.i18n.footer_help) }}</small></li>

                {% if this.i18n.locale == "zh-cn" %}
                    <li><small><a href="?locale=en-us">English</a></small></li>
                {% endif %}
                {% if this.i18n.locale == "en-us" %}
                    <li><small><a href="?locale=zh-cn">中文</a></small></li>
                {% endif %}
            </ul>
            <ul class="list-inline">
                {% if this.i18n.locale == "zh-cn" %}
                <li><small>{{this.config.site.name}} 由 CloudOJ v2 强力驱动。</small></li>
                {% endif %}
                {% if this.i18n.locale == "en-us" %}
                <li><small>Powered by CloudOJ v2.</small></li>
                {% endif %}
            </ul>
        </div>
        <div class="col-sm-6">
            <p><dl class="dl-horizontal">
                {% if this.i18n.locale == "zh-cn" %}
                    <small><dt>服务器时间</dt><dd><?=date('Y-m-d H:i:s',time());?></dd></small>
                    <small><dt>页面响应时间</dt><dd>{{this.exetime}}秒</dd></small>
                    <small><dt>备案信息</dt><dd>{{partial("partials/extra/record")}}</dd></small>
                {% endif %}
                {% if this.i18n.locale == "en-us" %}
                    <small><dt>Server Time </dt><dd><?=date('Y-m-d H:i:s',time());?></dd></small>
                    <small><dt>Page Processed in </dt><dd>{{this.exetime}}s</dd></small>
                    <small><dt>Record</dt><dd>{{partial("partials/extra/record")}}</dd></small>
                {% endif %}
            </dl></p>
        </div>
    </div>
</footer>
