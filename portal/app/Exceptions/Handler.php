<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;
use function App\Helpers\get_client_ip_address;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $exception) {
            $this->logExceptionToDatabase($exception);
        });
    }
    
    /**
     * Log the exception details into the database.
     * 
     * @param  Throwable  $exception  The exception instance containing the error details.
     * @return void
     */
    public function logExceptionToDatabase(Throwable $exception)
    {
        if (Schema::hasTable('error_logs')) {
            $this->logToDatabase($exception);
        }
    }
    
    /**
     * Log the message into the database.
     * 
     * @param  string  $message  The message containing the error details.
     * @param  string  $context  The context of the error.
     * @return void
     */
    public function logMessageToDatabase(string $message, string $context = "")
    {
        if (Schema::hasTable('error_logs')) {
            $currentRequest = request();
            $url = $currentRequest->fullUrl() ?? "";
            $user = Auth::user();
            $username = $user ? $user->username : 'Guest';
            $ipAddress = get_client_ip_address() ?? "";
            DB::table('error_logs')->insert([
                'message' => $message,
                'level' => 'error',
                'context' => $context,
                'url' => $url,
                'username' => $username, 
                'ip' => $ipAddress, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Log the exception directly into the database.
     * @param Throwable $exception
     * @return void
     */
    private function logToDatabase(Throwable $exception) {
        if (Schema::hasTable('error_logs')) {
            $currentRequest = request();
            $url = $currentRequest->fullUrl() ?? "";
            $user = Auth::user();
            $username = $user ? $user->username : 'Guest';
            $ipAddress = get_client_ip_address() ?? "";
            DB::table('error_logs')->insert([
                'message' => $exception->getMessage(),
                'level' => 'error',
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'url' => $url,
                'username' => $username, 
                'ip' => $ipAddress, 
                'context' => json_encode($exception->getTrace()),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
