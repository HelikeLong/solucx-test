<?php
    namespace App\Http\Controllers;

    use App\Traits\RestActions;

    class StoreController extends Controller {
        private $_model = "App\\Models\\Store";
        use RestActions;
    }
