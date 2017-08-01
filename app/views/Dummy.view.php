<?php
include_once 'app/Controllers/dummy.php';

echo "ToDo List";
echo '<ul>';

foreach ($dummy as $content)
{
    echo "<li>$content</li>";
}

echo '</ul>';