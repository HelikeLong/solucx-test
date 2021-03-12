<?php
    namespace App\Http\Controllers;

    use App\Traits\ApiResponser;
    use App\Traits\RestActions;
    use Illuminate\Http\JsonResponse;

    class EvaluationController extends Controller {
        private $_model = "App\\Models\\Evaluation";
        use RestActions, ApiResponser;

        /**
         * @return JsonResponse
         */
        public function all(): JsonResponse
        {
            return $this->successResponse(
                $this->_model::with([
                        'transaction',
                        'transaction.client',
                        'transaction.store',
                        'transaction.collaborator'
                    ])
                    ->get()
            );
        }
    }
