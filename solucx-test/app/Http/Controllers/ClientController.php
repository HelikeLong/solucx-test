<?php
    namespace App\Http\Controllers;

    use App\Traits\RestActions;

    class ClientController extends Controller {
        private $_model = "App\\Models\\Client";
        use RestActions;
    }
