<?php

use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // هنا سنضع منطق معالجة الأخطاء

        // 1. معالجة أخطاء الـ Validation
        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                    'errors' => $e->errors(),
                ], 422);
            }
        });

        // 2. معالجة خطأ "غير مصرح له" (Authentication)
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated.'
                ], 401);
            }
        });

        // 3. معالجة خطأ "لا يملك الصلاحية" (Authorization)
        $exceptions->render(function (AuthorizationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 403);
            }
        });
        
        // 4. معالجة خطأ "لم يتم العثور على الموديل" (مثل product/999)
        $exceptions->render(function (ModelNotFoundException $e, Request $request) {
            if ($request->is('api/*')) {
                $modelName = strtolower(class_basename($e->getModel()));
                return response()->json([
                    'success' => false,
                    'message' => "The requested {$modelName} was not found."
                ], 404);
            }
        });

        // 5. معالجة خطأ "لم يتم العثور على المسار" (Not Found HTTP)
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'The requested endpoint was not found.',
                ], 404);
            }
        });

        // 6. معالجة أي خطأ آخر (خطأ عام 500)
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                // في وضع الإنتاج (production)، لا تعرض تفاصيل الخطأ
                if (!config('app.debug')) {
                    return response()->json([
                        'success' => false,
                        'message' => 'A server error has occurred.',
                    ], 500);
                }

                // في وضع التطوير (local/debug)، اعرض تفاصيل الخطأ للمساعدة
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                    'exception' => get_class($e),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTrace()
                ], 500);
            }
        });


    })->create();
