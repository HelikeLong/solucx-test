<?php
    namespace App\Http\Controllers;

    use App\Traits\RestActions;

    class TransactionController extends Controller {
        private $_model = "App\\Models\\Transaction";
        use RestActions;
    }
