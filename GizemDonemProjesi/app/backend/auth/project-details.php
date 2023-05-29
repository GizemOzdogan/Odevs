<?php
require_once 'app/backend/core/Init.php';

$query_id = $_GET['id'];

$project = new Project();
$project->find($query_id);
$project = $project->data();

$project_detail = new ProjectDetail();
$project_detail->find($query_id);
$project_detail = $project_detail->data();

$project_images = new ProjectImage();
$project_images->getAll($query_id);
$project_images = $project_images->data();
