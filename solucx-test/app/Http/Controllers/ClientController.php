<?php
    namespace App\Http\Controllers;

    use App\Traits\RestActions;

    class ClientController extends Controller {
        const Model = "App\\Models\\Client";
        use RestActions;
    }
