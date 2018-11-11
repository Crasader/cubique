<?php
use Components\Router\Router;

Router::get('/', 'Base:BaseController:index');
Router::get('{lang:(en|zh)}/profile/{username:[\w]*}/{token:[0-9]{12}}/{foo}', 'Base:BaseController:ProfileTest');