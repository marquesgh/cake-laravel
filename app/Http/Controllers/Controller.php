<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Cake API",
 *      description="A simple API for managing cakes",
 *      @OA\Contact(
 *          email="contact@test.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 *
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Send server response
     *
     * @param array
     * @return Response
     */
    public function sendServerResponse(array|string $response)
    {
        $data = [
            'data' => $response
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Send server error
     *
     * @param Throwable, string, string
     * @return Response
     */
    public function sendServerError($exception, $class = '', $function = '')
    {
        Log::error($class . '::' . $function . ', ' . $exception->getMessage()
            . ' The exception was thrown on line: ' .
            $exception->getLine());
        $error = [
            'error' => trans('common.bad_request')
        ];
        $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        return response()->json($error, $statusCode);
    }
}
