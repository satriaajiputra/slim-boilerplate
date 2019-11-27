<?php

// load bootstrap app
require __DIR__ . '/../bootstrap/app.php';

// load container
require __DIR__ . '/../bootstrap/container.php';

// includes routes
require __DIR__ . '/../app/routes/admin.php';
require __DIR__ . '/../app/routes/member.php';
require __DIR__ . '/../app/routes/guest.php';

// run the app
$app->run();