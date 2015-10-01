<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ partial("partials/plugin/cssplugin") }}

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <meta name="description" content="{{this.config.site.name}}, a user management system."/>
        <meta name="author" content="SkyZH, CloudOJ Team"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="renderer" content="webkit"/>
        <meta name="keywords" content="{{this.config.site.name}}, User Management, User Center" />
        <meta name="robots" content="index,follow"/>
    </head>

    <body lang="{{i18n.lang}}">
        {{ partial("partials/plugin/jsplugin") }}
        <div id="pjax-container">
            {{ content() }}
        </div>
    </body>


</html>
