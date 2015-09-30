<hr>
<footer>
    <div class="row">
        <div class="col-lg-8">
            <ul class="list-inline">
                <li>{{ link_to('help/view/about', i18n.footer_about) }}</li>
                <li>{{ link_to('help/view/feedback',
                                      i18n.footer_feedback) }}</li>
                <li>{{ link_to('help/view/term', i18n.footer_term) }}</li>
                <li>{{ link_to('help', i18n.footer_help) }}</li>

                {% if i18n.locale == "zh-cn" %}
                    <li><a class="text-danger" href="?locale=en-us">English</a></li>
                {% endif %}
                {% if i18n.locale == "en-us" %}
                    <li><a class="text-danger" href="?locale=zh-cn">中文</a></li>
                {% endif %}
            </ul>
            <p>
                {% if i18n.locale == "zh-cn" %}
                {{i18n.site_name}} 由 μms 强力驱动。
                {% endif %}
                {% if i18n.locale == "en-us" %}
                Powered by μms.
                {% endif %}
            </p>
        </div>
        <div class="col-lg-4 visible-lg">
            <dl class="dl-horizontal">
                {% if i18n.locale == "zh-cn" %}
                    <dt>服务器时间</dt><dd><?=date('Y-m-d H:i:s',time());?></dd>
                    <dt>页面响应时间</dt><dd>{{this.exetime}}秒</dd>
                    <dt>备案信息</dt><dd>{{partial("partials/extra/record")}}</dd>
                {% endif %}
                {% if i18n.locale == "en-us" %}
                    <dt>Server Time </dt><dd><?=date('Y-m-d H:i:s',time());?></dd>
                    <dt>Page Processed in </dt><dd>{{this.exetime}}s</dd>
                    <dt>Record</dt><dd>{{partial("partials/extra/record")}}</dd>
                {% endif %}
            </dl>
        </div>
    </div>
</footer>
