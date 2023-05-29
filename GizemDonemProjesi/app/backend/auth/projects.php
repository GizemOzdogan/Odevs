<?php
require_once 'app/backend/core/Init.php';
$project = new Project();
$project->getAll();
$data = $project->data();
