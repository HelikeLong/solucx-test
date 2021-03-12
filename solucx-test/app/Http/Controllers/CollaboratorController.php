<?php
    namespace App\Http\Controllers;

    use App\Traits\RestActions;

    class CollaboratorController extends Controller {
        private $_model = "App\\Models\\Collaborator";
        use RestActions;
    }
