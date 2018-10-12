<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class FileUploadMiddleware extends Middleware
{
    public function handle(Request $request): Response
    {
        $files = $request->getUploadedFiles();
        if (!empty($files)) {
            $body = $request->getBody();
            foreach ($files as $fieldName => $file) {
                if (isset($file['error'])) {
                    return $this->responder->error(ErrorCode::FILE_UPLOAD_FAILED, $fieldName);
                }
                foreach ($file as $key => $value) {
                    if ($key == 'tmp_nam') {
                        $value = base64_encode(file_get_contents($value));
                    }
                    $body[$fieldName . '_' . $key] = $value;
                }
            }
            $request->setBody($body);
        }
        return $this->next->handle($request);
    }
}
