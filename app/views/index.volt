<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <meta name="description" content="config.site.name, a simple online judge"/>
        <meta name="author" content="SkyZH, CloudOJ Team"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="renderer" content="webkit"/>
        <meta name="keywords" content="{{config.site.name}}, OI, NOI, NOIP, OJ, Online Judge" />
        <meta name="robots" content="index,follow"/>
    </head>

    <body>
        <div id="pjax-container">
            {{ content() }}
        </div>
    </body>


</html>
