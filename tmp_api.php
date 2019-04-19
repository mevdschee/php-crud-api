<?php
/**
 * PHP-CRUD-API v2              License: MIT
 * Maurits van der Schee: maurits@vdschee.nl
 * https://github.com/mevdschee/php-crud-api
 **/

namespace Tqdev\PhpCrudApi;

// file: src/Psr/Http/Message/MessageInterface.php

/**
 * HTTP messages consist of requests from a client to a server and responses
 * from a server to a client. This interface defines the methods common to
 * each.
 *
 * Messages are considered immutable; all methods that might change state MUST
 * be implemented such that they retain the internal state of the current
 * message and return an instance that contains the changed state.
 *
 * @link http://www.ietf.org/rfc/rfc7230.txt
 * @link http://www.ietf.org/rfc/rfc7231.txt
 */
interface MessageInterface
{
    /**
     * Retrieves the HTTP protocol version as a string.
     *
     * The string MUST contain only the HTTP version number (e.g., "1.1", "1.0").
     *
     * @return string HTTP protocol version.
     */
    public function getProtocolVersion();

    /**
     * Return an instance with the specified HTTP protocol version.
     *
     * The version string MUST contain only the HTTP version number (e.g.,
     * "1.1", "1.0").
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new protocol version.
     *
     * @param string $version HTTP protocol version
     * @return static
     */
    public function withProtocolVersion($version);

    /**
     * Retrieves all message header values.
     *
     * The keys represent the header name as it will be sent over the wire, and
     * each value is an array of strings associated with the header.
     *
     *     // Represent the headers as a string
     *     foreach ($message->getHeaders() as $name => $values) {
     *         echo $name . ": " . implode(", ", $values);
     *     }
     *
     *     // Emit headers iteratively:
     *     foreach ($message->getHeaders() as $name => $values) {
     *         foreach ($values as $value) {
     *             header(sprintf('%s: %s', $name, $value), false);
     *         }
     *     }
     *
     * While header names are not case-sensitive, getHeaders() will preserve the
     * exact case in which headers were originally specified.
     *
     * @return string[][] Returns an associative array of the message's headers. Each
     *     key MUST be a header name, and each value MUST be an array of strings
     *     for that header.
     */
    public function getHeaders();

    /**
     * Checks if a header exists by the given case-insensitive name.
     *
     * @param string $name Case-insensitive header field name.
     * @return bool Returns true if any header names match the given header
     *     name using a case-insensitive string comparison. Returns false if
     *     no matching header name is found in the message.
     */
    public function hasHeader($name);

    /**
     * Retrieves a message header value by the given case-insensitive name.
     *
     * This method returns an array of all the header values of the given
     * case-insensitive header name.
     *
     * If the header does not appear in the message, this method MUST return an
     * empty array.
     *
     * @param string $name Case-insensitive header field name.
     * @return string[] An array of string values as provided for the given
     *    header. If the header does not appear in the message, this method MUST
     *    return an empty array.
     */
    public function getHeader($name);

    /**
     * Retrieves a comma-separated string of the values for a single header.
     *
     * This method returns all of the header values of the given
     * case-insensitive header name as a string concatenated together using
     * a comma.
     *
     * NOTE: Not all header values may be appropriately represented using
     * comma concatenation. For such headers, use getHeader() instead
     * and supply your own delimiter when concatenating.
     *
     * If the header does not appear in the message, this method MUST return
     * an empty string.
     *
     * @param string $name Case-insensitive header field name.
     * @return string A string of values as provided for the given header
     *    concatenated together using a comma. If the header does not appear in
     *    the message, this method MUST return an empty string.
     */
    public function getHeaderLine($name);

    /**
     * Return an instance with the provided value replacing the specified header.
     *
     * While header names are case-insensitive, the casing of the header will
     * be preserved by this function, and returned from getHeaders().
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new and/or updated header and value.
     *
     * @param string $name Case-insensitive header field name.
     * @param string|string[] $value Header value(s).
     * @return static
     * @throws \InvalidArgumentException for invalid header names or values.
     */
    public function withHeader($name, $value);

    /**
     * Return an instance with the specified header appended with the given value.
     *
     * Existing values for the specified header will be maintained. The new
     * value(s) will be appended to the existing list. If the header did not
     * exist previously, it will be added.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new header and/or value.
     *
     * @param string $name Case-insensitive header field name to add.
     * @param string|string[] $value Header value(s).
     * @return static
     * @throws \InvalidArgumentException for invalid header names or values.
     */
    public function withAddedHeader($name, $value);

    /**
     * Return an instance without the specified header.
     *
     * Header resolution MUST be done without case-sensitivity.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that removes
     * the named header.
     *
     * @param string $name Case-insensitive header field name to remove.
     * @return static
     */
    public function withoutHeader($name);

    /**
     * Gets the body of the message.
     *
     * @return StreamInterface Returns the body as a stream.
     */
    public function getBody();

    /**
     * Return an instance with the specified message body.
     *
     * The body MUST be a StreamInterface object.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return a new instance that has the
     * new body stream.
     *
     * @param StreamInterface $body Body.
     * @return static
     * @throws \InvalidArgumentException When the body is not valid.
     */
    public function withBody(StreamInterface $body);
}

// file: src/Psr/Http/Message/RequestFactoryInterface.php

interface RequestFactoryInterface
{
    /**
     * Create a new request.
     *
     * @param string $method The HTTP method associated with the request.
     * @param UriInterface|string $uri The URI associated with the request. If
     *     the value is a string, the factory MUST create a UriInterface
     *     instance based on it.
     *
     * @return RequestInterface
     */
    public function createRequest(string $method, $uri): RequestInterface;
}

// file: src/Psr/Http/Message/RequestInterface.php

/**
 * Representation of an outgoing, client-side request.
 *
 * Per the HTTP specification, this interface includes properties for
 * each of the following:
 *
 * - Protocol version
 * - HTTP method
 * - URI
 * - Headers
 * - Message body
 *
 * During construction, implementations MUST attempt to set the Host header from
 * a provided URI if no Host header is provided.
 *
 * Requests are considered immutable; all methods that might change state MUST
 * be implemented such that they retain the internal state of the current
 * message and return an instance that contains the changed state.
 */
interface RequestInterface extends MessageInterface
{
    /**
     * Retrieves the message's request target.
     *
     * Retrieves the message's request-target either as it will appear (for
     * clients), as it appeared at request (for servers), or as it was
     * specified for the instance (see withRequestTarget()).
     *
     * In most cases, this will be the origin-form of the composed URI,
     * unless a value was provided to the concrete implementation (see
     * withRequestTarget() below).
     *
     * If no URI is available, and no request-target has been specifically
     * provided, this method MUST return the string "/".
     *
     * @return string
     */
    public function getRequestTarget();

    /**
     * Return an instance with the specific request-target.
     *
     * If the request needs a non-origin-form request-target — e.g., for
     * specifying an absolute-form, authority-form, or asterisk-form —
     * this method may be used to create an instance with the specified
     * request-target, verbatim.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * changed request target.
     *
     * @link http://tools.ietf.org/html/rfc7230#section-5.3 (for the various
     *     request-target forms allowed in request messages)
     * @param mixed $requestTarget
     * @return static
     */
    public function withRequestTarget($requestTarget);

    /**
     * Retrieves the HTTP method of the request.
     *
     * @return string Returns the request method.
     */
    public function getMethod();

    /**
     * Return an instance with the provided HTTP method.
     *
     * While HTTP method names are typically all uppercase characters, HTTP
     * method names are case-sensitive and thus implementations SHOULD NOT
     * modify the given string.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * changed request method.
     *
     * @param string $method Case-sensitive method.
     * @return static
     * @throws \InvalidArgumentException for invalid HTTP methods.
     */
    public function withMethod($method);

    /**
     * Retrieves the URI instance.
     *
     * This method MUST return a UriInterface instance.
     *
     * @link http://tools.ietf.org/html/rfc3986#section-4.3
     * @return UriInterface Returns a UriInterface instance
     *     representing the URI of the request.
     */
    public function getUri();

    /**
     * Returns an instance with the provided URI.
     *
     * This method MUST update the Host header of the returned request by
     * default if the URI contains a host component. If the URI does not
     * contain a host component, any pre-existing Host header MUST be carried
     * over to the returned request.
     *
     * You can opt-in to preserving the original state of the Host header by
     * setting `$preserveHost` to `true`. When `$preserveHost` is set to
     * `true`, this method interacts with the Host header in the following ways:
     *
     * - If the Host header is missing or empty, and the new URI contains
     *   a host component, this method MUST update the Host header in the returned
     *   request.
     * - If the Host header is missing or empty, and the new URI does not contain a
     *   host component, this method MUST NOT update the Host header in the returned
     *   request.
     * - If a Host header is present and non-empty, this method MUST NOT update
     *   the Host header in the returned request.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new UriInterface instance.
     *
     * @link http://tools.ietf.org/html/rfc3986#section-4.3
     * @param UriInterface $uri New request URI to use.
     * @param bool $preserveHost Preserve the original state of the Host header.
     * @return static
     */
    public function withUri(UriInterface $uri, $preserveHost = false);
}

// file: src/Psr/Http/Message/ResponseFactoryInterface.php

interface ResponseFactoryInterface
{
    /**
     * Create a new response.
     *
     * @param int $code HTTP status code; defaults to 200
     * @param string $reasonPhrase Reason phrase to associate with status code
     *     in generated response; if none is provided implementations MAY use
     *     the defaults as suggested in the HTTP specification.
     *
     * @return ResponseInterface
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface;
}

// file: src/Psr/Http/Message/ResponseInterface.php

/**
 * Representation of an outgoing, server-side response.
 *
 * Per the HTTP specification, this interface includes properties for
 * each of the following:
 *
 * - Protocol version
 * - Status code and reason phrase
 * - Headers
 * - Message body
 *
 * Responses are considered immutable; all methods that might change state MUST
 * be implemented such that they retain the internal state of the current
 * message and return an instance that contains the changed state.
 */
interface ResponseInterface extends MessageInterface
{
    /**
     * Gets the response status code.
     *
     * The status code is a 3-digit integer result code of the server's attempt
     * to understand and satisfy the request.
     *
     * @return int Status code.
     */
    public function getStatusCode();

    /**
     * Return an instance with the specified status code and, optionally, reason phrase.
     *
     * If no reason phrase is specified, implementations MAY choose to default
     * to the RFC 7231 or IANA recommended reason phrase for the response's
     * status code.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated status and reason phrase.
     *
     * @link http://tools.ietf.org/html/rfc7231#section-6
     * @link http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @param int $code The 3-digit integer result code to set.
     * @param string $reasonPhrase The reason phrase to use with the
     *     provided status code; if none is provided, implementations MAY
     *     use the defaults as suggested in the HTTP specification.
     * @return static
     * @throws \InvalidArgumentException For invalid status code arguments.
     */
    public function withStatus($code, $reasonPhrase = '');

    /**
     * Gets the response reason phrase associated with the status code.
     *
     * Because a reason phrase is not a required element in a response
     * status line, the reason phrase value MAY be null. Implementations MAY
     * choose to return the default RFC 7231 recommended reason phrase (or those
     * listed in the IANA HTTP Status Code Registry) for the response's
     * status code.
     *
     * @link http://tools.ietf.org/html/rfc7231#section-6
     * @link http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @return string Reason phrase; must return an empty string if none present.
     */
    public function getReasonPhrase();
}

// file: src/Psr/Http/Message/ServerRequestFactoryInterface.php

interface ServerRequestFactoryInterface
{
    /**
     * Create a new server request.
     *
     * Note that server-params are taken precisely as given - no parsing/processing
     * of the given values is performed, and, in particular, no attempt is made to
     * determine the HTTP method or URI, which must be provided explicitly.
     *
     * @param string $method The HTTP method associated with the request.
     * @param UriInterface|string $uri The URI associated with the request. If
     *     the value is a string, the factory MUST create a UriInterface
     *     instance based on it.
     * @param array $serverParams Array of SAPI parameters with which to seed
     *     the generated request instance.
     *
     * @return ServerRequestInterface
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface;
}

// file: src/Psr/Http/Message/ServerRequestInterface.php

/**
 * Representation of an incoming, server-side HTTP request.
 *
 * Per the HTTP specification, this interface includes properties for
 * each of the following:
 *
 * - Protocol version
 * - HTTP method
 * - URI
 * - Headers
 * - Message body
 *
 * Additionally, it encapsulates all data as it has arrived to the
 * application from the CGI and/or PHP environment, including:
 *
 * - The values represented in $_SERVER.
 * - Any cookies provided (generally via $_COOKIE)
 * - Query string arguments (generally via $_GET, or as parsed via parse_str())
 * - Upload files, if any (as represented by $_FILES)
 * - Deserialized body parameters (generally from $_POST)
 *
 * $_SERVER values MUST be treated as immutable, as they represent application
 * state at the time of request; as such, no methods are provided to allow
 * modification of those values. The other values provide such methods, as they
 * can be restored from $_SERVER or the request body, and may need treatment
 * during the application (e.g., body parameters may be deserialized based on
 * content type).
 *
 * Additionally, this interface recognizes the utility of introspecting a
 * request to derive and match additional parameters (e.g., via URI path
 * matching, decrypting cookie values, deserializing non-form-encoded body
 * content, matching authorization headers to users, etc). These parameters
 * are stored in an "attributes" property.
 *
 * Requests are considered immutable; all methods that might change state MUST
 * be implemented such that they retain the internal state of the current
 * message and return an instance that contains the changed state.
 */
interface ServerRequestInterface extends RequestInterface
{
    /**
     * Retrieve server parameters.
     *
     * Retrieves data related to the incoming request environment,
     * typically derived from PHP's $_SERVER superglobal. The data IS NOT
     * REQUIRED to originate from $_SERVER.
     *
     * @return array
     */
    public function getServerParams();

    /**
     * Retrieve cookies.
     *
     * Retrieves cookies sent by the client to the server.
     *
     * The data MUST be compatible with the structure of the $_COOKIE
     * superglobal.
     *
     * @return array
     */
    public function getCookieParams();

    /**
     * Return an instance with the specified cookies.
     *
     * The data IS NOT REQUIRED to come from the $_COOKIE superglobal, but MUST
     * be compatible with the structure of $_COOKIE. Typically, this data will
     * be injected at instantiation.
     *
     * This method MUST NOT update the related Cookie header of the request
     * instance, nor related values in the server params.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated cookie values.
     *
     * @param array $cookies Array of key/value pairs representing cookies.
     * @return static
     */
    public function withCookieParams(array $cookies);

    /**
     * Retrieve query string arguments.
     *
     * Retrieves the deserialized query string arguments, if any.
     *
     * Note: the query params might not be in sync with the URI or server
     * params. If you need to ensure you are only getting the original
     * values, you may need to parse the query string from `getUri()->getQuery()`
     * or from the `QUERY_STRING` server param.
     *
     * @return array
     */
    public function getQueryParams();

    /**
     * Return an instance with the specified query string arguments.
     *
     * These values SHOULD remain immutable over the course of the incoming
     * request. They MAY be injected during instantiation, such as from PHP's
     * $_GET superglobal, or MAY be derived from some other value such as the
     * URI. In cases where the arguments are parsed from the URI, the data
     * MUST be compatible with what PHP's parse_str() would return for
     * purposes of how duplicate query parameters are handled, and how nested
     * sets are handled.
     *
     * Setting query string arguments MUST NOT change the URI stored by the
     * request, nor the values in the server params.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated query string arguments.
     *
     * @param array $query Array of query string arguments, typically from
     *     $_GET.
     * @return static
     */
    public function withQueryParams(array $query);

    /**
     * Retrieve normalized file upload data.
     *
     * This method returns upload metadata in a normalized tree, with each leaf
     * an instance of Psr\Http\Message\UploadedFileInterface.
     *
     * These values MAY be prepared from $_FILES or the message body during
     * instantiation, or MAY be injected via withUploadedFiles().
     *
     * @return array An array tree of UploadedFileInterface instances; an empty
     *     array MUST be returned if no data is present.
     */
    public function getUploadedFiles();

    /**
     * Create a new instance with the specified uploaded files.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated body parameters.
     *
     * @param array $uploadedFiles An array tree of UploadedFileInterface instances.
     * @return static
     * @throws \InvalidArgumentException if an invalid structure is provided.
     */
    public function withUploadedFiles(array $uploadedFiles);

    /**
     * Retrieve any parameters provided in the request body.
     *
     * If the request Content-Type is either application/x-www-form-urlencoded
     * or multipart/form-data, and the request method is POST, this method MUST
     * return the contents of $_POST.
     *
     * Otherwise, this method may return any results of deserializing
     * the request body content; as parsing returns structured content, the
     * potential types MUST be arrays or objects only. A null value indicates
     * the absence of body content.
     *
     * @return null|array|object The deserialized body parameters, if any.
     *     These will typically be an array or object.
     */
    public function getParsedBody();

    /**
     * Return an instance with the specified body parameters.
     *
     * These MAY be injected during instantiation.
     *
     * If the request Content-Type is either application/x-www-form-urlencoded
     * or multipart/form-data, and the request method is POST, use this method
     * ONLY to inject the contents of $_POST.
     *
     * The data IS NOT REQUIRED to come from $_POST, but MUST be the results of
     * deserializing the request body content. Deserialization/parsing returns
     * structured data, and, as such, this method ONLY accepts arrays or objects,
     * or a null value if nothing was available to parse.
     *
     * As an example, if content negotiation determines that the request data
     * is a JSON payload, this method could be used to create a request
     * instance with the deserialized parameters.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated body parameters.
     *
     * @param null|array|object $data The deserialized body data. This will
     *     typically be in an array or object.
     * @return static
     * @throws \InvalidArgumentException if an unsupported argument type is
     *     provided.
     */
    public function withParsedBody($data);

    /**
     * Retrieve attributes derived from the request.
     *
     * The request "attributes" may be used to allow injection of any
     * parameters derived from the request: e.g., the results of path
     * match operations; the results of decrypting cookies; the results of
     * deserializing non-form-encoded message bodies; etc. Attributes
     * will be application and request specific, and CAN be mutable.
     *
     * @return array Attributes derived from the request.
     */
    public function getAttributes();

    /**
     * Retrieve a single derived request attribute.
     *
     * Retrieves a single derived request attribute as described in
     * getAttributes(). If the attribute has not been previously set, returns
     * the default value as provided.
     *
     * This method obviates the need for a hasAttribute() method, as it allows
     * specifying a default value to return if the attribute is not found.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @param mixed $default Default value to return if the attribute does not exist.
     * @return mixed
     */
    public function getAttribute($name, $default = null);

    /**
     * Return an instance with the specified derived request attribute.
     *
     * This method allows setting a single derived request attribute as
     * described in getAttributes().
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated attribute.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @param mixed $value The value of the attribute.
     * @return static
     */
    public function withAttribute($name, $value);

    /**
     * Return an instance that removes the specified derived request attribute.
     *
     * This method allows removing a single derived request attribute as
     * described in getAttributes().
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that removes
     * the attribute.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @return static
     */
    public function withoutAttribute($name);
}

// file: src/Psr/Http/Message/StreamFactoryInterface.php

interface StreamFactoryInterface
{
    /**
     * Create a new stream from a string.
     *
     * The stream SHOULD be created with a temporary resource.
     *
     * @param string $content String content with which to populate the stream.
     *
     * @return StreamInterface
     */
    public function createStream(string $content = ''): StreamInterface;

    /**
     * Create a stream from an existing file.
     *
     * The file MUST be opened using the given mode, which may be any mode
     * supported by the `fopen` function.
     *
     * The `$filename` MAY be any string supported by `fopen()`.
     *
     * @param string $filename Filename or stream URI to use as basis of stream.
     * @param string $mode Mode with which to open the underlying filename/stream.
     *
     * @return StreamInterface
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface;

    /**
     * Create a new stream from an existing resource.
     *
     * The stream MUST be readable and may be writable.
     *
     * @param resource $resource PHP resource to use as basis of stream.
     *
     * @return StreamInterface
     */
    public function createStreamFromResource($resource): StreamInterface;
}

// file: src/Psr/Http/Message/StreamInterface.php

/**
 * Describes a data stream.
 *
 * Typically, an instance will wrap a PHP stream; this interface provides
 * a wrapper around the most common operations, including serialization of
 * the entire stream to a string.
 */
interface StreamInterface
{
    /**
     * Reads all data from the stream into a string, from the beginning to end.
     *
     * This method MUST attempt to seek to the beginning of the stream before
     * reading data and read the stream until the end is reached.
     *
     * Warning: This could attempt to load a large amount of data into memory.
     *
     * This method MUST NOT raise an exception in order to conform with PHP's
     * string casting operations.
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#object.tostring
     * @return string
     */
    public function __toString();

    /**
     * Closes the stream and any underlying resources.
     *
     * @return void
     */
    public function close();

    /**
     * Separates any underlying resources from the stream.
     *
     * After the stream has been detached, the stream is in an unusable state.
     *
     * @return resource|null Underlying PHP stream, if any
     */
    public function detach();

    /**
     * Get the size of the stream if known.
     *
     * @return int|null Returns the size in bytes if known, or null if unknown.
     */
    public function getSize();

    /**
     * Returns the current position of the file read/write pointer
     *
     * @return int Position of the file pointer
     * @throws \RuntimeException on error.
     */
    public function tell();

    /**
     * Returns true if the stream is at the end of the stream.
     *
     * @return bool
     */
    public function eof();

    /**
     * Returns whether or not the stream is seekable.
     *
     * @return bool
     */
    public function isSeekable();

    /**
     * Seek to a position in the stream.
     *
     * @link http://www.php.net/manual/en/function.fseek.php
     * @param int $offset Stream offset
     * @param int $whence Specifies how the cursor position will be calculated
     *     based on the seek offset. Valid values are identical to the built-in
     *     PHP $whence values for `fseek()`.  SEEK_SET: Set position equal to
     *     offset bytes SEEK_CUR: Set position to current location plus offset
     *     SEEK_END: Set position to end-of-stream plus offset.
     * @throws \RuntimeException on failure.
     */
    public function seek($offset, $whence = SEEK_SET);

    /**
     * Seek to the beginning of the stream.
     *
     * If the stream is not seekable, this method will raise an exception;
     * otherwise, it will perform a seek(0).
     *
     * @see seek()
     * @link http://www.php.net/manual/en/function.fseek.php
     * @throws \RuntimeException on failure.
     */
    public function rewind();

    /**
     * Returns whether or not the stream is writable.
     *
     * @return bool
     */
    public function isWritable();

    /**
     * Write data to the stream.
     *
     * @param string $string The string that is to be written.
     * @return int Returns the number of bytes written to the stream.
     * @throws \RuntimeException on failure.
     */
    public function write($string);

    /**
     * Returns whether or not the stream is readable.
     *
     * @return bool
     */
    public function isReadable();

    /**
     * Read data from the stream.
     *
     * @param int $length Read up to $length bytes from the object and return
     *     them. Fewer than $length bytes may be returned if underlying stream
     *     call returns fewer bytes.
     * @return string Returns the data read from the stream, or an empty string
     *     if no bytes are available.
     * @throws \RuntimeException if an error occurs.
     */
    public function read($length);

    /**
     * Returns the remaining contents in a string
     *
     * @return string
     * @throws \RuntimeException if unable to read or an error occurs while
     *     reading.
     */
    public function getContents();

    /**
     * Get stream metadata as an associative array or retrieve a specific key.
     *
     * The keys returned are identical to the keys returned from PHP's
     * stream_get_meta_data() function.
     *
     * @link http://php.net/manual/en/function.stream-get-meta-data.php
     * @param string $key Specific metadata to retrieve.
     * @return array|mixed|null Returns an associative array if no key is
     *     provided. Returns a specific key value if a key is provided and the
     *     value is found, or null if the key is not found.
     */
    public function getMetadata($key = null);
}

// file: src/Psr/Http/Message/UploadedFileFactoryInterface.php

interface UploadedFileFactoryInterface
{
    /**
     * Create a new uploaded file.
     *
     * If a size is not provided it will be determined by checking the size of
     * the file.
     *
     * @see http://php.net/manual/features.file-upload.post-method.php
     * @see http://php.net/manual/features.file-upload.errors.php
     *
     * @param StreamInterface $stream Underlying stream representing the
     *     uploaded file content.
     * @param int $size in bytes
     * @param int $error PHP file upload error
     * @param string $clientFilename Filename as provided by the client, if any.
     * @param string $clientMediaType Media type as provided by the client, if any.
     *
     * @return UploadedFileInterface
     *
     * @throws \InvalidArgumentException If the file resource is not readable.
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface;
}

// file: src/Psr/Http/Message/UploadedFileInterface.php

/**
 * Value object representing a file uploaded through an HTTP request.
 *
 * Instances of this interface are considered immutable; all methods that
 * might change state MUST be implemented such that they retain the internal
 * state of the current instance and return an instance that contains the
 * changed state.
 */
interface UploadedFileInterface
{
    /**
     * Retrieve a stream representing the uploaded file.
     *
     * This method MUST return a StreamInterface instance, representing the
     * uploaded file. The purpose of this method is to allow utilizing native PHP
     * stream functionality to manipulate the file upload, such as
     * stream_copy_to_stream() (though the result will need to be decorated in a
     * native PHP stream wrapper to work with such functions).
     *
     * If the moveTo() method has been called previously, this method MUST raise
     * an exception.
     *
     * @return StreamInterface Stream representation of the uploaded file.
     * @throws \RuntimeException in cases when no stream is available or can be
     *     created.
     */
    public function getStream();

    /**
     * Move the uploaded file to a new location.
     *
     * Use this method as an alternative to move_uploaded_file(). This method is
     * guaranteed to work in both SAPI and non-SAPI environments.
     * Implementations must determine which environment they are in, and use the
     * appropriate method (move_uploaded_file(), rename(), or a stream
     * operation) to perform the operation.
     *
     * $targetPath may be an absolute path, or a relative path. If it is a
     * relative path, resolution should be the same as used by PHP's rename()
     * function.
     *
     * The original file or stream MUST be removed on completion.
     *
     * If this method is called more than once, any subsequent calls MUST raise
     * an exception.
     *
     * When used in an SAPI environment where $_FILES is populated, when writing
     * files via moveTo(), is_uploaded_file() and move_uploaded_file() SHOULD be
     * used to ensure permissions and upload status are verified correctly.
     *
     * If you wish to move to a stream, use getStream(), as SAPI operations
     * cannot guarantee writing to stream destinations.
     *
     * @see http://php.net/is_uploaded_file
     * @see http://php.net/move_uploaded_file
     * @param string $targetPath Path to which to move the uploaded file.
     * @throws \InvalidArgumentException if the $targetPath specified is invalid.
     * @throws \RuntimeException on any error during the move operation, or on
     *     the second or subsequent call to the method.
     */
    public function moveTo($targetPath);
    
    /**
     * Retrieve the file size.
     *
     * Implementations SHOULD return the value stored in the "size" key of
     * the file in the $_FILES array if available, as PHP calculates this based
     * on the actual size transmitted.
     *
     * @return int|null The file size in bytes or null if unknown.
     */
    public function getSize();
    
    /**
     * Retrieve the error associated with the uploaded file.
     *
     * The return value MUST be one of PHP's UPLOAD_ERR_XXX constants.
     *
     * If the file was uploaded successfully, this method MUST return
     * UPLOAD_ERR_OK.
     *
     * Implementations SHOULD return the value stored in the "error" key of
     * the file in the $_FILES array.
     *
     * @see http://php.net/manual/en/features.file-upload.errors.php
     * @return int One of PHP's UPLOAD_ERR_XXX constants.
     */
    public function getError();
    
    /**
     * Retrieve the filename sent by the client.
     *
     * Do not trust the value returned by this method. A client could send
     * a malicious filename with the intention to corrupt or hack your
     * application.
     *
     * Implementations SHOULD return the value stored in the "name" key of
     * the file in the $_FILES array.
     *
     * @return string|null The filename sent by the client or null if none
     *     was provided.
     */
    public function getClientFilename();
    
    /**
     * Retrieve the media type sent by the client.
     *
     * Do not trust the value returned by this method. A client could send
     * a malicious media type with the intention to corrupt or hack your
     * application.
     *
     * Implementations SHOULD return the value stored in the "type" key of
     * the file in the $_FILES array.
     *
     * @return string|null The media type sent by the client or null if none
     *     was provided.
     */
    public function getClientMediaType();
}

// file: src/Psr/Http/Message/UriFactoryInterface.php

interface UriFactoryInterface
{
    /**
     * Create a new URI.
     *
     * @param string $uri
     *
     * @return UriInterface
     *
     * @throws \InvalidArgumentException If the given URI cannot be parsed.
     */
    public function createUri(string $uri = ''): UriInterface;
}

// file: src/Psr/Http/Message/UriInterface.php

/**
 * Value object representing a URI.
 *
 * This interface is meant to represent URIs according to RFC 3986 and to
 * provide methods for most common operations. Additional functionality for
 * working with URIs can be provided on top of the interface or externally.
 * Its primary use is for HTTP requests, but may also be used in other
 * contexts.
 *
 * Instances of this interface are considered immutable; all methods that
 * might change state MUST be implemented such that they retain the internal
 * state of the current instance and return an instance that contains the
 * changed state.
 *
 * Typically the Host header will be also be present in the request message.
 * For server-side requests, the scheme will typically be discoverable in the
 * server parameters.
 *
 * @link http://tools.ietf.org/html/rfc3986 (the URI specification)
 */
interface UriInterface
{
    /**
     * Retrieve the scheme component of the URI.
     *
     * If no scheme is present, this method MUST return an empty string.
     *
     * The value returned MUST be normalized to lowercase, per RFC 3986
     * Section 3.1.
     *
     * The trailing ":" character is not part of the scheme and MUST NOT be
     * added.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-3.1
     * @return string The URI scheme.
     */
    public function getScheme();

    /**
     * Retrieve the authority component of the URI.
     *
     * If no authority information is present, this method MUST return an empty
     * string.
     *
     * The authority syntax of the URI is:
     *
     * <pre>
     * [user-info@]host[:port]
     * </pre>
     *
     * If the port component is not set or is the standard port for the current
     * scheme, it SHOULD NOT be included.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-3.2
     * @return string The URI authority, in "[user-info@]host[:port]" format.
     */
    public function getAuthority();

    /**
     * Retrieve the user information component of the URI.
     *
     * If no user information is present, this method MUST return an empty
     * string.
     *
     * If a user is present in the URI, this will return that value;
     * additionally, if the password is also present, it will be appended to the
     * user value, with a colon (":") separating the values.
     *
     * The trailing "@" character is not part of the user information and MUST
     * NOT be added.
     *
     * @return string The URI user information, in "username[:password]" format.
     */
    public function getUserInfo();

    /**
     * Retrieve the host component of the URI.
     *
     * If no host is present, this method MUST return an empty string.
     *
     * The value returned MUST be normalized to lowercase, per RFC 3986
     * Section 3.2.2.
     *
     * @see http://tools.ietf.org/html/rfc3986#section-3.2.2
     * @return string The URI host.
     */
    public function getHost();

    /**
     * Retrieve the port component of the URI.
     *
     * If a port is present, and it is non-standard for the current scheme,
     * this method MUST return it as an integer. If the port is the standard port
     * used with the current scheme, this method SHOULD return null.
     *
     * If no port is present, and no scheme is present, this method MUST return
     * a null value.
     *
     * If no port is present, but a scheme is present, this method MAY return
     * the standard port for that scheme, but SHOULD return null.
     *
     * @return null|int The URI port.
     */
    public function getPort();

    /**
     * Retrieve the path component of the URI.
     *
     * The path can either be empty or absolute (starting with a slash) or
     * rootless (not starting with a slash). Implementations MUST support all
     * three syntaxes.
     *
     * Normally, the empty path "" and absolute path "/" are considered equal as
     * defined in RFC 7230 Section 2.7.3. But this method MUST NOT automatically
     * do this normalization because in contexts with a trimmed base path, e.g.
     * the front controller, this difference becomes significant. It's the task
     * of the user to handle both "" and "/".
     *
     * The value returned MUST be percent-encoded, but MUST NOT double-encode
     * any characters. To determine what characters to encode, please refer to
     * RFC 3986, Sections 2 and 3.3.
     *
     * As an example, if the value should include a slash ("/") not intended as
     * delimiter between path segments, that value MUST be passed in encoded
     * form (e.g., "%2F") to the instance.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-2
     * @see https://tools.ietf.org/html/rfc3986#section-3.3
     * @return string The URI path.
     */
    public function getPath();

    /**
     * Retrieve the query string of the URI.
     *
     * If no query string is present, this method MUST return an empty string.
     *
     * The leading "?" character is not part of the query and MUST NOT be
     * added.
     *
     * The value returned MUST be percent-encoded, but MUST NOT double-encode
     * any characters. To determine what characters to encode, please refer to
     * RFC 3986, Sections 2 and 3.4.
     *
     * As an example, if a value in a key/value pair of the query string should
     * include an ampersand ("&") not intended as a delimiter between values,
     * that value MUST be passed in encoded form (e.g., "%26") to the instance.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-2
     * @see https://tools.ietf.org/html/rfc3986#section-3.4
     * @return string The URI query string.
     */
    public function getQuery();

    /**
     * Retrieve the fragment component of the URI.
     *
     * If no fragment is present, this method MUST return an empty string.
     *
     * The leading "#" character is not part of the fragment and MUST NOT be
     * added.
     *
     * The value returned MUST be percent-encoded, but MUST NOT double-encode
     * any characters. To determine what characters to encode, please refer to
     * RFC 3986, Sections 2 and 3.5.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-2
     * @see https://tools.ietf.org/html/rfc3986#section-3.5
     * @return string The URI fragment.
     */
    public function getFragment();

    /**
     * Return an instance with the specified scheme.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified scheme.
     *
     * Implementations MUST support the schemes "http" and "https" case
     * insensitively, and MAY accommodate other schemes if required.
     *
     * An empty scheme is equivalent to removing the scheme.
     *
     * @param string $scheme The scheme to use with the new instance.
     * @return static A new instance with the specified scheme.
     * @throws \InvalidArgumentException for invalid or unsupported schemes.
     */
    public function withScheme($scheme);

    /**
     * Return an instance with the specified user information.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified user information.
     *
     * Password is optional, but the user information MUST include the
     * user; an empty string for the user is equivalent to removing user
     * information.
     *
     * @param string $user The user name to use for authority.
     * @param null|string $password The password associated with $user.
     * @return static A new instance with the specified user information.
     */
    public function withUserInfo($user, $password = null);

    /**
     * Return an instance with the specified host.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified host.
     *
     * An empty host value is equivalent to removing the host.
     *
     * @param string $host The hostname to use with the new instance.
     * @return static A new instance with the specified host.
     * @throws \InvalidArgumentException for invalid hostnames.
     */
    public function withHost($host);

    /**
     * Return an instance with the specified port.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified port.
     *
     * Implementations MUST raise an exception for ports outside the
     * established TCP and UDP port ranges.
     *
     * A null value provided for the port is equivalent to removing the port
     * information.
     *
     * @param null|int $port The port to use with the new instance; a null value
     *     removes the port information.
     * @return static A new instance with the specified port.
     * @throws \InvalidArgumentException for invalid ports.
     */
    public function withPort($port);

    /**
     * Return an instance with the specified path.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified path.
     *
     * The path can either be empty or absolute (starting with a slash) or
     * rootless (not starting with a slash). Implementations MUST support all
     * three syntaxes.
     *
     * If the path is intended to be domain-relative rather than path relative then
     * it must begin with a slash ("/"). Paths not starting with a slash ("/")
     * are assumed to be relative to some base path known to the application or
     * consumer.
     *
     * Users can provide both encoded and decoded path characters.
     * Implementations ensure the correct encoding as outlined in getPath().
     *
     * @param string $path The path to use with the new instance.
     * @return static A new instance with the specified path.
     * @throws \InvalidArgumentException for invalid paths.
     */
    public function withPath($path);

    /**
     * Return an instance with the specified query string.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified query string.
     *
     * Users can provide both encoded and decoded query characters.
     * Implementations ensure the correct encoding as outlined in getQuery().
     *
     * An empty query string value is equivalent to removing the query string.
     *
     * @param string $query The query string to use with the new instance.
     * @return static A new instance with the specified query string.
     * @throws \InvalidArgumentException for invalid query strings.
     */
    public function withQuery($query);

    /**
     * Return an instance with the specified URI fragment.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified URI fragment.
     *
     * Users can provide both encoded and decoded fragment characters.
     * Implementations ensure the correct encoding as outlined in getFragment().
     *
     * An empty fragment value is equivalent to removing the fragment.
     *
     * @param string $fragment The fragment to use with the new instance.
     * @return static A new instance with the specified fragment.
     */
    public function withFragment($fragment);

    /**
     * Return the string representation as a URI reference.
     *
     * Depending on which components of the URI are present, the resulting
     * string is either a full URI or relative reference according to RFC 3986,
     * Section 4.1. The method concatenates the various components of the URI,
     * using the appropriate delimiters:
     *
     * - If a scheme is present, it MUST be suffixed by ":".
     * - If an authority is present, it MUST be prefixed by "//".
     * - The path can be concatenated without delimiters. But there are two
     *   cases where the path has to be adjusted to make the URI reference
     *   valid as PHP does not allow to throw an exception in __toString():
     *     - If the path is rootless and an authority is present, the path MUST
     *       be prefixed by "/".
     *     - If the path is starting with more than one "/" and no authority is
     *       present, the starting slashes MUST be reduced to one.
     * - If a query is present, it MUST be prefixed by "?".
     * - If a fragment is present, it MUST be prefixed by "#".
     *
     * @see http://tools.ietf.org/html/rfc3986#section-4.1
     * @return string
     */
    public function __toString();
}

// file: src/Nyholm/Psr7/Factory/HttplugFactory.php

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class HttplugFactory implements MessageFactory, StreamFactory, UriFactory
{
    public function createRequest($method, $uri, array $headers = [], $body = null, $protocolVersion = '1.1')
    {
        return new Request($method, $uri, $headers, $body, $protocolVersion);
    }

    public function createResponse($statusCode = 200, $reasonPhrase = null, array $headers = [], $body = null, $version = '1.1')
    {
        return new Response((int) $statusCode, $headers, $body, $version, $reasonPhrase);
    }

    public function createStream($body = null)
    {
        return Stream::create($body ?? '');
    }

    public function createUri($uri = ''): UriInterface
    {
        if ($uri instanceof UriInterface) {
            return $uri;
        }

        return new Uri($uri);
    }
}

// file: src/Nyholm/Psr7/Factory/Psr17Factory.php

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class Psr17Factory implements RequestFactoryInterface, ResponseFactoryInterface, ServerRequestFactoryInterface, StreamFactoryInterface, UploadedFileFactoryInterface, UriFactoryInterface
{
    public function createRequest(string $method, $uri): RequestInterface
    {
        return new Request($method, $uri);
    }

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        return new Response($code, [], null, '1.1', $reasonPhrase);
    }

    public function createStream(string $content = ''): StreamInterface
    {
        return Stream::create($content);
    }

    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        $resource = @\fopen($filename, $mode);
        if (false === $resource) {
            if ('' === $mode || false === \in_array($mode[0], ['r', 'w', 'a', 'x', 'c'])) {
                throw new \InvalidArgumentException('The mode ' . $mode . ' is invalid.');
            }

            throw new \RuntimeException('The file ' . $filename . ' cannot be opened.');
        }

        return Stream::create($resource);
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return Stream::create($resource);
    }

    public function createUploadedFile(StreamInterface $stream, int $size = null, int $error = \UPLOAD_ERR_OK, string $clientFilename = null, string $clientMediaType = null): UploadedFileInterface
    {
        if (null === $size) {
            $size = $stream->getSize();
        }

        return new UploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }

    public function createUri(string $uri = ''): UriInterface
    {
        return new Uri($uri);
    }

    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        return new ServerRequest($method, $uri, [], null, '1.1', $serverParams);
    }
}

// file: src/Nyholm/Psr7/MessageTrait.php

/**
 * Trait implementing functionality common to requests and responses.
 *
 * @author Michael Dowling and contributors to guzzlehttp/psr7
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 *
 * @internal should not be used outside of Nyholm/Psr7 as it does not fall under our BC promise
 */
trait MessageTrait
{
    /** @var array Map of all registered headers, as original name => array of values */
    private $headers = [];

    /** @var array Map of lowercase header name => original name at registration */
    private $headerNames = [];

    /** @var string */
    private $protocol = '1.1';

    /** @var StreamInterface|null */
    private $stream;

    public function getProtocolVersion(): string
    {
        return $this->protocol;
    }

    public function withProtocolVersion($version): self
    {
        if ($this->protocol === $version) {
            return $this;
        }

        $new = clone $this;
        $new->protocol = $version;

        return $new;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function hasHeader($header): bool
    {
        return isset($this->headerNames[\strtolower($header)]);
    }

    public function getHeader($header): array
    {
        $header = \strtolower($header);
        if (!isset($this->headerNames[$header])) {
            return [];
        }

        $header = $this->headerNames[$header];

        return $this->headers[$header];
    }

    public function getHeaderLine($header): string
    {
        return \implode(', ', $this->getHeader($header));
    }

    public function withHeader($header, $value): self
    {
        $value = $this->validateAndTrimHeader($header, $value);
        $normalized = \strtolower($header);

        $new = clone $this;
        if (isset($new->headerNames[$normalized])) {
            unset($new->headers[$new->headerNames[$normalized]]);
        }
        $new->headerNames[$normalized] = $header;
        $new->headers[$header] = $value;

        return $new;
    }

    public function withAddedHeader($header, $value): self
    {
        if (!\is_string($header) || '' === $header) {
            throw new \InvalidArgumentException('Header name must be an RFC 7230 compatible string.');
        }

        $new = clone $this;
        $new->setHeaders([$header => $value]);

        return $new;
    }

    public function withoutHeader($header): self
    {
        $normalized = \strtolower($header);
        if (!isset($this->headerNames[$normalized])) {
            return $this;
        }

        $header = $this->headerNames[$normalized];
        $new = clone $this;
        unset($new->headers[$header], $new->headerNames[$normalized]);

        return $new;
    }

    public function getBody(): StreamInterface
    {
        if (null === $this->stream) {
            $this->stream = Stream::create('');
        }

        return $this->stream;
    }

    public function withBody(StreamInterface $body): self
    {
        if ($body === $this->stream) {
            return $this;
        }

        $new = clone $this;
        $new->stream = $body;

        return $new;
    }

    private function setHeaders(array $headers): void
    {
        foreach ($headers as $header => $value) {
            $value = $this->validateAndTrimHeader($header, $value);
            $normalized = \strtolower($header);
            if (isset($this->headerNames[$normalized])) {
                $header = $this->headerNames[$normalized];
                $this->headers[$header] = \array_merge($this->headers[$header], $value);
            } else {
                $this->headerNames[$normalized] = $header;
                $this->headers[$header] = $value;
            }
        }
    }

    /**
     * Make sure the header complies with RFC 7230.
     *
     * Header names must be a non-empty string consisting of token characters.
     *
     * Header values must be strings consisting of visible characters with all optional
     * leading and trailing whitespace stripped. This method will always strip such
     * optional whitespace. Note that the method does not allow folding whitespace within
     * the values as this was deprecated for almost all instances by the RFC.
     *
     * header-field = field-name ":" OWS field-value OWS
     * field-name   = 1*( "!" / "#" / "$" / "%" / "&" / "'" / "*" / "+" / "-" / "." / "^"
     *              / "_" / "`" / "|" / "~" / %x30-39 / ( %x41-5A / %x61-7A ) )
     * OWS          = *( SP / HTAB )
     * field-value  = *( ( %x21-7E / %x80-FF ) [ 1*( SP / HTAB ) ( %x21-7E / %x80-FF ) ] )
     *
     * @see https://tools.ietf.org/html/rfc7230#section-3.2.4
     */
    private function validateAndTrimHeader($header, $values): array
    {
        if (!\is_string($header) || 1 !== \preg_match("@^[!#$%&'*+.^_`|~0-9A-Za-z-]+$@", $header)) {
            throw new \InvalidArgumentException('Header name must be an RFC 7230 compatible string.');
        }

        if (!\is_array($values)) {
            if ((!\is_numeric($values) && !\is_string($values)) || 1 !== \preg_match("@^[ \t\x21-\x7E\x80-\xFF]*$@", (string) $values)) {
                throw new \InvalidArgumentException('Header values must be RFC 7230 compatible strings.');
            }

            return [\trim((string) $values, " \t")];
        }

        if (empty($values)) {
            throw new \InvalidArgumentException('Header values must be a string or an array of strings, empty array given.');
        }

        $returnValues = [];
        foreach ($values as $v) {
            if ((!\is_numeric($v) && !\is_string($v)) || 1 !== \preg_match("@^[ \t\x21-\x7E\x80-\xFF]*$@", (string) $v)) {
                throw new \InvalidArgumentException('Header values must be RFC 7230 compatible strings.');
            }

            $returnValues[] = \trim((string) $v, " \t");
        }

        return $returnValues;
    }
}

// file: src/Nyholm/Psr7/Request.php

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class Request implements RequestInterface
{
    use MessageTrait;
    use RequestTrait;

    /**
     * @param string $method HTTP method
     * @param string|UriInterface $uri URI
     * @param array $headers Request headers
     * @param string|resource|StreamInterface|null $body Request body
     * @param string $version Protocol version
     */
    public function __construct(string $method, $uri, array $headers = [], $body = null, string $version = '1.1')
    {
        if (!($uri instanceof UriInterface)) {
            $uri = new Uri((string) $uri);
        }

        $this->method = $method;
        $this->uri = $uri;
        $this->setHeaders($headers);
        $this->protocol = $version;

        if (!$this->hasHeader('Host')) {
            $this->updateHostFromUri();
        }

        if ('' !== $body && null !== $body) {
            $this->stream = Stream::create($body);
        }
    }
}

// file: src/Nyholm/Psr7/RequestTrait.php

/**
 * @author Michael Dowling and contributors to guzzlehttp/psr7
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 *
 * @internal should not be used outside of Nyholm/Psr7 as it does not fall under our BC promise
 */
trait RequestTrait
{
    /** @var string */
    private $method;

    /** @var string|null */
    private $requestTarget;

    /** @var UriInterface|null */
    private $uri;

    public function getRequestTarget(): string
    {
        if (null !== $this->requestTarget) {
            return $this->requestTarget;
        }

        if ('' === $target = $this->uri->getPath()) {
            $target = '/';
        }
        if ('' !== $this->uri->getQuery()) {
            $target .= '?' . $this->uri->getQuery();
        }

        return $target;
    }

    public function withRequestTarget($requestTarget): self
    {
        if (\preg_match('#\s#', $requestTarget)) {
            throw new \InvalidArgumentException('Invalid request target provided; cannot contain whitespace');
        }

        $new = clone $this;
        $new->requestTarget = $requestTarget;

        return $new;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function withMethod($method): self
    {
        if (!\is_string($method)) {
            throw new \InvalidArgumentException('Method must be a string');
        }

        $new = clone $this;
        $new->method = $method;

        return $new;
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function withUri(UriInterface $uri, $preserveHost = false): self
    {
        if ($uri === $this->uri) {
            return $this;
        }

        $new = clone $this;
        $new->uri = $uri;

        if (!$preserveHost || !$this->hasHeader('Host')) {
            $new->updateHostFromUri();
        }

        return $new;
    }

    private function updateHostFromUri(): void
    {
        if ('' === $host = $this->uri->getHost()) {
            return;
        }

        if (null !== ($port = $this->uri->getPort())) {
            $host .= ':' . $port;
        }

        if (isset($this->headerNames['host'])) {
            $header = $this->headerNames['host'];
        } else {
            $this->headerNames['host'] = $header = 'Host';
        }

        $this->headers = [$header => [$host]] + $this->headers;
    }
}

// file: src/Nyholm/Psr7/Response.php

/**
 * @author Michael Dowling and contributors to guzzlehttp/psr7
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class Response implements ResponseInterface
{
    use MessageTrait;

    /** @var array Map of standard HTTP status code/reason phrases */
    private const PHRASES = [
        100 => 'Continue', 101 => 'Switching Protocols', 102 => 'Processing',
        200 => 'OK', 201 => 'Created', 202 => 'Accepted', 203 => 'Non-Authoritative Information', 204 => 'No Content', 205 => 'Reset Content', 206 => 'Partial Content', 207 => 'Multi-status', 208 => 'Already Reported',
        300 => 'Multiple Choices', 301 => 'Moved Permanently', 302 => 'Found', 303 => 'See Other', 304 => 'Not Modified', 305 => 'Use Proxy', 306 => 'Switch Proxy', 307 => 'Temporary Redirect',
        400 => 'Bad Request', 401 => 'Unauthorized', 402 => 'Payment Required', 403 => 'Forbidden', 404 => 'Not Found', 405 => 'Method Not Allowed', 406 => 'Not Acceptable', 407 => 'Proxy Authentication Required', 408 => 'Request Time-out', 409 => 'Conflict', 410 => 'Gone', 411 => 'Length Required', 412 => 'Precondition Failed', 413 => 'Request Entity Too Large', 414 => 'Request-URI Too Large', 415 => 'Unsupported Media Type', 416 => 'Requested range not satisfiable', 417 => 'Expectation Failed', 418 => 'I\'m a teapot', 422 => 'Unprocessable Entity', 423 => 'Locked', 424 => 'Failed Dependency', 425 => 'Unordered Collection', 426 => 'Upgrade Required', 428 => 'Precondition Required', 429 => 'Too Many Requests', 431 => 'Request Header Fields Too Large', 451 => 'Unavailable For Legal Reasons',
        500 => 'Internal Server Error', 501 => 'Not Implemented', 502 => 'Bad Gateway', 503 => 'Service Unavailable', 504 => 'Gateway Time-out', 505 => 'HTTP Version not supported', 506 => 'Variant Also Negotiates', 507 => 'Insufficient Storage', 508 => 'Loop Detected', 511 => 'Network Authentication Required',
    ];

    /** @var string */
    private $reasonPhrase = '';

    /** @var int */
    private $statusCode;

    /**
     * @param int $status Status code
     * @param array $headers Response headers
     * @param string|resource|StreamInterface|null $body Response body
     * @param string $version Protocol version
     * @param string|null $reason Reason phrase (when empty a default will be used based on the status code)
     */
    public function __construct(int $status = 200, array $headers = [], $body = null, string $version = '1.1', string $reason = null)
    {
        if ('' !== $body && null !== $body) {
            $this->stream = Stream::create($body);
        }

        $this->statusCode = $status;
        $this->setHeaders($headers);
        if (null === $reason && isset(self::PHRASES[$this->statusCode])) {
            $this->reasonPhrase = self::PHRASES[$status];
        } else {
            $this->reasonPhrase = $reason;
        }

        $this->protocol = $version;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

    public function withStatus($code, $reasonPhrase = ''): self
    {
        if (!\is_int($code) && !\is_string($code)) {
            throw new \InvalidArgumentException('Status code has to be an integer');
        }

        $code = (int) $code;
        if ($code < 100 || $code > 599) {
            throw new \InvalidArgumentException('Status code has to be an integer between 100 and 599');
        }

        $new = clone $this;
        $new->statusCode = $code;
        if ((null === $reasonPhrase || '' === $reasonPhrase) && isset(self::PHRASES[$new->statusCode])) {
            $reasonPhrase = self::PHRASES[$new->statusCode];
        }
        $new->reasonPhrase = $reasonPhrase;

        return $new;
    }
}

// file: src/Nyholm/Psr7/ServerRequest.php

/**
 * @author Michael Dowling and contributors to guzzlehttp/psr7
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class ServerRequest implements ServerRequestInterface
{
    use MessageTrait;
    use RequestTrait;

    /** @var array */
    private $attributes = [];

    /** @var array */
    private $cookieParams = [];

    /** @var array|object|null */
    private $parsedBody;

    /** @var array */
    private $queryParams = [];

    /** @var array */
    private $serverParams;

    /** @var UploadedFileInterface[] */
    private $uploadedFiles = [];

    /**
     * @param string $method HTTP method
     * @param string|UriInterface $uri URI
     * @param array $headers Request headers
     * @param string|resource|StreamInterface|null $body Request body
     * @param string $version Protocol version
     * @param array $serverParams Typically the $_SERVER superglobal
     */
    public function __construct(string $method, $uri, array $headers = [], $body = null, string $version = '1.1', array $serverParams = [])
    {
        $this->serverParams = $serverParams;

        if (!($uri instanceof UriInterface)) {
            $uri = new Uri((string) $uri);
        }

        $this->method = $method;
        $this->uri = $uri;
        $this->setHeaders($headers);
        $this->protocol = $version;

        if (!$this->hasHeader('Host')) {
            $this->updateHostFromUri();
        }

        if ('' !== $body && null !== $body) {
            $this->stream = Stream::create($body);
        }
    }

    public function getServerParams(): array
    {
        return $this->serverParams;
    }

    public function getUploadedFiles(): array
    {
        return $this->uploadedFiles;
    }

    public function withUploadedFiles(array $uploadedFiles)
    {
        $new = clone $this;
        $new->uploadedFiles = $uploadedFiles;

        return $new;
    }

    public function getCookieParams(): array
    {
        return $this->cookieParams;
    }

    public function withCookieParams(array $cookies)
    {
        $new = clone $this;
        $new->cookieParams = $cookies;

        return $new;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function withQueryParams(array $query)
    {
        $new = clone $this;
        $new->queryParams = $query;

        return $new;
    }

    public function getParsedBody()
    {
        return $this->parsedBody;
    }

    public function withParsedBody($data)
    {
        if (!\is_array($data) && !\is_object($data) && null !== $data) {
            throw new \InvalidArgumentException('First parameter to withParsedBody MUST be object, array or null');
        }

        $new = clone $this;
        $new->parsedBody = $data;

        return $new;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getAttribute($attribute, $default = null)
    {
        if (false === \array_key_exists($attribute, $this->attributes)) {
            return $default;
        }

        return $this->attributes[$attribute];
    }

    public function withAttribute($attribute, $value): self
    {
        $new = clone $this;
        $new->attributes[$attribute] = $value;

        return $new;
    }

    public function withoutAttribute($attribute): self
    {
        if (false === \array_key_exists($attribute, $this->attributes)) {
            return $this;
        }

        $new = clone $this;
        unset($new->attributes[$attribute]);

        return $new;
    }
}

// file: src/Nyholm/Psr7/Stream.php

/**
 * @author Michael Dowling and contributors to guzzlehttp/psr7
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class Stream implements StreamInterface
{
    /** @var resource|null A resource reference */
    private $stream;

    /** @var bool */
    private $seekable;

    /** @var bool */
    private $readable;

    /** @var bool */
    private $writable;

    /** @var array|mixed|void|null */
    private $uri;

    /** @var int|null */
    private $size;

    /** @var array Hash of readable and writable stream types */
    private const READ_WRITE_HASH = [
        'read' => [
            'r' => true, 'w+' => true, 'r+' => true, 'x+' => true, 'c+' => true,
            'rb' => true, 'w+b' => true, 'r+b' => true, 'x+b' => true,
            'c+b' => true, 'rt' => true, 'w+t' => true, 'r+t' => true,
            'x+t' => true, 'c+t' => true, 'a+' => true,
        ],
        'write' => [
            'w' => true, 'w+' => true, 'rw' => true, 'r+' => true, 'x+' => true,
            'c+' => true, 'wb' => true, 'w+b' => true, 'r+b' => true,
            'x+b' => true, 'c+b' => true, 'w+t' => true, 'r+t' => true,
            'x+t' => true, 'c+t' => true, 'a' => true, 'a+' => true,
        ],
    ];

    private function __construct()
    {
    }

    /**
     * Creates a new PSR-7 stream.
     *
     * @param string|resource|StreamInterface $body
     *
     * @return StreamInterface
     *
     * @throws \InvalidArgumentException
     */
    public static function create($body = ''): StreamInterface
    {
        if ($body instanceof StreamInterface) {
            return $body;
        }

        if (\is_string($body)) {
            $resource = \fopen('php://temp', 'rw+');
            \fwrite($resource, $body);
            $body = $resource;
        }

        if (\is_resource($body)) {
            $new = new self();
            $new->stream = $body;
            $meta = \stream_get_meta_data($new->stream);
            $new->seekable = $meta['seekable'];
            $new->readable = isset(self::READ_WRITE_HASH['read'][$meta['mode']]);
            $new->writable = isset(self::READ_WRITE_HASH['write'][$meta['mode']]);
            $new->uri = $new->getMetadata('uri');

            return $new;
        }

        throw new \InvalidArgumentException('First argument to Stream::create() must be a string, resource or StreamInterface.');
    }

    /**
     * Closes the stream when the destructed.
     */
    public function __destruct()
    {
        $this->close();
    }

    public function __toString(): string
    {
        try {
            if ($this->isSeekable()) {
                $this->seek(0);
            }

            return $this->getContents();
        } catch (\Exception $e) {
            return '';
        }
    }

    public function close(): void
    {
        if (isset($this->stream)) {
            if (\is_resource($this->stream)) {
                \fclose($this->stream);
            }
            $this->detach();
        }
    }

    public function detach()
    {
        if (!isset($this->stream)) {
            return null;
        }

        $result = $this->stream;
        unset($this->stream);
        $this->size = $this->uri = null;
        $this->readable = $this->writable = $this->seekable = false;

        return $result;
    }

    public function getSize(): ?int
    {
        if (null !== $this->size) {
            return $this->size;
        }

        if (!isset($this->stream)) {
            return null;
        }

        if ($this->uri) {
            \clearstatcache(true, $this->uri);
        }

        $stats = \fstat($this->stream);
        if (isset($stats['size'])) {
            $this->size = $stats['size'];

            return $this->size;
        }

        return null;
    }

    public function tell(): int
    {
        if (false === $result = \ftell($this->stream)) {
            throw new \RuntimeException('Unable to determine stream position');
        }

        return $result;
    }

    public function eof(): bool
    {
        return !$this->stream || \feof($this->stream);
    }

    public function isSeekable(): bool
    {
        return $this->seekable;
    }

    public function seek($offset, $whence = \SEEK_SET): void
    {
        if (!$this->seekable) {
            throw new \RuntimeException('Stream is not seekable');
        }

        if (-1 === \fseek($this->stream, $offset, $whence)) {
            throw new \RuntimeException('Unable to seek to stream position ' . $offset . ' with whence ' . \var_export($whence, true));
        }
    }

    public function rewind(): void
    {
        $this->seek(0);
    }

    public function isWritable(): bool
    {
        return $this->writable;
    }

    public function write($string): int
    {
        if (!$this->writable) {
            throw new \RuntimeException('Cannot write to a non-writable stream');
        }

        $this->size = null;

        if (false === $result = \fwrite($this->stream, $string)) {
            throw new \RuntimeException('Unable to write to stream');
        }

        return $result;
    }

    public function isReadable(): bool
    {
        return $this->readable;
    }

    public function read($length): string
    {
        if (!$this->readable) {
            throw new \RuntimeException('Cannot read from non-readable stream');
        }

        return \fread($this->stream, $length);
    }

    public function getContents(): string
    {
        if (!isset($this->stream)) {
            throw new \RuntimeException('Unable to read stream contents');
        }

        if (false === $contents = \stream_get_contents($this->stream)) {
            throw new \RuntimeException('Unable to read stream contents');
        }

        return $contents;
    }

    public function getMetadata($key = null)
    {
        if (!isset($this->stream)) {
            return $key ? null : [];
        }

        $meta = \stream_get_meta_data($this->stream);

        if (null === $key) {
            return $meta;
        }

        return $meta[$key] ?? null;
    }
}

// file: src/Nyholm/Psr7/UploadedFile.php

/**
 * @author Michael Dowling and contributors to guzzlehttp/psr7
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class UploadedFile implements UploadedFileInterface
{
    /** @var array */
    private const ERRORS = [
        \UPLOAD_ERR_OK => 1,
        \UPLOAD_ERR_INI_SIZE => 1,
        \UPLOAD_ERR_FORM_SIZE => 1,
        \UPLOAD_ERR_PARTIAL => 1,
        \UPLOAD_ERR_NO_FILE => 1,
        \UPLOAD_ERR_NO_TMP_DIR => 1,
        \UPLOAD_ERR_CANT_WRITE => 1,
        \UPLOAD_ERR_EXTENSION => 1,
    ];

    /** @var string */
    private $clientFilename;

    /** @var string */
    private $clientMediaType;

    /** @var int */
    private $error;

    /** @var string|null */
    private $file;

    /** @var bool */
    private $moved = false;

    /** @var int */
    private $size;

    /** @var StreamInterface|null */
    private $stream;

    /**
     * @param StreamInterface|string|resource $streamOrFile
     * @param int $size
     * @param int $errorStatus
     * @param string|null $clientFilename
     * @param string|null $clientMediaType
     */
    public function __construct($streamOrFile, $size, $errorStatus, $clientFilename = null, $clientMediaType = null)
    {
        if (false === \is_int($errorStatus) || !isset(self::ERRORS[$errorStatus])) {
            throw new \InvalidArgumentException('Upload file error status must be an integer value and one of the "UPLOAD_ERR_*" constants.');
        }

        if (false === \is_int($size)) {
            throw new \InvalidArgumentException('Upload file size must be an integer');
        }

        if (null !== $clientFilename && !\is_string($clientFilename)) {
            throw new \InvalidArgumentException('Upload file client filename must be a string or null');
        }

        if (null !== $clientMediaType && !\is_string($clientMediaType)) {
            throw new \InvalidArgumentException('Upload file client media type must be a string or null');
        }

        $this->error = $errorStatus;
        $this->size = $size;
        $this->clientFilename = $clientFilename;
        $this->clientMediaType = $clientMediaType;

        if (\UPLOAD_ERR_OK === $this->error) {
            if (\is_string($streamOrFile)) {
                $this->file = $streamOrFile;
            } elseif (\is_resource($streamOrFile)) {
                $this->stream = Stream::create($streamOrFile);
            } elseif ($streamOrFile instanceof StreamInterface) {
                $this->stream = $streamOrFile;
            } else {
                throw new \InvalidArgumentException('Invalid stream or file provided for UploadedFile');
            }
        }
    }

    /**
     * @throws \RuntimeException if is moved or not ok
     */
    private function validateActive(): void
    {
        if (\UPLOAD_ERR_OK !== $this->error) {
            throw new \RuntimeException('Cannot retrieve stream due to upload error');
        }

        if ($this->moved) {
            throw new \RuntimeException('Cannot retrieve stream after it has already been moved');
        }
    }

    public function getStream(): StreamInterface
    {
        $this->validateActive();

        if ($this->stream instanceof StreamInterface) {
            return $this->stream;
        }

        $resource = \fopen($this->file, 'r');

        return Stream::create($resource);
    }

    public function moveTo($targetPath): void
    {
        $this->validateActive();

        if (!\is_string($targetPath) || '' === $targetPath) {
            throw new \InvalidArgumentException('Invalid path provided for move operation; must be a non-empty string');
        }

        if (null !== $this->file) {
            $this->moved = 'cli' === \PHP_SAPI ? \rename($this->file, $targetPath) : \move_uploaded_file($this->file, $targetPath);
        } else {
            $stream = $this->getStream();
            if ($stream->isSeekable()) {
                $stream->rewind();
            }

            $dest = Stream::create(\fopen($targetPath, 'w'));
            while (!$stream->eof()) {
                if (!$dest->write($stream->read(1048576))) {
                    break;
                }
            }

            $this->moved = true;
        }

        if (false === $this->moved) {
            throw new \RuntimeException(\sprintf('Uploaded file could not be moved to %s', $targetPath));
        }
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getError(): int
    {
        return $this->error;
    }

    public function getClientFilename(): ?string
    {
        return $this->clientFilename;
    }

    public function getClientMediaType(): ?string
    {
        return $this->clientMediaType;
    }
}

// file: src/Nyholm/Psr7/Uri.php

/**
 * PSR-7 URI implementation.
 *
 * @author Michael Dowling
 * @author Tobias Schultze
 * @author Matthew Weier O'Phinney
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class Uri implements UriInterface
{
    private const SCHEMES = ['http' => 80, 'https' => 443];

    private const CHAR_UNRESERVED = 'a-zA-Z0-9_\-\.~';

    private const CHAR_SUB_DELIMS = '!\$&\'\(\)\*\+,;=';

    /** @var string Uri scheme. */
    private $scheme = '';

    /** @var string Uri user info. */
    private $userInfo = '';

    /** @var string Uri host. */
    private $host = '';

    /** @var int|null Uri port. */
    private $port;

    /** @var string Uri path. */
    private $path = '';

    /** @var string Uri query string. */
    private $query = '';

    /** @var string Uri fragment. */
    private $fragment = '';

    public function __construct(string $uri = '')
    {
        if ('' !== $uri) {
            if (false === $parts = \parse_url($uri)) {
                throw new \InvalidArgumentException("Unable to parse URI: $uri");
            }

            $this->scheme = isset($parts['scheme']) ? \strtolower($parts['scheme']) : '';
            $this->userInfo = $parts['user'] ?? '';
            $this->host = isset($parts['host']) ? \strtolower($parts['host']) : '';
            $this->port = isset($parts['port']) ? $this->filterPort($parts['port']) : null;
            $this->path = isset($parts['path']) ? $this->filterPath($parts['path']) : '';
            $this->query = isset($parts['query']) ? $this->filterQueryAndFragment($parts['query']) : '';
            $this->fragment = isset($parts['fragment']) ? $this->filterQueryAndFragment($parts['fragment']) : '';
            if (isset($parts['pass'])) {
                $this->userInfo .= ':' . $parts['pass'];
            }
        }
    }

    public function __toString(): string
    {
        return self::createUriString($this->scheme, $this->getAuthority(), $this->path, $this->query, $this->fragment);
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getAuthority(): string
    {
        if ('' === $this->host) {
            return '';
        }

        $authority = $this->host;
        if ('' !== $this->userInfo) {
            $authority = $this->userInfo . '@' . $authority;
        }

        if (null !== $this->port) {
            $authority .= ':' . $this->port;
        }

        return $authority;
    }

    public function getUserInfo(): string
    {
        return $this->userInfo;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getFragment(): string
    {
        return $this->fragment;
    }

    public function withScheme($scheme): self
    {
        if (!\is_string($scheme)) {
            throw new \InvalidArgumentException('Scheme must be a string');
        }

        if ($this->scheme === $scheme = \strtolower($scheme)) {
            return $this;
        }

        $new = clone $this;
        $new->scheme = $scheme;
        $new->port = $new->filterPort($new->port);

        return $new;
    }

    public function withUserInfo($user, $password = null): self
    {
        $info = $user;
        if (null !== $password && '' !== $password) {
            $info .= ':' . $password;
        }

        if ($this->userInfo === $info) {
            return $this;
        }

        $new = clone $this;
        $new->userInfo = $info;

        return $new;
    }

    public function withHost($host): self
    {
        if (!\is_string($host)) {
            throw new \InvalidArgumentException('Host must be a string');
        }

        if ($this->host === $host = \strtolower($host)) {
            return $this;
        }

        $new = clone $this;
        $new->host = $host;

        return $new;
    }

    public function withPort($port): self
    {
        if ($this->port === $port = $this->filterPort($port)) {
            return $this;
        }

        $new = clone $this;
        $new->port = $port;

        return $new;
    }

    public function withPath($path): self
    {
        if ($this->path === $path = $this->filterPath($path)) {
            return $this;
        }

        $new = clone $this;
        $new->path = $path;

        return $new;
    }

    public function withQuery($query): self
    {
        if ($this->query === $query = $this->filterQueryAndFragment($query)) {
            return $this;
        }

        $new = clone $this;
        $new->query = $query;

        return $new;
    }

    public function withFragment($fragment): self
    {
        if ($this->fragment === $fragment = $this->filterQueryAndFragment($fragment)) {
            return $this;
        }

        $new = clone $this;
        $new->fragment = $fragment;

        return $new;
    }

    /**
     * Create a URI string from its various parts.
     */
    private static function createUriString(string $scheme, string $authority, string $path, string $query, string $fragment): string
    {
        $uri = '';
        if ('' !== $scheme) {
            $uri .= $scheme . ':';
        }

        if ('' !== $authority) {
            $uri .= '//' . $authority;
        }

        if ('' !== $path) {
            if ('/' !== $path[0]) {
                if ('' !== $authority) {
                    $path = '/' . $path;
                }
            } elseif (isset($path[1]) && '/' === $path[1]) {
                if ('' === $authority) {
                    $path = '/' . \ltrim($path, '/');
                }
            }

            $uri .= $path;
        }

        if ('' !== $query) {
            $uri .= '?' . $query;
        }

        if ('' !== $fragment) {
            $uri .= '#' . $fragment;
        }

        return $uri;
    }

    /**
     * Is a given port non-standard for the current scheme?
     */
    private static function isNonStandardPort(string $scheme, int $port): bool
    {
        return !isset(self::SCHEMES[$scheme]) || $port !== self::SCHEMES[$scheme];
    }

    private function filterPort($port): ?int
    {
        if (null === $port) {
            return null;
        }

        $port = (int) $port;
        if (1 > $port || 0xffff < $port) {
            throw new \InvalidArgumentException(\sprintf('Invalid port: %d. Must be between 1 and 65535', $port));
        }

        return self::isNonStandardPort($this->scheme, $port) ? $port : null;
    }

    private function filterPath($path): string
    {
        if (!\is_string($path)) {
            throw new \InvalidArgumentException('Path must be a string');
        }

        return \preg_replace_callback('/(?:[^' . self::CHAR_UNRESERVED . self::CHAR_SUB_DELIMS . '%:@\/]++|%(?![A-Fa-f0-9]{2}))/', [__CLASS__, 'rawurlencodeMatchZero'], $path);
    }

    private function filterQueryAndFragment($str): string
    {
        if (!\is_string($str)) {
            throw new \InvalidArgumentException('Query and fragment must be a string');
        }

        return \preg_replace_callback('/(?:[^' . self::CHAR_UNRESERVED . self::CHAR_SUB_DELIMS . '%:@\/\?]++|%(?![A-Fa-f0-9]{2}))/', [__CLASS__, 'rawurlencodeMatchZero'], $str);
    }

    private static function rawurlencodeMatchZero(array $match): string
    {
        return \rawurlencode($match[0]);
    }
}

// file: src/Nyholm/Psr7Server/ServerRequestCreator.php

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
final class ServerRequestCreator implements ServerRequestCreatorInterface
{
    private $serverRequestFactory;

    private $uriFactory;

    private $uploadedFileFactory;

    private $streamFactory;

    public function __construct(
        ServerRequestFactoryInterface $serverRequestFactory,
        UriFactoryInterface $uriFactory,
        UploadedFileFactoryInterface $uploadedFileFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->serverRequestFactory = $serverRequestFactory;
        $this->uriFactory = $uriFactory;
        $this->uploadedFileFactory = $uploadedFileFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function fromGlobals(): ServerRequestInterface
    {
        $server = $_SERVER;
        if (false === isset($server['REQUEST_METHOD'])) {
            $server['REQUEST_METHOD'] = 'GET';
        }

        $headers = \function_exists('getallheaders') ? getallheaders() : static::getHeadersFromServer($_SERVER);

        return $this->fromArrays($server, $headers, $_COOKIE, $_GET, $_POST, $_FILES, \fopen('php://input', 'r') ?: null);
    }

    /**
     * {@inheritdoc}
     */
    public function fromArrays(array $server, array $headers = [], array $cookie = [], array $get = [], array $post = [], array $files = [], $body = null): ServerRequestInterface
    {
        $method = $this->getMethodFromEnv($server);
        $uri = $this->getUriFromEnvWithHTTP($server);
        $protocol = isset($server['SERVER_PROTOCOL']) ? \str_replace('HTTP/', '', $server['SERVER_PROTOCOL']) : '1.1';

        $serverRequest = $this->serverRequestFactory->createServerRequest($method, $uri, $server);
        foreach ($headers as $name => $value) {
            $serverRequest = $serverRequest->withAddedHeader($name, $value);
        }

        $serverRequest = $serverRequest
            ->withProtocolVersion($protocol)
            ->withCookieParams($cookie)
            ->withQueryParams($get)
            ->withParsedBody($post)
            ->withUploadedFiles($this->normalizeFiles($files));

        if (null === $body) {
            return $serverRequest;
        }

        if (\is_resource($body)) {
            $body = $this->streamFactory->createStreamFromResource($body);
        } elseif (\is_string($body)) {
            $body = $this->streamFactory->createStream($body);
        } elseif (!$body instanceof StreamInterface) {
            throw new \InvalidArgumentException('The $body parameter to ServerRequestCreator::fromArrays must be string, resource or StreamInterface');
        }

        return $serverRequest->withBody($body);
    }

    /**
     * Implementation from Zend\Diactoros\marshalHeadersFromSapi().
     */
    public static function getHeadersFromServer(array $server): array
    {
        $headers = [];
        foreach ($server as $key => $value) {
            if (0 === \strpos($key, 'REDIRECT_')) {
                $key = \substr($key, 9);

                if (\array_key_exists($key, $server)) {
                    continue;
                }
            }

            if ($value && 0 === \strpos($key, 'HTTP_')) {
                $name = \strtr(\strtolower(\substr($key, 5)), '_', '-');
                $headers[$name] = $value;

                continue;
            }

            if ($value && 0 === \strpos($key, 'CONTENT_')) {
                $name = 'content-'.\strtolower(\substr($key, 8));
                $headers[$name] = $value;

                continue;
            }
        }

        return $headers;
    }

    private function getMethodFromEnv(array $environment): string
    {
        if (false === isset($environment['REQUEST_METHOD'])) {
            throw new \InvalidArgumentException('Cannot determine HTTP method');
        }

        return $environment['REQUEST_METHOD'];
    }

    private function getUriFromEnvWithHTTP(array $environment): UriInterface
    {
        $uri = $this->createUriFromArray($environment);
        if (empty($uri->getScheme())) {
            $uri = $uri->withScheme('http');
        }

        return $uri;
    }

    /**
     * Return an UploadedFile instance array.
     *
     * @param array $files A array which respect $_FILES structure
     *
     * @return UploadedFileInterface[]
     *
     * @throws \InvalidArgumentException for unrecognized values
     */
    private function normalizeFiles(array $files): array
    {
        $normalized = [];

        foreach ($files as $key => $value) {
            if ($value instanceof UploadedFileInterface) {
                $normalized[$key] = $value;
            } elseif (\is_array($value) && isset($value['tmp_name'])) {
                $normalized[$key] = $this->createUploadedFileFromSpec($value);
            } elseif (\is_array($value)) {
                $normalized[$key] = $this->normalizeFiles($value);
            } else {
                throw new \InvalidArgumentException('Invalid value in files specification');
            }
        }

        return $normalized;
    }

    /**
     * Create and return an UploadedFile instance from a $_FILES specification.
     *
     * If the specification represents an array of values, this method will
     * delegate to normalizeNestedFileSpec() and return that return value.
     *
     * @param array $value $_FILES struct
     *
     * @return array|UploadedFileInterface
     */
    private function createUploadedFileFromSpec(array $value)
    {
        if (\is_array($value['tmp_name'])) {
            return $this->normalizeNestedFileSpec($value);
        }

        try {
            $stream = $this->streamFactory->createStreamFromFile($value['tmp_name']);
        } catch (\RuntimeException $e) {
            $stream = $this->streamFactory->createStream();
        }

        return $this->uploadedFileFactory->createUploadedFile(
            $stream,
            (int) $value['size'],
            (int) $value['error'],
            $value['name'],
            $value['type']
        );
    }

    /**
     * Normalize an array of file specifications.
     *
     * Loops through all nested files and returns a normalized array of
     * UploadedFileInterface instances.
     *
     * @param array $files
     *
     * @return UploadedFileInterface[]
     */
    private function normalizeNestedFileSpec(array $files = []): array
    {
        $normalizedFiles = [];

        foreach (\array_keys($files['tmp_name']) as $key) {
            $spec = [
                'tmp_name' => $files['tmp_name'][$key],
                'size' => $files['size'][$key],
                'error' => $files['error'][$key],
                'name' => $files['name'][$key],
                'type' => $files['type'][$key],
            ];
            $normalizedFiles[$key] = $this->createUploadedFileFromSpec($spec);
        }

        return $normalizedFiles;
    }

    /**
     * Create a new uri from server variable.
     *
     * @param array $server typically $_SERVER or similar structure
     */
    private function createUriFromArray(array $server): UriInterface
    {
        $uri = $this->uriFactory->createUri('');

        if (isset($server['REQUEST_SCHEME'])) {
            $uri = $uri->withScheme($server['REQUEST_SCHEME']);
        } elseif (isset($server['HTTPS'])) {
            $uri = $uri->withScheme('on' === $server['HTTPS'] ? 'https' : 'http');
        }

        if (isset($server['SERVER_PORT'])) {
            $uri = $uri->withPort($server['SERVER_PORT']);
        }

        if (isset($server['HTTP_HOST'])) {
            if (1 === \preg_match('/^(.+)\:(\d+)$/', $server['HTTP_HOST'], $matches)) {
                $uri = $uri->withHost($matches[1])->withPort($matches[2]);
            } else {
                $uri = $uri->withHost($server['HTTP_HOST']);
            }
        } elseif (isset($server['SERVER_NAME'])) {
            $uri = $uri->withHost($server['SERVER_NAME']);
        }

        if (isset($server['REQUEST_URI'])) {
            $uri = $uri->withPath(\current(\explode('?', $server['REQUEST_URI'])));
        }

        if (isset($server['QUERY_STRING'])) {
            $uri = $uri->withQuery($server['QUERY_STRING']);
        }

        return $uri;
    }
}

// file: src/Nyholm/Psr7Server/ServerRequestCreatorInterface.php

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 */
interface ServerRequestCreatorInterface
{
    /**
     * Create a new server request from the current environment variables.
     * Defaults to a GET request to minimise the risk of an \InvalidArgumentException.
     * Includes the current request headers as supplied by the server through `getallheaders()`.
     * If `getallheaders()` is unavailable on the current server it will fallback to its own `getHeadersFromServer()` method.
     * Defaults to php://input for the request body.
     *
     * @throws \InvalidArgumentException if no valid method or URI can be determined
     */
    public function fromGlobals(): ServerRequestInterface;

    /**
     * Create a new server request from a set of arrays.
     *
     * @param array                                $server  typically $_SERVER or similar structure
     * @param array                                $headers typically the output of getallheaders() or similar structure
     * @param array                                $cookie  typically $_COOKIE or similar structure
     * @param array                                $get     typically $_GET or similar structure
     * @param array                                $post    typically $_POST or similar structure
     * @param array                                $files   typically $_FILES or similar structure
     * @param StreamInterface|resource|string|null $body    Typically stdIn
     *
     * @throws \InvalidArgumentException if no valid method or URI can be determined
     */
    public function fromArrays(
        array $server,
        array $headers = [],
        array $cookie = [],
        array $get = [],
        array $post = [],
        array $files = [],
        $body = null
    ): ServerRequestInterface;

    /**
     * Get parsed headers from ($_SERVER) array.
     *
     * @param array $server typically $_SERVER or similar structure
     *
     * @return array
     */
    public static function getHeadersFromServer(array $server): array;
}

// file: src/Tqdev/PhpCrudApi/Cache/Cache.php

interface Cache
{
    public function set(String $key, String $value, int $ttl = 0): bool;
    public function get(String $key): String;
    public function clear(): bool;
}

// file: src/Tqdev/PhpCrudApi/Cache/CacheFactory.php

class CacheFactory
{
    const PREFIX = 'phpcrudapi-%s-%s-%s-';

    private static function getPrefix(Config $config): String
    {
        $driver = $config->getDriver();
        $database = $config->getDatabase();
        $filehash = substr(md5(__FILE__), 0, 8);
        return sprintf(self::PREFIX, $driver, $database, $filehash);
    }

    public static function create(Config $config): Cache
    {
        switch ($config->getCacheType()) {
            case 'TempFile':
                $cache = new TempFileCache(self::getPrefix($config), $config->getCachePath());
                break;
            case 'Redis':
                $cache = new RedisCache(self::getPrefix($config), $config->getCachePath());
                break;
            case 'Memcache':
                $cache = new MemcacheCache(self::getPrefix($config), $config->getCachePath());
                break;
            case 'Memcached':
                $cache = new MemcachedCache(self::getPrefix($config), $config->getCachePath());
                break;
            default:
                $cache = new NoCache();
        }
        return $cache;
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/MemcacheCache.php

class MemcacheCache implements Cache
{
    protected $prefix;
    protected $memcache;

    public function __construct(String $prefix, String $config)
    {
        $this->prefix = $prefix;
        if ($config == '') {
            $address = 'localhost';
            $port = 11211;
        } elseif (strpos($config, ':') === false) {
            $address = $config;
            $port = 11211;
        } else {
            list($address, $port) = explode(':', $config);
        }
        $this->memcache = $this->create();
        $this->memcache->addServer($address, $port);
    }

    protected function create() /*: \Memcache*/
    {
        return new \Memcache();
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return $this->memcache->set($this->prefix . $key, $value, 0, $ttl);
    }

    public function get(String $key): String
    {
        return $this->memcache->get($this->prefix . $key) ?: '';
    }

    public function clear(): bool
    {
        return $this->memcache->flush();
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/MemcachedCache.php

class MemcachedCache extends MemcacheCache
{
    protected function create() /*: \Memcached*/
    {
        return new \Memcached();
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return $this->memcache->set($this->prefix . $key, $value, $ttl);
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/NoCache.php

class NoCache implements Cache
{
    public function __construct()
    {
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return true;
    }

    public function get(String $key): String
    {
        return '';
    }

    public function clear(): bool
    {
        return true;
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/RedisCache.php

class RedisCache implements Cache
{
    protected $prefix;
    protected $redis;

    public function __construct(String $prefix, String $config)
    {
        $this->prefix = $prefix;
        if ($config == '') {
            $config = '127.0.0.1';
        }
        $params = explode(':', $config, 6);
        if (isset($params[3])) {
            $params[3] = null;
        }
        $this->redis = new \Redis();
        call_user_func_array(array($this->redis, 'pconnect'), $params);
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return $this->redis->set($this->prefix . $key, $value, $ttl);
    }

    public function get(String $key): String
    {
        return $this->redis->get($this->prefix . $key) ?: '';
    }

    public function clear(): bool
    {
        return $this->redis->flushDb();
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/TempFileCache.php

class TempFileCache implements Cache
{
    const SUFFIX = 'cache';

    private $path;
    private $segments;

    public function __construct(String $prefix, String $config)
    {
        $this->segments = [];
        $s = DIRECTORY_SEPARATOR;
        $ps = PATH_SEPARATOR;
        if ($config == '') {
            $this->path = sys_get_temp_dir() . $s . $prefix . self::SUFFIX;
        } elseif (strpos($config, $ps) === false) {
            $this->path = $config;
        } else {
            list($path, $segments) = explode($ps, $config);
            $this->path = $path;
            $this->segments = explode(',', $segments);
        }
        if (file_exists($this->path) && is_dir($this->path)) {
            $this->clean($this->path, array_filter($this->segments), strlen(md5('')), false);
        }
    }

    private function getFileName(String $key): String
    {
        $s = DIRECTORY_SEPARATOR;
        $md5 = md5($key);
        $filename = rtrim($this->path, $s) . $s;
        $i = 0;
        foreach ($this->segments as $segment) {
            $filename .= substr($md5, $i, $segment) . $s;
            $i += $segment;
        }
        $filename .= substr($md5, $i);
        return $filename;
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        $filename = $this->getFileName($key);
        $dirname = dirname($filename);
        if (!file_exists($dirname)) {
            if (!mkdir($dirname, 0755, true)) {
                return false;
            }
        }
        $string = $ttl . '|' . $value;
        return $this->filePutContents($filename, $string) !== false;
    }

    private function filePutContents($filename, $string)
    {
        return file_put_contents($filename, $string, LOCK_EX);
    }

    private function fileGetContents($filename)
    {
        $file = fopen($filename, 'rb');
        if ($file === false) {
            return false;
        }
        $lock = flock($file, LOCK_SH);
        if (!$lock) {
            fclose($file);
            return false;
        }
        $string = '';
        while (!feof($file)) {
            $string .= fread($file, 8192);
        }
        flock($file, LOCK_UN);
        fclose($file);
        return $string;
    }

    private function getString($filename): String
    {
        $data = $this->fileGetContents($filename);
        if ($data === false) {
            return '';
        }
        list($ttl, $string) = explode('|', $data, 2);
        if ($ttl > 0 && time() - filemtime($filename) > $ttl) {
            return '';
        }
        return $string;
    }

    public function get(String $key): String
    {
        $filename = $this->getFileName($key);
        if (!file_exists($filename)) {
            return '';
        }
        $string = $this->getString($filename);
        if ($string == null) {
            return '';
        }
        return $string;
    }

    private function clean(String $path, array $segments, int $len, bool $all) /*: void*/
    {
        $entries = scandir($path);
        foreach ($entries as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            $filename = $path . DIRECTORY_SEPARATOR . $entry;
            if (count($segments) == 0) {
                if (strlen($entry) != $len) {
                    continue;
                }
                if (is_file($filename)) {
                    if ($all || $this->getString($filename) == null) {
                        unlink($filename);
                    }
                }
            } else {
                if (strlen($entry) != $segments[0]) {
                    continue;
                }
                if (is_dir($filename)) {
                    $this->clean($filename, array_slice($segments, 1), $len - $segments[0], $all);
                    rmdir($filename);
                }
            }
        }
    }

    public function clear(): bool
    {
        if (!file_exists($this->path) || !is_dir($this->path)) {
            return false;
        }
        $this->clean($this->path, array_filter($this->segments), strlen(md5('')), true);
        return true;
    }
}

// file: src/Tqdev/PhpCrudApi/Column/Reflection/ReflectedColumn.php

class ReflectedColumn implements \JsonSerializable
{
    const DEFAULT_LENGTH = 255;
    const DEFAULT_PRECISION = 19;
    const DEFAULT_SCALE = 4;

    private $name;
    private $type;
    private $length;
    private $precision;
    private $scale;
    private $nullable;
    private $pk;
    private $fk;

    public function __construct(String $name, String $type, int $length, int $precision, int $scale, bool $nullable, bool $pk, String $fk)
    {
        $this->name = $name;
        $this->type = $type;
        $this->length = $length;
        $this->precision = $precision;
        $this->scale = $scale;
        $this->nullable = $nullable;
        $this->pk = $pk;
        $this->fk = $fk;
        $this->sanitize();
    }

    public static function fromReflection(GenericReflection $reflection, array $columnResult): ReflectedColumn
    {
        $name = $columnResult['COLUMN_NAME'];
        $length = (int) $columnResult['CHARACTER_MAXIMUM_LENGTH'];
        $type = $reflection->toJdbcType($columnResult['DATA_TYPE'], $length);
        $precision = (int) $columnResult['NUMERIC_PRECISION'];
        $scale = (int) $columnResult['NUMERIC_SCALE'];
        $nullable = in_array(strtoupper($columnResult['IS_NULLABLE']), ['TRUE', 'YES', 'T', 'Y', '1']);
        $pk = false;
        $fk = '';
        return new ReflectedColumn($name, $type, $length, $precision, $scale, $nullable, $pk, $fk);
    }

    public static function fromJson( /* object */$json): ReflectedColumn
    {
        $name = $json->name;
        $type = $json->type;
        $length = isset($json->length) ? $json->length : 0;
        $precision = isset($json->precision) ? $json->precision : 0;
        $scale = isset($json->scale) ? $json->scale : 0;
        $nullable = isset($json->nullable) ? $json->nullable : false;
        $pk = isset($json->pk) ? $json->pk : false;
        $fk = isset($json->fk) ? $json->fk : '';
        return new ReflectedColumn($name, $type, $length, $precision, $scale, $nullable, $pk, $fk);
    }

    private function sanitize()
    {
        $this->length = $this->hasLength() ? $this->getLength() : 0;
        $this->precision = $this->hasPrecision() ? $this->getPrecision() : 0;
        $this->scale = $this->hasScale() ? $this->getScale() : 0;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getNullable(): bool
    {
        return $this->nullable;
    }

    public function getType(): String
    {
        return $this->type;
    }

    public function getLength(): int
    {
        return $this->length ?: self::DEFAULT_LENGTH;
    }

    public function getPrecision(): int
    {
        return $this->precision ?: self::DEFAULT_PRECISION;
    }

    public function getScale(): int
    {
        return $this->scale ?: self::DEFAULT_SCALE;
    }

    public function hasLength(): bool
    {
        return in_array($this->type, ['varchar', 'varbinary']);
    }

    public function hasPrecision(): bool
    {
        return $this->type == 'decimal';
    }

    public function hasScale(): bool
    {
        return $this->type == 'decimal';
    }

    public function isBinary(): bool
    {
        return in_array($this->type, ['blob', 'varbinary']);
    }

    public function isBoolean(): bool
    {
        return $this->type == 'boolean';
    }

    public function isGeometry(): bool
    {
        return $this->type == 'geometry';
    }

    public function isInteger(): bool
    {
        return in_array($this->type, ['integer', 'bigint', 'smallint', 'tinyint']);
    }

    public function setPk($value) /*: void*/
    {
        $this->pk = $value;
    }

    public function getPk(): bool
    {
        return $this->pk;
    }

    public function setFk($value) /*: void*/
    {
        $this->fk = $value;
    }

    public function getFk(): String
    {
        return $this->fk;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'length' => $this->length,
            'precision' => $this->precision,
            'scale' => $this->scale,
            'nullable' => $this->nullable,
            'pk' => $this->pk,
            'fk' => $this->fk,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize());
    }
}

// file: src/Tqdev/PhpCrudApi/Column/Reflection/ReflectedDatabase.php

class ReflectedDatabase implements \JsonSerializable
{
    private $tableTypes;

    public function __construct(array $tableTypes)
    {
        $this->tableTypes = $tableTypes;
    }

    public static function fromReflection(GenericReflection $reflection): ReflectedDatabase
    {
        $tableTypes = [];
        foreach ($reflection->getTables() as $table) {
            $tableName = $table['TABLE_NAME'];
            $tableType = $table['TABLE_TYPE'];
            if (in_array($tableName, $reflection->getIgnoredTables())) {
                continue;
            }
            $tableTypes[$tableName] = $tableType;
        }
        return new ReflectedDatabase($tableTypes);
    }

    public static function fromJson( /* object */$json): ReflectedDatabase
    {
        $tableTypes = (array) $json->tables;
        return new ReflectedDatabase($tableTypes);
    }

    public function hasTable(String $tableName): bool
    {
        return isset($this->tableTypes[$tableName]);
    }

    public function getType(String $tableName): String
    {
        return isset($this->tableTypes[$tableName]) ? $this->tableTypes[$tableName] : '';
    }

    public function getTableNames(): array
    {
        return array_keys($this->tableTypes);
    }

    public function removeTable(String $tableName): bool
    {
        if (!isset($this->tableTypes[$tableName])) {
            return false;
        }
        unset($this->tableTypes[$tableName]);
        return true;
    }

    public function serialize()
    {
        return [
            'tables' => $this->tableTypes,
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}

// file: src/Tqdev/PhpCrudApi/Column/Reflection/ReflectedTable.php

class ReflectedTable implements \JsonSerializable
{
    private $name;
    private $type;
    private $columns;
    private $pk;
    private $fks;

    public function __construct(String $name, String $type, array $columns)
    {
        $this->name = $name;
        $this->type = $type;
        $this->columns = [];
        foreach ($columns as $column) {
            $columnName = $column->getName();
            $this->columns[$columnName] = $column;
        }
        $this->pk = null;
        foreach ($columns as $column) {
            if ($column->getPk() == true) {
                $this->pk = $column;
            }
        }
        $this->fks = [];
        foreach ($columns as $column) {
            $columnName = $column->getName();
            $referencedTableName = $column->getFk();
            if ($referencedTableName != '') {
                $this->fks[$columnName] = $referencedTableName;
            }
        }
    }

    public static function fromReflection(GenericReflection $reflection, String $name, String $type): ReflectedTable
    {
        $columns = [];
        foreach ($reflection->getTableColumns($name, $type) as $tableColumn) {
            $column = ReflectedColumn::fromReflection($reflection, $tableColumn);
            $columns[$column->getName()] = $column;
        }
        $columnNames = $reflection->getTablePrimaryKeys($name);
        if (count($columnNames) == 1) {
            $columnName = $columnNames[0];
            if (isset($columns[$columnName])) {
                $pk = $columns[$columnName];
                $pk->setPk(true);
            }
        }
        $fks = $reflection->getTableForeignKeys($name);
        foreach ($fks as $columnName => $table) {
            $columns[$columnName]->setFk($table);
        }
        return new ReflectedTable($name, $type, array_values($columns));
    }

    public static function fromJson( /* object */$json): ReflectedTable
    {
        $name = $json->name;
        $type = $json->type;
        $columns = [];
        if (isset($json->columns) && is_array($json->columns)) {
            foreach ($json->columns as $column) {
                $columns[] = ReflectedColumn::fromJson($column);
            }
        }
        return new ReflectedTable($name, $type, $columns);
    }

    public function hasColumn(String $columnName): bool
    {
        return isset($this->columns[$columnName]);
    }

    public function hasPk(): bool
    {
        return $this->pk != null;
    }

    public function getPk() /*: ?ReflectedColumn */
    {
        return $this->pk;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getType(): String
    {
        return $this->type;
    }

    public function getColumnNames(): array
    {
        return array_keys($this->columns);
    }

    public function getColumn($columnName): ReflectedColumn
    {
        return $this->columns[$columnName];
    }

    public function getFksTo(String $tableName): array
    {
        $columns = array();
        foreach ($this->fks as $columnName => $referencedTableName) {
            if ($tableName == $referencedTableName) {
                $columns[] = $this->columns[$columnName];
            }
        }
        return $columns;
    }

    public function removeColumn(String $columnName): bool
    {
        if (!isset($this->columns[$columnName])) {
            return false;
        }
        unset($this->columns[$columnName]);
        return true;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'columns' => array_values($this->columns),
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}

// file: src/Tqdev/PhpCrudApi/Column/DefinitionService.php

class DefinitionService
{
    private $db;
    private $reflection;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->reflection = $reflection;
    }

    public function updateTable(String $tableName, /* object */ $changes): bool
    {
        $table = $this->reflection->getTable($tableName);
        $newTable = ReflectedTable::fromJson((object) array_merge((array) $table->jsonSerialize(), (array) $changes));
        if ($table->getName() != $newTable->getName()) {
            if (!$this->db->definition()->renameTable($table->getName(), $newTable->getName())) {
                return false;
            }
        }
        return true;
    }

    public function updateColumn(String $tableName, String $columnName, /* object */ $changes): bool
    {
        $table = $this->reflection->getTable($tableName);
        $column = $table->getColumn($columnName);

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getPk() != $column->getPk() && $table->hasPk()) {
            $oldColumn = $table->getPk();
            if ($oldColumn->getName() != $columnName) {
                $oldColumn->setPk(false);
                if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $oldColumn->getName(), $oldColumn)) {
                    return false;
                }
            }
        }

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), ['pk' => false, 'fk' => false]));
        if ($newColumn->getPk() != $column->getPk() && !$newColumn->getPk()) {
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getFk() != $column->getFk() && !$newColumn->getFk()) {
            if (!$this->db->definition()->removeColumnForeignKey($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        $newColumn->setPk(false);
        $newColumn->setFk('');
        if ($newColumn->getName() != $column->getName()) {
            if (!$this->db->definition()->renameColumn($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getType() != $column->getType() ||
            $newColumn->getLength() != $column->getLength() ||
            $newColumn->getPrecision() != $column->getPrecision() ||
            $newColumn->getScale() != $column->getScale()
        ) {
            if (!$this->db->definition()->retypeColumn($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getNullable() != $column->getNullable()) {
            if (!$this->db->definition()->setColumnNullable($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function addTable( /* object */$definition)
    {
        $newTable = ReflectedTable::fromJson($definition);
        if (!$this->db->definition()->addTable($newTable)) {
            return false;
        }
        return true;
    }

    public function addColumn(String $tableName, /* object */ $definition)
    {
        $newColumn = ReflectedColumn::fromJson($definition);
        if (!$this->db->definition()->addColumn($tableName, $newColumn)) {
            return false;
        }
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($tableName, $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($tableName, $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function removeTable(String $tableName)
    {
        if (!$this->db->definition()->removeTable($tableName)) {
            return false;
        }
        return true;
    }

    public function removeColumn(String $tableName, String $columnName)
    {
        $table = $this->reflection->getTable($tableName);
        $newColumn = $table->getColumn($columnName);
        if ($newColumn->getPk()) {
            $newColumn->setPk(false);
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getFk()) {
            $newColumn->setFk("");
            if (!$this->db->definition()->removeColumnForeignKey($tableName, $columnName, $newColumn)) {
                return false;
            }
        }
        if (!$this->db->definition()->removeColumn($tableName, $columnName)) {
            return false;
        }
        return true;
    }

}

// file: src/Tqdev/PhpCrudApi/Column/ReflectionService.php

class ReflectionService
{
    private $db;
    private $cache;
    private $ttl;
    private $database;
    private $tables;

    public function __construct(GenericDB $db, Cache $cache, int $ttl)
    {
        $this->db = $db;
        $this->cache = $cache;
        $this->ttl = $ttl;
        $this->database = $this->loadDatabase(true);
        $this->tables = [];
    }

    private function loadDatabase(bool $useCache): ReflectedDatabase
    {
        $data = $useCache ? $this->cache->get('ReflectedDatabase') : '';
        if ($data != '') {
            $database = ReflectedDatabase::fromJson(json_decode(gzuncompress($data)));
        } else {
            $database = ReflectedDatabase::fromReflection($this->db->reflection());
            $data = gzcompress(json_encode($database, JSON_UNESCAPED_UNICODE));
            $this->cache->set('ReflectedDatabase', $data, $this->ttl);
        }
        return $database;
    }

    private function loadTable(String $tableName, bool $useCache): ReflectedTable
    {
        $data = $useCache ? $this->cache->get("ReflectedTable($tableName)") : '';
        if ($data != '') {
            $table = ReflectedTable::fromJson(json_decode(gzuncompress($data)));
        } else {
            $tableType = $this->database->getType($tableName);
            $table = ReflectedTable::fromReflection($this->db->reflection(), $tableName, $tableType);
            $data = gzcompress(json_encode($table, JSON_UNESCAPED_UNICODE));
            $this->cache->set("ReflectedTable($tableName)", $data, $this->ttl);
        }
        return $table;
    }

    public function refreshTables()
    {
        $this->database = $this->loadDatabase(false);
    }

    public function refreshTable(String $tableName)
    {
        $this->tables[$tableName] = $this->loadTable($tableName, false);
    }

    public function hasTable(String $tableName): bool
    {
        return $this->database->hasTable($tableName);
    }

    public function getType(String $tableName): String
    {
        return $this->database->getType($tableName);
    }

    public function getTable(String $tableName): ReflectedTable
    {
        if (!isset($this->tables[$tableName])) {
            $this->tables[$tableName] = $this->loadTable($tableName, true);
        }
        return $this->tables[$tableName];
    }

    public function getTableNames(): array
    {
        return $this->database->getTableNames();
    }

    public function getDatabaseName(): String
    {
        return $this->database->getName();
    }

    public function removeTable(String $tableName): bool
    {
        unset($this->tables[$tableName]);
        return $this->database->removeTable($tableName);
    }

}

// file: src/Tqdev/PhpCrudApi/Controller/CacheController.php

class CacheController
{
    private $cache;
    private $responder;

    public function __construct(Router $router, Responder $responder, Cache $cache)
    {
        $router->register('GET', '/cache/clear', array($this, 'clear'));
        $this->cache = $cache;
        $this->responder = $responder;
    }

    public function clear(ServerRequestInterface $request): Response
    {
        return $this->responder->success($this->cache->clear());
    }

}

// file: src/Tqdev/PhpCrudApi/Controller/ColumnController.php

class ColumnController
{
    private $responder;
    private $reflection;
    private $definition;
    private $utils;

    public function __construct(Router $router, Responder $responder, ReflectionService $reflection, DefinitionService $definition)
    {
        $router->register('GET', '/columns', array($this, 'getDatabase'));
        $router->register('GET', '/columns/*', array($this, 'getTable'));
        $router->register('GET', '/columns/*/*', array($this, 'getColumn'));
        $router->register('PUT', '/columns/*', array($this, 'updateTable'));
        $router->register('PUT', '/columns/*/*', array($this, 'updateColumn'));
        $router->register('POST', '/columns', array($this, 'addTable'));
        $router->register('POST', '/columns/*', array($this, 'addColumn'));
        $router->register('DELETE', '/columns/*', array($this, 'removeTable'));
        $router->register('DELETE', '/columns/*/*', array($this, 'removeColumn'));
        $this->responder = $responder;
        $this->reflection = $reflection;
        $this->definition = $definition;
        $this->utils = new RequestUtils($reflection);
    }

    public function getDatabase(ServerRequestInterface $request): Response
    {
        $tables = [];
        foreach ($this->reflection->getTableNames() as $table) {
            $tables[] = $this->reflection->getTable($table);
        }
        $database = ['tables' => $tables];
        return $this->responder->success($database);
    }

    public function getTable(ServerRequestInterface $request): Response
    {
        $tableName = $this->utils->getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        return $this->responder->success($table);
    }

    public function getColumn(ServerRequestInterface $request): Response
    {
        $tableName = $this->utils->getPathSegment($request, 2);
        $columnName = $this->utils->getPathSegment($request, 3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $column = $table->getColumn($columnName);
        return $this->responder->success($column);
    }

    public function updateTable(ServerRequestInterface $request): Response
    {
        $tableName = $this->utils->getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->updateTable($tableName, $request->getBody());
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function updateColumn(ServerRequestInterface $request): Response
    {
        $tableName = $this->utils->getPathSegment($request, 2);
        $columnName = $this->utils->getPathSegment($request, 3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->updateColumn($tableName, $columnName, $request->getBody());
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }

    public function addTable(ServerRequestInterface $request): Response
    {
        $tableName = $request->getBody()->name;
        if ($this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_ALREADY_EXISTS, $tableName);
        }
        $success = $this->definition->addTable($request->getBody());
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function addColumn(ServerRequestInterface $request): Response
    {
        $tableName = $this->utils->getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $columnName = $request->getBody()->name;
        $table = $this->reflection->getTable($tableName);
        if ($table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_ALREADY_EXISTS, $columnName);
        }
        $success = $this->definition->addColumn($tableName, $request->getBody());
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }

    public function removeTable(ServerRequestInterface $request): Response
    {
        $tableName = $this->utils->getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->removeTable($tableName);
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function removeColumn(ServerRequestInterface $request): Response
    {
        $tableName = $this->utils->getPathSegment($request, 2);
        $columnName = $this->utils->getPathSegment($request, 3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->removeColumn($tableName, $columnName);
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }
}

// file: src/Tqdev/PhpCrudApi/Controller/OpenApiController.php

class OpenApiController
{
    private $openApi;
    private $responder;

    public function __construct(Router $router, Responder $responder, OpenApiService $openApi)
    {
        $router->register('GET', '/openapi', array($this, 'openapi'));
        $this->openApi = $openApi;
        $this->responder = $responder;
    }

    public function openapi(ServerRequestInterface $request): Response
    {
        return $this->responder->success($this->openApi->get());
    }

}

// file: src/Tqdev/PhpCrudApi/Controller/RecordController.php

class RecordController
{
    private $service;
    private $responder;

    public function __construct(Router $router, Responder $responder, ReflectionService $reflection, RecordService $service)
    {
        $router->register('GET', '/records/*', array($this, '_list'));
        $router->register('POST', '/records/*', array($this, 'create'));
        $router->register('GET', '/records/*/*', array($this, 'read'));
        $router->register('PUT', '/records/*/*', array($this, 'update'));
        $router->register('DELETE', '/records/*/*', array($this, 'delete'));
        $router->register('PATCH', '/records/*/*', array($this, 'increment'));
        $this->service = $service;
        $this->responder = $responder;
        $this->utils = new RequestUtils($reflection);
    }

    public function _list(ServerRequestInterface $request): Response
    {
        $table = $this->utils->getPathSegment($request, 2);
        $params = $this->utils->getParams($request);
        if (!$this->service->hasTable($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        return $this->responder->success($this->service->_list($table, $params));
    }

    public function read(ServerRequestInterface $request): Response
    {
        $table = $this->utils->getPathSegment($request, 2);
        if (!$this->service->hasTable($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        if ($this->service->getType($table) != 'table') {
            return $this->responder->error(ErrorCode::OPERATION_NOT_SUPPORTED, __FUNCTION__);
        }
        $id = $this->utils->getPathSegment($request, 3);
        $params = $this->utils->getParams($request);
        if (strpos($id, ',') !== false) {
            $ids = explode(',', $id);
            $result = [];
            for ($i = 0; $i < count($ids); $i++) {
                array_push($result, $this->service->read($table, $ids[$i], $params));
            }
            return $this->responder->success($result);
        } else {
            $response = $this->service->read($table, $id, $params);
            if ($response === null) {
                return $this->responder->error(ErrorCode::RECORD_NOT_FOUND, $id);
            }
            return $this->responder->success($response);
        }
    }

    public function create(ServerRequestInterface $request): Response
    {
        $table = $this->utils->getPathSegment($request, 2);
        if (!$this->service->hasTable($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        if ($this->service->getType($table) != 'table') {
            return $this->responder->error(ErrorCode::OPERATION_NOT_SUPPORTED, __FUNCTION__);
        }
        $record = $request->getBody();
        if ($record === null) {
            return $this->responder->error(ErrorCode::HTTP_MESSAGE_NOT_READABLE, '');
        }
        $params = $this->utils->getParams($request);
        if (is_array($record)) {
            $result = array();
            foreach ($record as $r) {
                $result[] = $this->service->create($table, $r, $params);
            }
            return $this->responder->success($result);
        } else {
            return $this->responder->success($this->service->create($table, $record, $params));
        }
    }

    public function update(ServerRequestInterface $request): Response
    {
        $table = $this->utils->getPathSegment($request, 2);
        if (!$this->service->hasTable($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        if ($this->service->getType($table) != 'table') {
            return $this->responder->error(ErrorCode::OPERATION_NOT_SUPPORTED, __FUNCTION__);
        }
        $id = $this->utils->getPathSegment($request, 3);
        $params = $this->utils->getParams($request);
        $record = $request->getBody();
        if ($record === null) {
            return $this->responder->error(ErrorCode::HTTP_MESSAGE_NOT_READABLE, '');
        }
        $ids = explode(',', $id);
        if (is_array($record)) {
            if (count($ids) != count($record)) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            $result = array();
            for ($i = 0; $i < count($ids); $i++) {
                $result[] = $this->service->update($table, $ids[$i], $record[$i], $params);
            }
            return $this->responder->success($result);
        } else {
            if (count($ids) != 1) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            return $this->responder->success($this->service->update($table, $id, $record, $params));
        }
    }

    public function delete(ServerRequestInterface $request): Response
    {
        $table = $this->utils->getPathSegment($request, 2);
        if (!$this->service->hasTable($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        if ($this->service->getType($table) != 'table') {
            return $this->responder->error(ErrorCode::OPERATION_NOT_SUPPORTED, __FUNCTION__);
        }
        $id = $this->utils->getPathSegment($request, 3);
        $params = $this->utils->getParams($request);
        $ids = explode(',', $id);
        if (count($ids) > 1) {
            $result = array();
            for ($i = 0; $i < count($ids); $i++) {
                $result[] = $this->service->delete($table, $ids[$i], $params);
            }
            return $this->responder->success($result);
        } else {
            return $this->responder->success($this->service->delete($table, $id, $params));
        }
    }

    public function increment(ServerRequestInterface $request): Response
    {
        $table = $this->utils->getPathSegment($request, 2);
        if (!$this->service->hasTable($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        if ($this->service->getType($table) != 'table') {
            return $this->responder->error(ErrorCode::OPERATION_NOT_SUPPORTED, __FUNCTION__);
        }
        $id = $this->utils->getPathSegment($request, 3);
        $record = $request->getBody();
        if ($record === null) {
            return $this->responder->error(ErrorCode::HTTP_MESSAGE_NOT_READABLE, '');
        }
        $params = $this->utils->getParams($request);
        $ids = explode(',', $id);
        if (is_array($record)) {
            if (count($ids) != count($record)) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            $result = array();
            for ($i = 0; $i < count($ids); $i++) {
                $result[] = $this->service->increment($table, $ids[$i], $record[$i], $params);
            }
            return $this->responder->success($result);
        } else {
            if (count($ids) != 1) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            return $this->responder->success($this->service->increment($table, $id, $record, $params));
        }
    }

}

// file: src/Tqdev/PhpCrudApi/Controller/Responder.php

class Responder
{
    public function error(int $error, String $argument, $details = null): Response
    {
        $errorCode = new ErrorCode($error);
        $status = $errorCode->getStatus();
        $document = new ErrorDocument($errorCode, $argument, $details);
        return new Response($status, $document);
    }

    public function success($result): Response
    {
        return new Response(Response::OK, $result);
    }

}

// file: src/Tqdev/PhpCrudApi/Database/ColumnConverter.php

class ColumnConverter
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    public function convertColumnValue(ReflectedColumn $column): String
    {
        if ($column->isBinary()) {
            switch ($this->driver) {
                case 'mysql':
                    return "FROM_BASE64(?)";
                case 'pgsql':
                    return "decode(?, 'base64')";
                case 'sqlsrv':
                    return "CONVERT(XML, ?).value('.','varbinary(max)')";
            }
        }
        if ($column->isGeometry()) {
            switch ($this->driver) {
                case 'mysql':
                case 'pgsql':
                    return "ST_GeomFromText(?)";
                case 'sqlsrv':
                    return "geometry::STGeomFromText(?,0)";
            }
        }
        return '?';
    }

    public function convertColumnName(ReflectedColumn $column, $value): String
    {
        if ($column->isBinary()) {
            switch ($this->driver) {
                case 'mysql':
                    return "TO_BASE64($value) as $value";
                case 'pgsql':
                    return "encode($value::bytea, 'base64') as $value";
                case 'sqlsrv':
                    return "CASE WHEN $value IS NULL THEN NULL ELSE (SELECT CAST($value as varbinary(max)) FOR XML PATH(''), BINARY BASE64) END as $value";

            }
        }
        if ($column->isGeometry()) {
            switch ($this->driver) {
                case 'mysql':
                case 'pgsql':
                    return "ST_AsText($value) as $value";
                case 'sqlsrv':
                    return "REPLACE($value.STAsText(),' (','(') as $value";
            }
        }
        return $value;
    }

}

// file: src/Tqdev/PhpCrudApi/Database/ColumnsBuilder.php

class ColumnsBuilder
{
    private $driver;
    private $converter;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
        $this->converter = new ColumnConverter($driver);
    }

    public function getOffsetLimit(int $offset, int $limit): String
    {
        if ($limit < 0 || $offset < 0) {
            return '';
        }
        switch ($this->driver) {
            case 'mysql':return " LIMIT $offset, $limit";
            case 'pgsql':return " LIMIT $limit OFFSET $offset";
            case 'sqlsrv':return " OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
        }
    }

    private function quoteColumnName(ReflectedColumn $column): String
    {
        return '"' . $column->getName() . '"';
    }

    public function getOrderBy(ReflectedTable $table, array $columnOrdering): String
    {
        if (count($columnOrdering)==0) {
            return '';
        }
        $results = array();
        foreach ($columnOrdering as $i => list($columnName, $ordering)) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $results[] = $quotedColumnName . ' ' . $ordering;
        }
        return ' ORDER BY '.implode(',', $results);
    }

    public function getSelect(ReflectedTable $table, array $columnNames): String
    {
        $results = array();
        foreach ($columnNames as $columnName) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $quotedColumnName = $this->converter->convertColumnName($column, $quotedColumnName);
            $results[] = $quotedColumnName;
        }
        return implode(',', $results);
    }

    public function getInsert(ReflectedTable $table, array $columnValues): String
    {
        $columns = array();
        $values = array();
        foreach ($columnValues as $columnName => $columnValue) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columns[] = $quotedColumnName;
            $columnValue = $this->converter->convertColumnValue($column);
            $values[] = $columnValue;
        }
        $columnsSql = '(' . implode(',', $columns) . ')';
        $valuesSql = '(' . implode(',', $values) . ')';
        $outputColumn = $this->quoteColumnName($table->getPk());
        switch ($this->driver) {
            case 'mysql':return "$columnsSql VALUES $valuesSql";
            case 'pgsql':return "$columnsSql VALUES $valuesSql RETURNING $outputColumn";
            case 'sqlsrv':return "$columnsSql OUTPUT INSERTED.$outputColumn VALUES $valuesSql";
        }
    }

    public function getUpdate(ReflectedTable $table, array $columnValues): String
    {
        $results = array();
        foreach ($columnValues as $columnName => $columnValue) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columnValue = $this->converter->convertColumnValue($column);
            $results[] = $quotedColumnName . '=' . $columnValue;
        }
        return implode(',', $results);
    }

    public function getIncrement(ReflectedTable $table, array $columnValues): String
    {
        $results = array();
        foreach ($columnValues as $columnName => $columnValue) {
            if (!is_numeric($columnValue)) {
                continue;
            }
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columnValue = $this->converter->convertColumnValue($column);
            $results[] = $quotedColumnName . '=' . $quotedColumnName . '+' . $columnValue;
        }
        return implode(',', $results);
    }

}

// file: src/Tqdev/PhpCrudApi/Database/ConditionsBuilder.php

class ConditionsBuilder
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    private function getConditionSql(Condition $condition, array &$arguments): String
    {
        if ($condition instanceof AndCondition) {
            return $this->getAndConditionSql($condition, $arguments);
        }
        if ($condition instanceof OrCondition) {
            return $this->getOrConditionSql($condition, $arguments);
        }
        if ($condition instanceof NotCondition) {
            return $this->getNotConditionSql($condition, $arguments);
        }
        if ($condition instanceof SpatialCondition) {
            return $this->getSpatialConditionSql($condition, $arguments);
        }
        if ($condition instanceof ColumnCondition) {
            return $this->getColumnConditionSql($condition, $arguments);
        }
        throw new \Exception('Unknown Condition: ' . get_class($condition));
    }

    private function getAndConditionSql(AndCondition $and, array &$arguments): String
    {
        $parts = [];
        foreach ($and->getConditions() as $condition) {
            $parts[] = $this->getConditionSql($condition, $arguments);
        }
        return '(' . implode(' AND ', $parts) . ')';
    }

    private function getOrConditionSql(OrCondition $or, array &$arguments): String
    {
        $parts = [];
        foreach ($or->getConditions() as $condition) {
            $parts[] = $this->getConditionSql($condition, $arguments);
        }
        return '(' . implode(' OR ', $parts) . ')';
    }

    private function getNotConditionSql(NotCondition $not, array &$arguments): String
    {
        $condition = $not->getCondition();
        return '(NOT ' . $this->getConditionSql($condition, $arguments) . ')';
    }

    private function quoteColumnName(ReflectedColumn $column): String
    {
        return '"' . $column->getName() . '"';
    }

    private function escapeLikeValue(String $value): String
    {
        return addcslashes($value, '%_');
    }

    private function getColumnConditionSql(ColumnCondition $condition, array &$arguments): String
    {
        $column = $this->quoteColumnName($condition->getColumn());
        $operator = $condition->getOperator();
        $value = $condition->getValue();
        switch ($operator) {
            case 'cs':
                $sql = "$column LIKE ?";
                $arguments[] = '%' . $this->escapeLikeValue($value) . '%';
                break;
            case 'sw':
                $sql = "$column LIKE ?";
                $arguments[] = $this->escapeLikeValue($value) . '%';
                break;
            case 'ew':
                $sql = "$column LIKE ?";
                $arguments[] = '%' . $this->escapeLikeValue($value);
                break;
            case 'eq':
                $sql = "$column = ?";
                $arguments[] = $value;
                break;
            case 'lt':
                $sql = "$column < ?";
                $arguments[] = $value;
                break;
            case 'le':
                $sql = "$column <= ?";
                $arguments[] = $value;
                break;
            case 'ge':
                $sql = "$column >= ?";
                $arguments[] = $value;
                break;
            case 'gt':
                $sql = "$column > ?";
                $arguments[] = $value;
                break;
            case 'bt':
                $parts = explode(',', $value, 2);
                $count = count($parts);
                if ($count == 2) {
                    $sql = "($column >= ? AND $column <= ?)";
                    $arguments[] = $parts[0];
                    $arguments[] = $parts[1];
                } else {
                    $sql = "FALSE";
                }
                break;
            case 'in':
                $parts = explode(',', $value);
                $count = count($parts);
                if ($count > 0) {
                    $qmarks = implode(',', str_split(str_repeat('?', $count)));
                    $sql = "$column IN ($qmarks)";
                    for ($i = 0; $i < $count; $i++) {
                        $arguments[] = $parts[$i];
                    }
                } else {
                    $sql = "FALSE";
                }
                break;
            case 'is':
                $sql = "$column IS NULL";
                break;
        }
        return $sql;
    }

    private function getSpatialFunctionName(String $operator): String
    {
        switch ($operator) {
            case 'co':return 'ST_Contains';
            case 'cr':return 'ST_Crosses';
            case 'di':return 'ST_Disjoint';
            case 'eq':return 'ST_Equals';
            case 'in':return 'ST_Intersects';
            case 'ov':return 'ST_Overlaps';
            case 'to':return 'ST_Touches';
            case 'wi':return 'ST_Within';
            case 'ic':return 'ST_IsClosed';
            case 'is':return 'ST_IsSimple';
            case 'iv':return 'ST_IsValid';
        }
    }

    private function hasSpatialArgument(String $operator): bool
    {
        return in_array($operator, ['ic', 'is', 'iv']) ? false : true;
    }

    private function getSpatialFunctionCall(String $functionName, String $column, bool $hasArgument): String
    {
        switch ($this->driver) {
            case 'mysql':
            case 'pgsql':
                $argument = $hasArgument ? 'ST_GeomFromText(?)' : '';
                return "$functionName($column, $argument)=TRUE";
            case 'sqlsrv':
                $functionName = str_replace('ST_', 'ST', $functionName);
                $argument = $hasArgument ? 'geometry::STGeomFromText(?,0)' : '';
                return "$column.$functionName($argument)=1";
        }
    }

    private function getSpatialConditionSql(ColumnCondition $condition, array &$arguments): String
    {
        $column = $this->quoteColumnName($condition->getColumn());
        $operator = $condition->getOperator();
        $value = $condition->getValue();
        $functionName = $this->getSpatialFunctionName($operator);
        $hasArgument = $this->hasSpatialArgument($operator);
        $sql = $this->getSpatialFunctionCall($functionName, $column, $hasArgument);
        if ($hasArgument) {
            $arguments[] = $value;
        }
        return $sql;
    }

    public function getWhereClause(Condition $condition, array &$arguments): String
    {
        if ($condition instanceof NoCondition) {
            return '';
        }
        return ' WHERE ' . $this->getConditionSql($condition, $arguments);
    }
}

// file: src/Tqdev/PhpCrudApi/Database/DataConverter.php

class DataConverter
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    private function convertRecordValue($conversion, $value)
    {
        switch ($conversion) {
            case 'boolean':
                return $value ? true : false;
            case 'integer':
                return (int) $value;
        }
        return $value;
    }

    private function getRecordValueConversion(ReflectedColumn $column): String
    {
        if (in_array($this->driver, ['mysql', 'sqlsrv']) && $column->isBoolean()) {
            return 'boolean';
        }
        if ($this->driver == 'sqlsrv' && $column->getType() == 'bigint') {
            return 'integer';
        }
        return 'none';
    }

    public function convertRecords(ReflectedTable $table, array $columnNames, array &$records) /*: void*/
    {
        foreach ($columnNames as $columnName) {
            $column = $table->getColumn($columnName);
            $conversion = $this->getRecordValueConversion($column);
            if ($conversion != 'none') {
                foreach ($records as $i => $record) {
                    $value = $records[$i][$columnName];
                    if ($value === null) {
                        continue;
                    }
                    $records[$i][$columnName] = $this->convertRecordValue($conversion, $value);
                }
            }
        }
    }

    private function convertInputValue($conversion, $value)
    {
        switch ($conversion) {
            case 'base64url_to_base64':
                return str_pad(strtr($value, '-_', '+/'), ceil(strlen($value) / 4) * 4, '=', STR_PAD_RIGHT);
        }
        return $value;
    }

    private function getInputValueConversion(ReflectedColumn $column): String
    {
        if ($column->isBinary()) {
            return 'base64url_to_base64';
        }
        return 'none';
    }

    public function convertColumnValues(ReflectedTable $table, array &$columnValues) /*: void*/
    {
        $columnNames = array_keys($columnValues);
        foreach ($columnNames as $columnName) {
            $column = $table->getColumn($columnName);
            $conversion = $this->getInputValueConversion($column);
            if ($conversion != 'none') {
                $value = $columnValues[$columnName];
                if ($value !== null) {
                    $columnValues[$columnName] = $this->convertInputValue($conversion, $value);
                }
            }
        }
    }
}

// file: src/Tqdev/PhpCrudApi/Database/GenericDB.php

class GenericDB
{
    private $driver;
    private $database;
    private $pdo;
    private $reflection;
    private $definition;
    private $conditions;
    private $columns;
    private $converter;

    private function getDsn(String $address, String $port = null, String $database = null): String
    {
        switch ($this->driver) {
            case 'mysql':return "$this->driver:host=$address;port=$port;dbname=$database;charset=utf8mb4";
            case 'pgsql':return "$this->driver:host=$address port=$port dbname=$database options='--client_encoding=UTF8'";
            case 'sqlsrv':return "$this->driver:Server=$address,$port;Database=$database";
        }
    }

    private function getCommands(): array
    {
        switch ($this->driver) {
            case 'mysql':return [
                    'SET SESSION sql_warnings=1;',
                    'SET NAMES utf8mb4;',
                    'SET SESSION sql_mode = "ANSI,TRADITIONAL";',
                ];
            case 'pgsql':return [
                    "SET NAMES 'UTF8';",
                ];
            case 'sqlsrv':return [
                ];
        }
    }

    private function getOptions(): array
    {
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        );
        switch ($this->driver) {
            case 'mysql':return $options + [
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::MYSQL_ATTR_FOUND_ROWS => true,
                    \PDO::ATTR_PERSISTENT => true,
                ];
            case 'pgsql':return $options + [
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::ATTR_PERSISTENT => true,
                ];
            case 'sqlsrv':return $options + [
                    \PDO::SQLSRV_ATTR_DIRECT_QUERY => false,
                    \PDO::SQLSRV_ATTR_FETCHES_NUMERIC_TYPE => true,
                ];
        }
    }

    public function __construct(String $driver, String $address, String $port = null, String $database = null, String $username = null, String $password = null)
    {
        $this->driver = $driver;
        $this->database = $database;
        $dsn = $this->getDsn($address, $port, $database);
        $options = $this->getOptions();
        $this->pdo = new \PDO($dsn, $username, $password, $options);
        $commands = $this->getCommands();
        foreach ($commands as $command) {
            $this->pdo->query($command);
        }
        $this->reflection = new GenericReflection($this->pdo, $driver, $database);
        $this->definition = new GenericDefinition($this->pdo, $driver, $database);
        $this->conditions = new ConditionsBuilder($driver);
        $this->columns = new ColumnsBuilder($driver);
        $this->converter = new DataConverter($driver);
    }

    public function pdo(): \PDO
    {
        return $this->pdo;
    }

    public function reflection(): GenericReflection
    {
        return $this->reflection;
    }

    public function definition(): GenericDefinition
    {
        return $this->definition;
    }

    private function addMiddlewareConditions(String $tableName, Condition $condition): Condition
    {
        $condition1 = VariableStore::get("authorization.conditions.$tableName");
        if ($condition1) {
            $condition = $condition->_and($condition1);
        }
        $condition2 = VariableStore::get("multiTenancy.conditions.$tableName");
        if ($condition2) {
            $condition = $condition->_and($condition2);
        }
        return $condition;
    }

    public function createSingle(ReflectedTable $table, array $columnValues) /*: ?String*/
    {
        $this->converter->convertColumnValues($table, $columnValues);
        $insertColumns = $this->columns->getInsert($table, $columnValues);
        $tableName = $table->getName();
        $pkName = $table->getPk()->getName();
        $parameters = array_values($columnValues);
        $sql = 'INSERT INTO "' . $tableName . '" ' . $insertColumns;
        $stmt = $this->query($sql, $parameters);
        if (isset($columnValues[$pkName])) {
            return $columnValues[$pkName];
        }
        switch ($this->driver) {
            case 'mysql':
                $stmt = $this->query('SELECT LAST_INSERT_ID()', []);
                break;
        }
        $pkValue = $stmt->fetchColumn(0);
        if ($this->driver == 'sqlsrv' && $table->getPk()->getType() == 'bigint') {
            return (int) $pkValue;
        }
        return $pkValue;
    }

    public function selectSingle(ReflectedTable $table, array $columnNames, String $id) /*: ?array*/
    {
        $selectColumns = $this->columns->getSelect($table, $columnNames);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addMiddlewareConditions($tableName, $condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'SELECT ' . $selectColumns . ' FROM "' . $tableName . '" ' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        $record = $stmt->fetch() ?: null;
        if ($record === null) {
            return null;
        }
        $records = array($record);
        $this->converter->convertRecords($table, $columnNames, $records);
        return $records[0];
    }

    public function selectMultiple(ReflectedTable $table, array $columnNames, array $ids): array
    {
        if (count($ids) == 0) {
            return [];
        }
        $selectColumns = $this->columns->getSelect($table, $columnNames);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'in', implode(',', $ids));
        $condition = $this->addMiddlewareConditions($tableName, $condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'SELECT ' . $selectColumns . ' FROM "' . $tableName . '" ' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        $records = $stmt->fetchAll();
        $this->converter->convertRecords($table, $columnNames, $records);
        return $records;
    }

    public function selectCount(ReflectedTable $table, Condition $condition): int
    {
        $tableName = $table->getName();
        $condition = $this->addMiddlewareConditions($tableName, $condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'SELECT COUNT(*) FROM "' . $tableName . '"' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->fetchColumn(0);
    }

    public function selectAll(ReflectedTable $table, array $columnNames, Condition $condition, array $columnOrdering, int $offset, int $limit): array
    {
        if ($limit == 0) {
            return array();
        }
        $selectColumns = $this->columns->getSelect($table, $columnNames);
        $tableName = $table->getName();
        $condition = $this->addMiddlewareConditions($tableName, $condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $orderBy = $this->columns->getOrderBy($table, $columnOrdering);
        $offsetLimit = $this->columns->getOffsetLimit($offset, $limit);
        $sql = 'SELECT ' . $selectColumns . ' FROM "' . $tableName . '"' . $whereClause . $orderBy . $offsetLimit;
        $stmt = $this->query($sql, $parameters);
        $records = $stmt->fetchAll();
        $this->converter->convertRecords($table, $columnNames, $records);
        return $records;
    }

    public function updateSingle(ReflectedTable $table, array $columnValues, String $id)
    {
        if (count($columnValues) == 0) {
            return 0;
        }
        $this->converter->convertColumnValues($table, $columnValues);
        $updateColumns = $this->columns->getUpdate($table, $columnValues);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addMiddlewareConditions($tableName, $condition);
        $parameters = array_values($columnValues);
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'UPDATE "' . $tableName . '" SET ' . $updateColumns . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->rowCount();
    }

    public function deleteSingle(ReflectedTable $table, String $id)
    {
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addMiddlewareConditions($tableName, $condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'DELETE FROM "' . $tableName . '" ' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->rowCount();
    }

    public function incrementSingle(ReflectedTable $table, array $columnValues, String $id)
    {
        if (count($columnValues) == 0) {
            return 0;
        }
        $this->converter->convertColumnValues($table, $columnValues);
        $updateColumns = $this->columns->getIncrement($table, $columnValues);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addMiddlewareConditions($tableName, $condition);
        $parameters = array_values($columnValues);
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'UPDATE "' . $tableName . '" SET ' . $updateColumns . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->rowCount();
    }

    private function query(String $sql, array $parameters): \PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
        return $stmt;
    }
}

// file: src/Tqdev/PhpCrudApi/Database/GenericDefinition.php

class GenericDefinition
{
    private $pdo;
    private $driver;
    private $database;
    private $typeConverter;
    private $reflection;

    public function __construct(\PDO $pdo, String $driver, String $database)
    {
        $this->pdo = $pdo;
        $this->driver = $driver;
        $this->database = $database;
        $this->typeConverter = new TypeConverter($driver);
        $this->reflection = new GenericReflection($pdo, $driver, $database);
    }

    private function quote(String $identifier): String
    {
        return '"' . str_replace('"', '', $identifier) . '"';
    }

    public function getColumnType(ReflectedColumn $column, bool $update): String
    {
        if ($this->driver == 'pgsql' && !$update && $column->getPk() && $this->canAutoIncrement($column)) {
            return 'serial';
        }
        $type = $this->typeConverter->fromJdbc($column->getType());
        if ($column->hasPrecision() && $column->hasScale()) {
            $size = '(' . $column->getPrecision() . ',' . $column->getScale() . ')';
        } else if ($column->hasPrecision()) {
            $size = '(' . $column->getPrecision() . ')';
        } else if ($column->hasLength()) {
            $size = '(' . $column->getLength() . ')';
        } else {
            $size = '';
        }
        $null = $this->getColumnNullType($column, $update);
        $auto = $this->getColumnAutoIncrement($column, $update);
        return $type . $size . $null . $auto;
    }

    private function getPrimaryKey(String $tableName): String
    {
        $pks = $this->reflection->getTablePrimaryKeys($tableName);
        if (count($pks) == 1) {
            return $pks[0];
        }
        return "";
    }

    private function canAutoIncrement(ReflectedColumn $column): bool
    {
        return in_array($column->getType(), ['integer', 'bigint']);
    }

    private function getColumnAutoIncrement(ReflectedColumn $column, bool $update): String
    {
        if (!$this->canAutoIncrement($column)) {
            return '';
        }
        switch ($this->driver) {
            case 'mysql':
                return $column->getPk() ? ' AUTO_INCREMENT' : '';
            case 'pgsql':
            case 'sqlsrv':
                return '';
        }
    }

    private function getColumnNullType(ReflectedColumn $column, bool $update): String
    {
        if ($this->driver == 'pgsql' && $update) {
            return '';
        }
        return $column->getNullable() ? ' NULL' : ' NOT NULL';
    }

    private function getTableRenameSQL(String $tableName, String $newTableName): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($newTableName);

        switch ($this->driver) {
            case 'mysql':
                return "RENAME TABLE $p1 TO $p2";
            case 'pgsql':
                return "ALTER TABLE $p1 RENAME TO $p2";
            case 'sqlsrv':
                return "EXEC sp_rename $p1, $p2";
        }
    }

    private function getColumnRenameSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($newColumn->getName());

        switch ($this->driver) {
            case 'mysql':
                $p4 = $this->getColumnType($newColumn, true);
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                return "ALTER TABLE $p1 RENAME COLUMN $p2 TO $p3";
            case 'sqlsrv':
                $p4 = $this->quote($tableName . '.' . $columnName);
                return "EXEC sp_rename $p4, $p3, 'COLUMN'";
        }
    }

    private function getColumnRetypeSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($newColumn->getName());
        $p4 = $this->getColumnType($newColumn, true);

        switch ($this->driver) {
            case 'mysql':
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                return "ALTER TABLE $p1 ALTER COLUMN $p3 TYPE $p4";
            case 'sqlsrv':
                return "ALTER TABLE $p1 ALTER COLUMN $p3 $p4";
        }
    }

    private function getSetColumnNullableSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($newColumn->getName());
        $p4 = $this->getColumnType($newColumn, true);

        switch ($this->driver) {
            case 'mysql':
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                $p5 = $newColumn->getNullable() ? 'DROP NOT NULL' : 'SET NOT NULL';
                return "ALTER TABLE $p1 ALTER COLUMN $p2 $p5";
            case 'sqlsrv':
                return "ALTER TABLE $p1 ALTER COLUMN $p2 $p4";
        }
    }

    private function getSetColumnPkConstraintSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($tableName . '_pkey');

        switch ($this->driver) {
            case 'mysql':
                $p4 = $newColumn->getPk() ? "ADD PRIMARY KEY ($p2)" : 'DROP PRIMARY KEY';
                return "ALTER TABLE $p1 $p4";
            case 'pgsql':
            case 'sqlsrv':
                $p4 = $newColumn->getPk() ? "ADD CONSTRAINT $p3 PRIMARY KEY ($p2)" : "DROP CONSTRAINT $p3";
                return "ALTER TABLE $p1 $p4";
        }
    }

    private function getSetColumnPkSequenceSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($tableName . '_' . $columnName . '_seq');

        switch ($this->driver) {
            case 'mysql':
                return "select 1";
            case 'pgsql':
                return $newColumn->getPk() ? "CREATE SEQUENCE $p3 OWNED BY $p1.$p2" : "DROP SEQUENCE $p3";
            case 'sqlsrv':
                return $newColumn->getPk() ? "CREATE SEQUENCE $p3" : "DROP SEQUENCE $p3";
        }
    }

    private function getSetColumnPkSequenceStartSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        
        switch ($this->driver) {
            case 'mysql':
                return "select 1";
            case 'pgsql':
                $p3 = $this->pdo->quote($tableName . '_' . $columnName . '_seq');
                return "SELECT setval($p3, (SELECT max($p2)+1 FROM $p1));";
            case 'sqlsrv':
                $p3 = $this->quote($tableName . '_' . $columnName . '_seq');
                $p4 = $this->pdo->query("SELECT max($p2)+1 FROM $p1")->fetchColumn();
                return "ALTER SEQUENCE $p3 RESTART WITH $p4";
        }
    }

    private function getSetColumnPkDefaultSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);

        switch ($this->driver) {
            case 'mysql':
                $p3 = $this->quote($newColumn->getName());
                $p4 = $this->getColumnType($newColumn, true);
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                if ($newColumn->getPk()) {
                    $p3 = $this->pdo->quote($tableName . '_' . $columnName . '_seq');
                    $p4 = "SET DEFAULT nextval($p3)";
                } else {
                    $p4 = 'DROP DEFAULT';
                }
                return "ALTER TABLE $p1 ALTER COLUMN $p2 $p4";
            case 'sqlsrv':
                $p3 = $this->quote($tableName . '_' . $columnName . '_seq');
                $p4 = $this->quote($tableName . '_' . $columnName . '_def');
                if ($newColumn->getPk()) {
                    return "ALTER TABLE $p1 ADD CONSTRAINT $p4 DEFAULT NEXT VALUE FOR $p3 FOR $p2";
                } else {
                    return "ALTER TABLE $p1 DROP CONSTRAINT $p4";
                }
        }
    }

    private function getAddColumnFkConstraintSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($tableName . '_' . $columnName . '_fkey');
        $p4 = $this->quote($newColumn->getFk());
        $p5 = $this->quote($this->getPrimaryKey($newColumn->getFk()));

        return "ALTER TABLE $p1 ADD CONSTRAINT $p3 FOREIGN KEY ($p2) REFERENCES $p4 ($p5)";
    }

    private function getRemoveColumnFkConstraintSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($tableName . '_' . $columnName . '_fkey');

        switch ($this->driver) {
            case 'mysql':
                return "ALTER TABLE $p1 DROP FOREIGN KEY $p2";
            case 'pgsql':
            case 'sqlsrv':
                return "ALTER TABLE $p1 DROP CONSTRAINT $p2";
        }
    }

    private function getAddTableSQL(ReflectedTable $newTable): String
    {
        $tableName = $newTable->getName();
        $p1 = $this->quote($tableName);
        $fields = [];
        $constraints = [];
        foreach ($newTable->getColumnNames() as $columnName) {
            $pkColumn = $this->getPrimaryKey($tableName);
            $newColumn = $newTable->getColumn($columnName);
            $f1 = $this->quote($columnName);
            $f2 = $this->getColumnType($newColumn, false);
            $f3 = $this->quote($tableName . '_' . $columnName . '_fkey');
            $f4 = $this->quote($newColumn->getFk());
            $f5 = $this->quote($this->getPrimaryKey($newColumn->getFk()));
            $f6 = $this->quote($tableName . '_' . $pkColumn . '_pkey');
            $fields[] = "$f1 $f2";
            if ($newColumn->getPk()) {
                $constraints[] = "CONSTRAINT $f6 PRIMARY KEY ($f1)";
            }
            if ($newColumn->getFk()) {
                $constraints[] = "CONSTRAINT $f3 FOREIGN KEY ($f1) REFERENCES $f4 ($f5)";
            }
        }
        $p2 = implode(',', array_merge($fields, $constraints));

        return "CREATE TABLE $p1 ($p2);";
    }

    private function getAddColumnSQL(String $tableName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($newColumn->getName());
        $p3 = $this->getColumnType($newColumn, false);

        switch ($this->driver) {
            case 'mysql':
            case 'pgsql':
                return "ALTER TABLE $p1 ADD COLUMN $p2 $p3";
            case 'sqlsrv':
                return "ALTER TABLE $p1 ADD $p2 $p3";
        }
    }

    private function getRemoveTableSQL(String $tableName): String
    {
        $p1 = $this->quote($tableName);

        switch ($this->driver) {
            case 'mysql':
            case 'pgsql':
                return "DROP TABLE $p1 CASCADE;";
            case 'sqlsrv':
                return "DROP TABLE $p1;";
        }
    }

    private function getRemoveColumnSQL(String $tableName, String $columnName): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);

        switch ($this->driver) {
            case 'mysql':
            case 'pgsql':
                return "ALTER TABLE $p1 DROP COLUMN $p2 CASCADE;";
            case 'sqlsrv':
                return "ALTER TABLE $p1 DROP COLUMN $p2;";
        }
    }

    public function renameTable(String $tableName, String $newTableName)
    {
        $sql = $this->getTableRenameSQL($tableName, $newTableName);
        return $this->query($sql);
    }

    public function renameColumn(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getColumnRenameSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function retypeColumn(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getColumnRetypeSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function setColumnNullable(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getSetColumnNullableSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function addColumnPrimaryKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getSetColumnPkConstraintSQL($tableName, $columnName, $newColumn);
        $this->query($sql);
        if ($this->canAutoIncrement($newColumn)) {
            $sql = $this->getSetColumnPkSequenceSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
            $sql = $this->getSetColumnPkSequenceStartSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
            $sql = $this->getSetColumnPkDefaultSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
        }
        return true;
    }

    public function removeColumnPrimaryKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        if ($this->canAutoIncrement($newColumn)) {
            $sql = $this->getSetColumnPkDefaultSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
            $sql = $this->getSetColumnPkSequenceSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
        }
        $sql = $this->getSetColumnPkConstraintSQL($tableName, $columnName, $newColumn);
        $this->query($sql);
        return true;
    }

    public function addColumnForeignKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getAddColumnFkConstraintSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function removeColumnForeignKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getRemoveColumnFkConstraintSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function addTable(ReflectedTable $newTable)
    {
        $sql = $this->getAddTableSQL($newTable);
        return $this->query($sql);
    }

    public function addColumn(String $tableName, ReflectedColumn $newColumn)
    {
        $sql = $this->getAddColumnSQL($tableName, $newColumn);
        return $this->query($sql);
    }

    public function removeTable(String $tableName)
    {
        $sql = $this->getRemoveTableSQL($tableName);
        return $this->query($sql);
    }

    public function removeColumn(String $tableName, String $columnName)
    {
        $sql = $this->getRemoveColumnSQL($tableName, $columnName);
        return $this->query($sql);
    }

    private function query(String $sql): bool
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }
}

// file: src/Tqdev/PhpCrudApi/Database/GenericReflection.php

class GenericReflection
{
    private $pdo;
    private $driver;
    private $database;
    private $typeConverter;

    public function __construct(\PDO $pdo, String $driver, String $database)
    {
        $this->pdo = $pdo;
        $this->driver = $driver;
        $this->database = $database;
        $this->typeConverter = new TypeConverter($driver);
    }

    public function getIgnoredTables(): array
    {
        switch ($this->driver) {
            case 'mysql':return [];
            case 'pgsql':return ['spatial_ref_sys', 'raster_columns', 'raster_overviews', 'geography_columns', 'geometry_columns'];
            case 'sqlsrv':return [];
        }
    }

    private function getTablesSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "TABLE_NAME", "TABLE_TYPE" FROM "INFORMATION_SCHEMA"."TABLES" WHERE "TABLE_TYPE" IN (\'BASE TABLE\' , \'VIEW\') AND "TABLE_SCHEMA" = ? ORDER BY BINARY "TABLE_NAME"';
            case 'pgsql':return 'SELECT c.relname as "TABLE_NAME", c.relkind as "TABLE_TYPE" FROM pg_catalog.pg_class c LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace WHERE c.relkind IN (\'r\', \'v\') AND n.nspname <> \'pg_catalog\' AND n.nspname <> \'information_schema\' AND n.nspname !~ \'^pg_toast\' AND pg_catalog.pg_table_is_visible(c.oid) AND \'\' <> ? ORDER BY "TABLE_NAME";';
            case 'sqlsrv':return 'SELECT o.name as "TABLE_NAME", o.xtype as "TABLE_TYPE" FROM sysobjects o WHERE o.xtype IN (\'U\', \'V\') ORDER BY "TABLE_NAME"';
        }
    }

    private function getTableColumnsSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "COLUMN_NAME", "IS_NULLABLE", "DATA_TYPE", "CHARACTER_MAXIMUM_LENGTH", "NUMERIC_PRECISION", "NUMERIC_SCALE" FROM "INFORMATION_SCHEMA"."COLUMNS" WHERE "TABLE_NAME" = ? AND "TABLE_SCHEMA" = ?';
            case 'pgsql':return 'SELECT a.attname AS "COLUMN_NAME", case when a.attnotnull then \'NO\' else \'YES\' end as "IS_NULLABLE", pg_catalog.format_type(a.atttypid, -1) as "DATA_TYPE", case when a.atttypmod < 0 then NULL else a.atttypmod-4 end as "CHARACTER_MAXIMUM_LENGTH", case when a.atttypid != 1700 then NULL else ((a.atttypmod - 4) >> 16) & 65535 end as "NUMERIC_PRECISION", case when a.atttypid != 1700 then NULL else (a.atttypmod - 4) & 65535 end as "NUMERIC_SCALE" FROM pg_attribute a JOIN pg_class pgc ON pgc.oid = a.attrelid WHERE pgc.relname = ? AND \'\' <> ? AND a.attnum > 0 AND NOT a.attisdropped;';
            case 'sqlsrv':return 'SELECT c.name AS "COLUMN_NAME", c.is_nullable AS "IS_NULLABLE", t.Name AS "DATA_TYPE", (c.max_length/2) AS "CHARACTER_MAXIMUM_LENGTH", c.precision AS "NUMERIC_PRECISION", c.scale AS "NUMERIC_SCALE" FROM sys.columns c INNER JOIN sys.types t ON c.user_type_id = t.user_type_id WHERE c.object_id = OBJECT_ID(?) AND \'\' <> ?';
        }
    }

    private function getTablePrimaryKeysSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "COLUMN_NAME" FROM "INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" WHERE "CONSTRAINT_NAME" = \'PRIMARY\' AND "TABLE_NAME" = ? AND "TABLE_SCHEMA" = ?';
            case 'pgsql':return 'SELECT a.attname AS "COLUMN_NAME" FROM pg_attribute a JOIN pg_constraint c ON (c.conrelid, c.conkey[1]) = (a.attrelid, a.attnum) JOIN pg_class pgc ON pgc.oid = a.attrelid WHERE pgc.relname = ? AND \'\' <> ? AND c.contype = \'p\'';
            case 'sqlsrv':return 'SELECT c.NAME as "COLUMN_NAME" FROM sys.key_constraints kc inner join sys.objects t on t.object_id = kc.parent_object_id INNER JOIN sys.index_columns ic ON kc.parent_object_id = ic.object_id and kc.unique_index_id = ic.index_id INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id WHERE kc.type = \'PK\' and t.object_id = OBJECT_ID(?) and \'\' <> ?';
        }
    }

    private function getTableForeignKeysSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "COLUMN_NAME", "REFERENCED_TABLE_NAME" FROM "INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" WHERE "REFERENCED_TABLE_NAME" IS NOT NULL AND "TABLE_NAME" = ? AND "TABLE_SCHEMA" = ?';
            case 'pgsql':return 'SELECT a.attname AS "COLUMN_NAME", c.confrelid::regclass::text AS "REFERENCED_TABLE_NAME" FROM pg_attribute a JOIN pg_constraint c ON (c.conrelid, c.conkey[1]) = (a.attrelid, a.attnum) JOIN pg_class pgc ON pgc.oid = a.attrelid WHERE pgc.relname = ? AND \'\' <> ? AND c.contype  = \'f\'';
            case 'sqlsrv':return 'SELECT COL_NAME(fc.parent_object_id, fc.parent_column_id) AS "COLUMN_NAME", OBJECT_NAME (f.referenced_object_id) AS "REFERENCED_TABLE_NAME" FROM sys.foreign_keys AS f INNER JOIN sys.foreign_key_columns AS fc ON f.OBJECT_ID = fc.constraint_object_id WHERE f.parent_object_id = OBJECT_ID(?) and \'\' <> ?';
        }
    }

    public function getDatabaseName(): String
    {
        return $this->database;
    }

    public function getTables(): array
    {
        $sql = $this->getTablesSQL();
        $results = $this->query($sql, [$this->database]);
        foreach ($results as &$result) {
            switch ($this->driver) {
                case 'mysql':
                    $map = ['BASE TABLE' => 'table', 'VIEW' => 'view'];
                    $result['TABLE_TYPE'] = $map[$result['TABLE_TYPE']];
                    break;
                case 'pgsql':
                    $map = ['r' => 'table', 'v' => 'view'];
                    $result['TABLE_TYPE'] = $map[$result['TABLE_TYPE']];
                    break;
                case 'sqlsrv':
                    $map = ['U' => 'table', 'V' => 'view'];
                    $result['TABLE_TYPE'] = $map[trim($result['TABLE_TYPE'])];
                    break;
            }
        }
        return $results;
    }

    public function getTableColumns(String $tableName, String $type): array
    {
        $sql = $this->getTableColumnsSQL();
        $results = $this->query($sql, [$tableName, $this->database]);
        if ($type == 'view') {
            foreach ($results as &$result) {
                $result['IS_NULLABLE'] = false;
            }
        }
        return $results;
    }

    public function getTablePrimaryKeys(String $tableName): array
    {
        $sql = $this->getTablePrimaryKeysSQL();
        $results = $this->query($sql, [$tableName, $this->database]);
        $primaryKeys = [];
        foreach ($results as $result) {
            $primaryKeys[] = $result['COLUMN_NAME'];
        }
        return $primaryKeys;
    }

    public function getTableForeignKeys(String $tableName): array
    {
        $sql = $this->getTableForeignKeysSQL();
        $results = $this->query($sql, [$tableName, $this->database]);
        $foreignKeys = [];
        foreach ($results as $result) {
            $foreignKeys[$result['COLUMN_NAME']] = $result['REFERENCED_TABLE_NAME'];
        }
        return $foreignKeys;
    }

    public function toJdbcType(String $type, int $size): String
    {
        return $this->typeConverter->toJdbc($type, $size);
    }

    private function query(String $sql, array $parameters): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
        return $stmt->fetchAll();
    }
}

// file: src/Tqdev/PhpCrudApi/Database/TypeConverter.php

class TypeConverter
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    private $fromJdbc = [
        'mysql' => [
            'clob' => 'longtext',
            'boolean' => 'bit',
            'blob' => 'longblob',
            'timestamp' => 'datetime',
        ],
        'pgsql' => [
            'clob' => 'text',
            'blob' => 'bytea',
        ],
        'sqlsrv' => [
            'boolean' => 'bit',
            'varchar' => 'nvarchar',
            'clob' => 'ntext',
            'blob' => 'image',
        ],
    ];

    private $toJdbc = [
        'simplified' => [
            'char' => 'varchar',
            'longvarchar' => 'clob',
            'nchar' => 'varchar',
            'nvarchar' => 'varchar',
            'longnvarchar' => 'clob',
            'binary' => 'varbinary',
            'longvarbinary' => 'blob',
            'tinyint' => 'integer',
            'smallint' => 'integer',
            'real' => 'float',
            'numeric' => 'decimal',
            'time_with_timezone' => 'time',
            'timestamp_with_timezone' => 'timestamp',
        ],
        'mysql' => [
            'bit' => 'boolean',
            'tinyblob' => 'blob',
            'mediumblob' => 'blob',
            'longblob' => 'blob',
            'tinytext' => 'clob',
            'mediumtext' => 'clob',
            'longtext' => 'clob',
            'text' => 'clob',
            'mediumint' => 'integer',
            'int' => 'integer',
            'polygon' => 'geometry',
            'point' => 'geometry',
            'datetime' => 'timestamp',
            'year' => 'integer',
            'enum' => 'varchar',
            'json' => 'clob',
        ],
        'pgsql' => [
            'bigserial' => 'bigint',
            'bit varying' => 'bit',
            'box' => 'geometry',
            'bytea' => 'blob',
            'character varying' => 'varchar',
            'character' => 'char',
            'cidr' => 'varchar',
            'circle' => 'geometry',
            'double precision' => 'double',
            'inet' => 'integer',
            'json' => 'clob',
            'jsonb' => 'clob',
            'line' => 'geometry',
            'lseg' => 'geometry',
            'macaddr' => 'varchar',
            'money' => 'decimal',
            'path' => 'geometry',
            'point' => 'geometry',
            'polygon' => 'geometry',
            'real' => 'float',
            'serial' => 'integer',
            'text' => 'clob',
            'time without time zone' => 'time',
            'time with time zone' => 'time_with_timezone',
            'timestamp without time zone' => 'timestamp',
            'timestamp with time zone' => 'timestamp_with_timezone',
            'uuid' => 'char',
            'xml' => 'clob',
        ],
        'sqlsrv' => [
            'varbinary(0)' => 'blob',
            'bit' => 'boolean',
            'datetime' => 'timestamp',
            'datetime2' => 'timestamp',
            'float' => 'double',
            'image' => 'blob',
            'int' => 'integer',
            'money' => 'decimal',
            'ntext' => 'clob',
            'smalldatetime' => 'timestamp',
            'smallmoney' => 'decimal',
            'text' => 'clob',
            'timestamp' => 'binary',
            'udt' => 'varbinary',
            'uniqueidentifier' => 'char',
            'xml' => 'clob',
        ],
    ];

    private $valid = [
        'bigint' => true,
        'binary' => true,
        'bit' => true,
        'blob' => true,
        'boolean' => true,
        'char' => true,
        'clob' => true,
        'date' => true,
        'decimal' => true,
        'distinct' => true,
        'double' => true,
        'float' => true,
        'integer' => true,
        'longnvarchar' => true,
        'longvarbinary' => true,
        'longvarchar' => true,
        'nchar' => true,
        'nclob' => true,
        'numeric' => true,
        'nvarchar' => true,
        'real' => true,
        'smallint' => true,
        'time' => true,
        'time_with_timezone' => true,
        'timestamp' => true,
        'timestamp_with_timezone' => true,
        'tinyint' => true,
        'varbinary' => true,
        'varchar' => true,
        'geometry' => true,
    ];

    public function toJdbc(String $type, int $size): String
    {
        $jdbcType = strtolower($type);
        if (isset($this->toJdbc[$this->driver]["$jdbcType($size)"])) {
            $jdbcType = $this->toJdbc[$this->driver]["$jdbcType($size)"];
        }
        if (isset($this->toJdbc[$this->driver][$jdbcType])) {
            $jdbcType = $this->toJdbc[$this->driver][$jdbcType];
        }
        if (isset($this->toJdbc['simplified'][$jdbcType])) {
            $jdbcType = $this->toJdbc['simplified'][$jdbcType];
        }
        if (!isset($this->valid[$jdbcType])) {
            throw new \Exception("Unsupported type '$jdbcType' for driver '$this->driver'");
        }
        return $jdbcType;
    }

    public function fromJdbc(String $type): String
    {
        $jdbcType = strtolower($type);
        if (isset($this->fromJdbc[$this->driver][$jdbcType])) {
            $jdbcType = $this->fromJdbc[$this->driver][$jdbcType];
        }
        return $jdbcType;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/Base/Handler.php

interface Handler
{
    public function handle(ServerRequestInterface $request): Response;
}

// file: src/Tqdev/PhpCrudApi/Middleware/Base/Middleware.php

abstract class Middleware implements Handler
{
    protected $next;
    protected $responder;
    private $properties;

    public function __construct(Router $router, Responder $responder, array $properties)
    {
        $router->load($this);
        $this->responder = $responder;
        $this->properties = $properties;
    }

    public function setNext(Handler $handler) /*: void*/
    {
        $this->next = $handler;
    }

    protected function getArrayProperty(String $key, String $default): array
    {
        return array_filter(array_map('trim', explode(',', $this->getProperty($key, $default))));
    }

    protected function getProperty(String $key, $default)
    {
        return isset($this->properties[$key]) ? $this->properties[$key] : $default;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/Communication/VariableStore.php

class VariableStore
{
    static $values = array();

    public static function get(String $key)
    {
        if (isset(self::$values[$key])) {
            return self::$values[$key];
        }
        return null;
    }

    public static function set(String $key, /* object */ $value)
    {
        self::$values[$key] = $value;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/Router/Router.php

interface Router extends Handler
{
    public function register(String $method, String $path, array $handler);

    public function load(Middleware $middleware);

    public function route(ServerRequestInterface $request): Response;
}

// file: src/Tqdev/PhpCrudApi/Middleware/Router/SimpleRouter.php

class SimpleRouter implements Router
{
    private $responder;
    private $cache;
    private $ttl;
    private $debug;
    private $registration;
    private $routes;
    private $routeHandlers;
    private $middlewares;

    public function __construct(Responder $responder, Cache $cache, int $ttl, bool $debug)
    {
        $this->responder = $responder;
        $this->cache = $cache;
        $this->ttl = $ttl;
        $this->debug = $debug;
        $this->registration = true;
        $this->routes = $this->loadPathTree();
        $this->routeHandlers = [];
        $this->middlewares = array();
    }

    private function loadPathTree(): PathTree
    {
        $data = $this->cache->get('PathTree');
        if ($data != '') {
            $tree = PathTree::fromJson(json_decode(gzuncompress($data)));
            $this->registration = false;
        } else {
            $tree = new PathTree();
        }
        return $tree;
    }

    public function register(String $method, String $path, array $handler)
    {
        $routeNumber = count($this->routeHandlers);
        $this->routeHandlers[$routeNumber] = $handler;
        if ($this->registration) {
            $parts = explode('/', trim($path, '/'));
            array_unshift($parts, $method);
            $this->routes->put($parts, $routeNumber);
        }
    }

    public function load(Middleware $middleware) /*: void*/
    {
        if (count($this->middlewares) > 0) {
            $next = $this->middlewares[0];
        } else {
            $next = $this;
        }
        $middleware->setNext($next);
        array_unshift($this->middlewares, $middleware);
    }

    public function route(ServerRequestInterface $request): Response
    {
        if ($this->registration) {
            $data = gzcompress(json_encode($this->routes, JSON_UNESCAPED_UNICODE));
            $this->cache->set('PathTree', $data, $this->ttl);
        }
        $obj = $this;
        if (count($this->middlewares) > 0) {
            $obj = $this->middlewares[0];
        }
        return $obj->handle($request);
    }

    private function getRouteNumbers(ServerRequestInterface $request): array
    {
        $method = strtoupper($request->getMethod());
        $path = explode('/', trim($request->getRequestTarget(), '/'));
        array_unshift($path, $method);
        return $this->routes->match($path);
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $routeNumbers = $this->getRouteNumbers($request);
        if (count($routeNumbers) == 0) {
            return $this->responder->error(ErrorCode::ROUTE_NOT_FOUND, $request->getRequestTarget());
        }
        try {
            $response = call_user_func($this->routeHandlers[$routeNumbers[0]], $request);
        } catch (\PDOException $e) {
            if (strpos(strtolower($e->getMessage()), 'duplicate') !== false) {
                $response = $this->responder->error(ErrorCode::DUPLICATE_KEY_EXCEPTION, '');
            } elseif (strpos(strtolower($e->getMessage()), 'default value') !== false) {
                $response = $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
            } elseif (strpos(strtolower($e->getMessage()), 'allow nulls') !== false) {
                $response = $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
            } elseif (strpos(strtolower($e->getMessage()), 'constraint') !== false) {
                $response = $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
            }
            if ($this->debug) {
                $response->addExceptionHeaders($e);
            }
        }
        return $response;
    }

}

// file: src/Tqdev/PhpCrudApi/Middleware/AjaxOnlyMiddleware.php

class AjaxOnlyMiddleware extends Middleware
{
    public function handle(ServerRequestInterface $request): Response
    {
        $method = $request->getMethod();
        $excludeMethods = $this->getArrayProperty('excludeMethods', 'OPTIONS,GET');
        if (!in_array($method, $excludeMethods)) {
            $headerName = $this->getProperty('headerName', 'X-Requested-With');
            $headerValue = $this->getProperty('headerValue', 'XMLHttpRequest');
            if ($headerValue != $request->getHeader($headerName)) {
                return $this->responder->error(ErrorCode::ONLY_AJAX_REQUESTS_ALLOWED, $method);
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/AuthorizationMiddleware.php

class AuthorizationMiddleware extends Middleware
{
    private $reflection;
    private $utils;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function handleColumns(String $operation, String $tableName) /*: void*/
    {
        $columnHandler = $this->getProperty('columnHandler', '');
        if ($columnHandler) {
            $table = $this->reflection->getTable($tableName);
            foreach ($table->getColumnNames() as $columnName) {
                $allowed = call_user_func($columnHandler, $operation, $tableName, $columnName);
                if (!$allowed) {
                    $table->removeColumn($columnName);
                }
            }
        }
    }

    private function handleTable(String $operation, String $tableName) /*: void*/
    {
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $tableHandler = $this->getProperty('tableHandler', '');
        if ($tableHandler) {
            $allowed = call_user_func($tableHandler, $operation, $tableName);
            if (!$allowed) {
                $this->reflection->removeTable($tableName);
            } else {
                $this->handleColumns($operation, $tableName);
            }
        }
    }

    private function handleRecords(String $operation, String $tableName) /*: void*/
    {
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $recordHandler = $this->getProperty('recordHandler', '');
        if ($recordHandler) {
            $query = call_user_func($recordHandler, $operation, $tableName);
            $filters = new FilterInfo();
            $table = $this->reflection->getTable($tableName);
            $query = str_replace('][]=', ']=', str_replace('=', '[]=', $query));
            parse_str($query, $params);
            $condition = $filters->getCombinedConditions($table, $params);
            VariableStore::set("authorization.conditions.$tableName", $condition);
        }
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $path = $this->utils->getPathSegment($request, 1);
        $operation = $this->utils->getOperation($request);
        $tableNames = $this->utils->getTableNames($request);
        foreach ($tableNames as $tableName) {
            $this->handleTable($operation, $tableName);
            if ($path == 'records') {
                $this->handleRecords($operation, $tableName);
            }
        }
        if ($path == 'openapi') {
            VariableStore::set('authorization.tableHandler', $this->getProperty('tableHandler', ''));
            VariableStore::set('authorization.columnHandler', $this->getProperty('columnHandler', ''));
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/BasicAuthMiddleware.php

class BasicAuthMiddleware extends Middleware
{
    private function hasCorrectPassword(String $username, String $password, array &$passwords): bool
    {
        $hash = isset($passwords[$username]) ? $passwords[$username] : false;
        if ($hash && password_verify($password, $hash)) {
            if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                $passwords[$username] = password_hash($password, PASSWORD_DEFAULT);
            }
            return true;
        }
        return false;
    }

    private function getValidUsername(String $username, String $password, String $passwordFile): String
    {
        $passwords = $this->readPasswords($passwordFile);
        $valid = $this->hasCorrectPassword($username, $password, $passwords);
        $this->writePasswords($passwordFile, $passwords);
        return $valid ? $username : '';
    }

    private function readPasswords(String $passwordFile): array
    {
        $passwords = [];
        $passwordLines = file($passwordFile);
        foreach ($passwordLines as $passwordLine) {
            if (strpos($passwordLine, ':') !== false) {
                list($username, $hash) = explode(':', trim($passwordLine), 2);
                if (strlen($hash) > 0 && $hash[0] != '$') {
                    $hash = password_hash($hash, PASSWORD_DEFAULT);
                }
                $passwords[$username] = $hash;
            }
        }
        return $passwords;
    }

    private function writePasswords(String $passwordFile, array $passwords): bool
    {
        $success = false;
        $passwordFileContents = '';
        foreach ($passwords as $username => $hash) {
            $passwordFileContents .= "$username:$hash\n";
        }
        if (file_get_contents($passwordFile) != $passwordFileContents) {
            $success = file_put_contents($passwordFile, $passwordFileContents) !== false;
        }
        return $success;
    }

    private function getAuthorizationCredentials(ServerRequestInterface $request): String
    {
        if (isset($_SERVER['PHP_AUTH_USER'])) {
            return $_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW'];
        }
        $parts = explode(' ', trim($request->getHeader('Authorization')), 2);
        if (count($parts) != 2) {
            return '';
        }
        if ($parts[0] != 'Basic') {
            return '';
        }
        return base64_decode(strtr($parts[1], '-_', '+/'));
    }

    public function handle(ServerRequestInterface
         $request): Response {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $credentials = $this->getAuthorizationCredentials($request);
        if ($credentials) {
            list($username, $password) = array('', '');
            if (strpos($credentials, ':') !== false) {
                list($username, $password) = explode(':', $credentials, 2);
            }
            $passwordFile = $this->getProperty('passwordFile', '.htpasswd');
            $validUser = $this->getValidUsername($username, $password, $passwordFile);
            $_SESSION['username'] = $validUser;
            if (!$validUser) {
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
            }
            if (!headers_sent()) {
                session_regenerate_id();
            }
        }
        if (!isset($_SESSION['username']) || !$_SESSION['username']) {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                $response = $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
                $realm = $this->getProperty('realm', 'Username and password required');
                $response->addHeader('WWW-Authenticate', "Basic realm=\"$realm\"");
                return $response;
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/CorsMiddleware.php

class CorsMiddleware extends Middleware
{
    private function isOriginAllowed(String $origin, String $allowedOrigins): bool
    {
        $found = false;
        foreach (explode(',', $allowedOrigins) as $allowedOrigin) {
            $hostname = preg_quote(strtolower(trim($allowedOrigin)));
            $regex = '/^' . str_replace('\*', '.*', $hostname) . '$/';
            if (preg_match($regex, $origin)) {
                $found = true;
                break;
            }
        }
        return $found;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $method = $request->getMethod();
        $origin = count($request->getHeader('Origin')) ? $request->getHeader('Origin')[0] : '';
        $allowedOrigins = $this->getProperty('allowedOrigins', '*');
        if ($origin && !$this->isOriginAllowed($origin, $allowedOrigins)) {
            $response = $this->responder->error(ErrorCode::ORIGIN_FORBIDDEN, $origin);
        } elseif ($method == 'OPTIONS') {
            $response = new Response(Response::OK, '');
            $allowHeaders = $this->getProperty('allowHeaders', 'Content-Type, X-XSRF-TOKEN, X-Authorization');
            if ($allowHeaders) {
                $response->addHeader('Access-Control-Allow-Headers', $allowHeaders);
            }
            $allowMethods = $this->getProperty('allowMethods', 'OPTIONS, GET, PUT, POST, DELETE, PATCH');
            if ($allowMethods) {
                $response->addHeader('Access-Control-Allow-Methods', $allowMethods);
            }
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            if ($allowCredentials) {
                $response->addHeader('Access-Control-Allow-Credentials', $allowCredentials);
            }
            $maxAge = $this->getProperty('maxAge', '1728000');
            if ($maxAge) {
                $response->addHeader('Access-Control-Max-Age', $maxAge);
            }
            $exposeHeaders = $this->getProperty('exposeHeaders', '');
            if ($exposeHeaders) {
                $response->addHeader('Access-Control-Expose-Headers', $exposeHeaders);
            }
        } else {
            $response = $this->next->handle($request);
        }
        if ($origin) {
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            if ($allowCredentials) {
                $response->addHeader('Access-Control-Allow-Credentials', $allowCredentials);
            }
            $response->addHeader('Access-Control-Allow-Origin', $origin);
        }
        return $response;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/CustomizationMiddleware.php

class CustomizationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $operation = $this->utils->getOperation($request);
        $tableName = $this->utils->getPathSegment($request, 2);
        $beforeHandler = $this->getProperty('beforeHandler', '');
        $environment = (object) array();
        if ($beforeHandler !== '') {
            call_user_func($beforeHandler, $operation, $tableName, $request, $environment);
        }
        $response = $this->next->handle($request);
        $afterHandler = $this->getProperty('afterHandler', '');
        if ($afterHandler !== '') {
            call_user_func($afterHandler, $operation, $tableName, $response, $environment);
        }
        return $response;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/FirewallMiddleware.php

class FirewallMiddleware extends Middleware
{
    private function ipMatch(String $ip, String $cidr): bool
    {
        if (strpos($cidr, '/') !== false) {
            list($subnet, $mask) = explode('/', trim($cidr));
            if ((ip2long($ip) & ~((1 << (32 - $mask)) - 1)) == ip2long($subnet)) {
                return true;
            }
        } else {
            if (ip2long($ip) == ip2long($cidr)) {
                return true;
            }
        }
        return false;
    }

    private function isIpAllowed(String $ipAddress, String $allowedIpAddresses): bool
    {
        foreach (explode(',', $allowedIpAddresses) as $allowedIp) {
            if ($this->ipMatch($ipAddress, $allowedIp)) {
                return true;
            }
        }
        return false;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $reverseProxy = $this->getProperty('reverseProxy', '');
        if ($reverseProxy) {
            $ipAddress = array_pop(explode(',', $request->getHeader('X-Forwarded-For')));
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipAddress = '127.0.0.1';
        }
        $allowedIpAddresses = $this->getProperty('allowedIpAddresses', '');
        if (!$this->isIpAllowed($ipAddress, $allowedIpAddresses)) {
            $response = $this->responder->error(ErrorCode::TEMPORARY_OR_PERMANENTLY_BLOCKED, '');
        } else {
            $response = $this->next->handle($request);
        }
        return $response;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/IpAddressMiddleware.php

class IpAddressMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function callHandler($record, String $operation, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $columnNames = $this->getProperty('columns', '');
        if ($columnNames) {
            foreach (explode(',', $columnNames) as $columnName) {
                if ($table->hasColumn($columnName)) {
                    if ($operation == 'create') {
                        $context[$columnName] = $_SERVER['REMOTE_ADDR'];
                    } else {
                        unset($context[$columnName]);
                    }
                }
            }
        }
        return (object) $context;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $operation = $this->utils->getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableNames = $this->getProperty('tables', '');
            $tableName = $this->utils->getPathSegment($request, 2);
            if (!$tableNames || in_array($tableName, explode(',', $tableNames))) {
                if ($this->reflection->hasTable($tableName)) {
                    $record = $request->getBody();
                    if ($record !== null) {
                        $table = $this->reflection->getTable($tableName);
                        if (is_array($record)) {
                            foreach ($record as &$r) {
                                $r = $this->callHandler($r, $operation, $table);
                            }
                        } else {
                            $record = $this->callHandler($record, $operation, $table);
                        }
                        $request->setBody($record);
                    }
                }
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/JoinLimitsMiddleware.php

class JoinLimitsMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $operation = $this->utils->getOperation($request);
        $params = $this->utils->getParams($request);
        if (in_array($operation, ['read', 'list']) && isset($params['join'])) {
            $maxDepth = (int) $this->getProperty('depth', '3');
            $maxTables = (int) $this->getProperty('tables', '10');
            $maxRecords = (int) $this->getProperty('records', '1000');
            $tableCount = 0;
            $joinPaths = array();
            for ($i = 0; $i < count($params['join']); $i++) {
                $joinPath = array();
                $tables = explode(',', $params['join'][$i]);
                for ($depth = 0; $depth < min($maxDepth, count($tables)); $depth++) {
                    array_push($joinPath, $tables[$depth]);
                    $tableCount += 1;
                    if ($tableCount == $maxTables) {
                        break;
                    }
                }
                array_push($joinPaths, implode(',', $joinPath));
                if ($tableCount == $maxTables) {
                    break;
                }
            }
            $params['join'] = $joinPaths;
            $request->setParams($params);
            VariableStore::set("joinLimits.maxRecords", $maxRecords);
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/JwtAuthMiddleware.php

class JwtAuthMiddleware extends Middleware
{
    private function getVerifiedClaims(String $token, int $time, int $leeway, int $ttl, String $secret, array $requirements): array
    {
        $algorithms = array(
            'HS256' => 'sha256',
            'HS384' => 'sha384',
            'HS512' => 'sha512',
            'RS256' => 'sha256',
            'RS384' => 'sha384',
            'RS512' => 'sha512',
        );
        $token = explode('.', $token);
        if (count($token) < 3) {
            return array();
        }
        $header = json_decode(base64_decode(strtr($token[0], '-_', '+/')), true);
        if (!$secret) {
            return array();
        }
        if ($header['typ'] != 'JWT') {
            return array();
        }
        $algorithm = $header['alg'];
        if (!isset($algorithms[$algorithm])) {
            return array();
        }
        if (!empty($requirements['alg']) && !in_array($algorithm, $requirements['alg'])) {
            return array();
        }
        $hmac = $algorithms[$algorithm];
        $signature = base64_decode(strtr($token[2], '-_', '+/'));
        $data = "$token[0].$token[1]";
        switch ($algorithm[0]) {
            case 'H':
                $hash = hash_hmac($hmac, $data, $secret, true);
                if (function_exists('hash_equals')) {
                    $equals = hash_equals($signature, $hash);
                } else {
                    $equals = $signature == $hash;
                }
                if (!$equals) {
                    return array();
                }
                break;
            case 'R':
                $equals = openssl_verify($data, $signature, $secret, $hmac) == 1;
                if (!$equals) {
                    return array();
                }
                break;
        }
        $claims = json_decode(base64_decode(strtr($token[1], '-_', '+/')), true);
        if (!$claims) {
            return array();
        }
        foreach ($requirements as $field => $values) {
            if (!empty($values)) {
                if ($field != 'alg') {
                    if (!isset($claims[$field]) || !in_array($claims[$field], $values)) {
                        return array();
                    }
                }
            }
        }
        if (isset($claims['nbf']) && $time + $leeway < $claims['nbf']) {
            return array();
        }
        if (isset($claims['iat']) && $time + $leeway < $claims['iat']) {
            return array();
        }
        if (isset($claims['exp']) && $time - $leeway > $claims['exp']) {
            return array();
        }
        if (isset($claims['iat']) && !isset($claims['exp'])) {
            if ($time - $leeway > $claims['iat'] + $ttl) {
                return array();
            }
        }
        return $claims;
    }

    private function getClaims(String $token): array
    {
        $time = (int) $this->getProperty('time', time());
        $leeway = (int) $this->getProperty('leeway', '5');
        $ttl = (int) $this->getProperty('ttl', '30');
        $secret = $this->getProperty('secret', '');
        $requirements = array(
            'alg' => $this->getArrayProperty('algorithms', ''),
            'aud' => $this->getArrayProperty('audiences', ''),
            'iss' => $this->getArrayProperty('issuers', ''),
        );
        if (!$secret) {
            return array();
        }
        return $this->getVerifiedClaims($token, $time, $leeway, $ttl, $secret, $requirements);
    }

    private function getAuthorizationToken(ServerRequestInterface $request): String
    {
        $header = $this->getProperty('header', 'X-Authorization');
        $parts = explode(' ', trim($request->getHeader($header)), 2);
        if (count($parts) != 2) {
            return '';
        }
        if ($parts[0] != 'Bearer') {
            return '';
        }
        return $parts[1];
    }

    public function handle(ServerRequestInterface $request): Response
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $this->getAuthorizationToken($request);
        if ($token) {
            $claims = $this->getClaims($token);
            $_SESSION['claims'] = $claims;
            if (empty($claims)) {
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, 'JWT');
            }
            if (!headers_sent()) {
                session_regenerate_id();
            }
        }
        if (empty($_SESSION['claims'])) {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/MultiTenancyMiddleware.php

class MultiTenancyMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function getCondition(String $tableName, array $pairs): Condition
    {
        $condition = new NoCondition();
        $table = $this->reflection->getTable($tableName);
        foreach ($pairs as $k => $v) {
            $condition = $condition->_and(new ColumnCondition($table->getColumn($k), 'eq', $v));
        }
        return $condition;
    }

    private function getPairs($handler, String $operation, String $tableName): array
    {
        $result = array();
        $pairs = call_user_func($handler, $operation, $tableName);
        $table = $this->reflection->getTable($tableName);
        foreach ($pairs as $k => $v) {
            if ($table->hasColumn($k)) {
                $result[$k] = $v;
            }
        }
        return $result;
    }

    private function handleRecord(ServerRequestInterface $request, String $operation, array $pairs) /*: void*/
    {
        $record = $request->getBody();
        if ($record === null) {
            return;
        }
        $multi = is_array($record);
        $records = $multi ? $record : [$record];
        foreach ($records as &$record) {
            foreach ($pairs as $column => $value) {
                if ($operation == 'create') {
                    $record->$column = $value;
                } else {
                    if (isset($record->$column)) {
                        unset($record->$column);
                    }
                }
            }
        }
        $request->setBody($multi ? $records : $records[0]);
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $handler = $this->getProperty('handler', '');
        if ($handler !== '') {
            $path = $this->utils->getPathSegment($request, 1);
            if ($path == 'records') {
                $operation = $this->utils->getOperation($request);
                $tableNames = $this->utils->getTableNames($request);
                foreach ($tableNames as $i => $tableName) {
                    if (!$this->reflection->hasTable($tableName)) {
                        continue;
                    }
                    $pairs = $this->getPairs($handler, $operation, $tableName);
                    if ($i == 0) {
                        if (in_array($operation, ['create', 'update', 'increment'])) {
                            $this->handleRecord($request, $operation, $pairs);
                        }
                    }
                    $condition = $this->getCondition($tableName, $pairs);
                    VariableStore::set("multiTenancy.conditions.$tableName", $condition);
                }
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/PageLimitsMiddleware.php

class PageLimitsMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    public function handle(Request $request): Response
    {
        $operation = $this->utils->getOperation($request);
        if ($operation == 'list') {
            $params = $this->utils->getParams($request);
            $maxPage = (int) $this->getProperty('pages', '100');
            if (isset($params['page']) && $params['page'] && $maxPage > 0) {
                if (strpos($params['page'][0], ',') === false) {
                    $page = $params['page'][0];
                } else {
                    list($page, $size) = explode(',', $params['page'][0], 2);
                }
                if ($page > $maxPage) {
                    return $this->responder->error(ErrorCode::PAGINATION_FORBIDDEN, '');
                }
            }
            $maxSize = (int) $this->getProperty('records', '1000');
            if (!isset($params['size']) || !$params['size'] && $maxSize > 0) {
                $params['size'] = array($maxSize);
            } else {
                $params['size'] = array(min($params['size'][0], $maxSize));
            }
            $request->setParams($params);
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/SanitationMiddleware.php

class SanitationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function callHandler($handler, $record, String $operation, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $tableName = $table->getName();
        foreach ($context as $columnName => &$value) {
            if ($table->hasColumn($columnName)) {
                $column = $table->getColumn($columnName);
                $value = call_user_func($handler, $operation, $tableName, $column->serialize(), $value);
            }
        }
        return (object) $context;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $operation = $this->utils->getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableName = $this->utils->getPathSegment($request, 2);
            if ($this->reflection->hasTable($tableName)) {
                $record = $request->getBody();
                if ($record !== null) {
                    $handler = $this->getProperty('handler', '');
                    if ($handler !== '') {
                        $table = $this->reflection->getTable($tableName);
                        if (is_array($record)) {
                            foreach ($record as &$r) {
                                $r = $this->callHandler($handler, $r, $operation, $table);
                            }
                        } else {
                            $record = $this->callHandler($handler, $record, $operation, $table);
                        }
                        $request->setBody($record);
                    }
                }
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/ValidationMiddleware.php

class ValidationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function callHandler($handler, $record, String $operation, ReflectedTable $table) /*: Response?*/
    {
        $context = (array) $record;
        $details = array();
        $tableName = $table->getName();
        foreach ($context as $columnName => $value) {
            if ($table->hasColumn($columnName)) {
                $column = $table->getColumn($columnName);
                $valid = call_user_func($handler, $operation, $tableName, $column->serialize(), $value, $context);
                if ($valid !== true && $valid !== '') {
                    $details[$columnName] = $valid;
                }
            }
        }
        if (count($details) > 0) {
            return $this->responder->error(ErrorCode::INPUT_VALIDATION_FAILED, $tableName, $details);
        }
        return null;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $operation = $this->utils->getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableName = $this->utils->getPathSegment($request, 2);
            if ($this->reflection->hasTable($tableName)) {
                $record = $request->getBody();
                if ($record !== null) {
                    $handler = $this->getProperty('handler', '');
                    if ($handler !== '') {
                        $table = $this->reflection->getTable($tableName);
                        if (is_array($record)) {
                            foreach ($record as $r) {
                                $response = $this->callHandler($handler, $r, $operation, $table);
                                if ($response !== null) {
                                    return $response;
                                }
                            }
                        } else {
                            $response = $this->callHandler($handler, $record, $operation, $table);
                            if ($response !== null) {
                                return $response;
                            }
                        }
                    }
                }
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/XsrfMiddleware.php

class XsrfMiddleware extends Middleware
{
    private function getToken(): String
    {
        $cookieName = $this->getProperty('cookieName', 'XSRF-TOKEN');
        if (isset($_COOKIE[$cookieName])) {
            $token = $_COOKIE[$cookieName];
        } else {
            $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
            $token = bin2hex(random_bytes(8));
            if (!headers_sent()) {
                setcookie($cookieName, $token, 0, '', '', $secure);
            }
        }
        return $token;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $token = $this->getToken();
        $method = $request->getMethod();
        $excludeMethods = $this->getArrayProperty('excludeMethods', 'OPTIONS,GET');
        if (!in_array($method, $excludeMethods)) {
            $headerName = $this->getProperty('headerName', 'X-XSRF-TOKEN');
            if ($token != $request->getHeader($headerName)) {
                return $this->responder->error(ErrorCode::BAD_OR_MISSING_XSRF_TOKEN, '');
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/OpenApi/OpenApiBuilder.php

class OpenApiBuilder
{
    private $openapi;
    private $reflection;
    private $operations = [
        'list' => 'get',
        'create' => 'post',
        'read' => 'get',
        'update' => 'put',
        'delete' => 'delete',
        'increment' => 'patch',
    ];
    private $types = [
        'integer' => ['type' => 'integer', 'format' => 'int32'],
        'bigint' => ['type' => 'integer', 'format' => 'int64'],
        'varchar' => ['type' => 'string'],
        'clob' => ['type' => 'string'],
        'varbinary' => ['type' => 'string', 'format' => 'byte'],
        'blob' => ['type' => 'string', 'format' => 'byte'],
        'decimal' => ['type' => 'string'],
        'float' => ['type' => 'number', 'format' => 'float'],
        'double' => ['type' => 'number', 'format' => 'double'],
        'date' => ['type' => 'string', 'format' => 'date'],
        'time' => ['type' => 'string', 'format' => 'date-time'],
        'timestamp' => ['type' => 'string', 'format' => 'date-time'],
        'geometry' => ['type' => 'string'],
        'boolean' => ['type' => 'boolean'],
    ];

    public function __construct(ReflectionService $reflection, $base)
    {
        $this->reflection = $reflection;
        $this->openapi = new OpenApiDefinition($base);
    }

    private function getServerUrl(): String
    {
        $protocol = @$_SERVER['HTTP_X_FORWARDED_PROTO'] ?: @$_SERVER['REQUEST_SCHEME'] ?: ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https" : "http");
        $port = @intval($_SERVER['HTTP_X_FORWARDED_PORT']) ?: @intval($_SERVER["SERVER_PORT"]) ?: (($protocol === 'https') ? 443 : 80);
        $host = @explode(":", $_SERVER['HTTP_HOST'])[0] ?: @$_SERVER['SERVER_NAME'] ?: @$_SERVER['SERVER_ADDR'];
        $port = ($protocol === 'https' && $port === 443) || ($protocol === 'http' && $port === 80) ? '' : ':' . $port;
        $path = @trim(substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '/openapi')), '/');
        return sprintf('%s://%s%s/%s', $protocol, $host, $port, $path);
    }

    private function getAllTableReferences(): array
    {
        $tableReferences = array();
        foreach ($this->reflection->getTableNames() as $tableName) {
            $table = $this->reflection->getTable($tableName);
            foreach ($table->getColumnNames() as $columnName) {
                $column = $table->getColumn($columnName);
                $referencedTableName = $column->getFk();
                if ($referencedTableName) {
                    if (!isset($tableReferences[$referencedTableName])) {
                        $tableReferences[$referencedTableName] = array();
                    }
                    $tableReferences[$referencedTableName][] = "$tableName.$columnName";
                }
            }
        }
        return $tableReferences;
    }

    public function build(): OpenApiDefinition
    {
        $this->openapi->set("openapi", "3.0.0");
        if (!$this->openapi->has("servers") && isset($_SERVER['REQUEST_URI'])) {
            $this->openapi->set("servers|0|url", $this->getServerUrl());
        }
        $tableNames = $this->reflection->getTableNames();
        foreach ($tableNames as $tableName) {
            $this->setPath($tableName);
        }
        $this->openapi->set("components|responses|pk_integer|description", "inserted primary key value (integer)");
        $this->openapi->set("components|responses|pk_integer|content|application/json|schema|type", "integer");
        $this->openapi->set("components|responses|pk_integer|content|application/json|schema|format", "int64");
        $this->openapi->set("components|responses|pk_string|description", "inserted primary key value (string)");
        $this->openapi->set("components|responses|pk_string|content|application/json|schema|type", "string");
        $this->openapi->set("components|responses|pk_string|content|application/json|schema|format", "uuid");
        $this->openapi->set("components|responses|rows_affected|description", "number of rows affected (integer)");
        $this->openapi->set("components|responses|rows_affected|content|application/json|schema|type", "integer");
        $this->openapi->set("components|responses|rows_affected|content|application/json|schema|format", "int64");
        $tableReferences = $this->getAllTableReferences();
        foreach ($tableNames as $tableName) {
            $references = isset($tableReferences[$tableName]) ? $tableReferences[$tableName] : array();
            $this->setComponentSchema($tableName, $references);
            $this->setComponentResponse($tableName);
            $this->setComponentRequestBody($tableName);
        }
        $this->setComponentParameters();
        foreach ($tableNames as $index => $tableName) {
            $this->setTag($index, $tableName);
        }
        return $this->openapi;
    }

    private function isOperationOnTableAllowed(String $operation, String $tableName): bool
    {
        $tableHandler = VariableStore::get('authorization.tableHandler');
        if (!$tableHandler) {
            return true;
        }
        return (bool) call_user_func($tableHandler, $operation, $tableName);
    }

    private function isOperationOnColumnAllowed(String $operation, String $tableName, String $columnName): bool
    {
        $columnHandler = VariableStore::get('authorization.columnHandler');
        if (!$columnHandler) {
            return true;
        }
        return (bool) call_user_func($columnHandler, $operation, $tableName, $columnName);
    }

    private function setPath(String $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach ($this->operations as $operation => $method) {
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if ($type != 'table' && $operation != 'list') {
                continue;
            }
            if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            $parameters = [];
            if (in_array($operation, ['list', 'create'])) {
                $path = sprintf('/records/%s', $tableName);
                if ($operation == 'list') {
                    $parameters = ['filter', 'include', 'exclude', 'order', 'size', 'page', 'join'];
                }
            } else {
                $path = sprintf('/records/%s/{%s}', $tableName, $pkName);
                if ($operation == 'read') {
                    $parameters = ['pk', 'include', 'exclude', 'join'];
                } else {
                    $parameters = ['pk'];
                }
            }
            foreach ($parameters as $p => $parameter) {
                $this->openapi->set("paths|$path|$method|parameters|$p|\$ref", "#/components/parameters/$parameter");
            }
            if (in_array($operation, ['create', 'update', 'increment'])) {
                $this->openapi->set("paths|$path|$method|requestBody|\$ref", "#/components/requestBodies/$operation-" . urlencode($tableName));
            }
            $this->openapi->set("paths|$path|$method|tags|0", "$tableName");
            $this->openapi->set("paths|$path|$method|description", "$operation $tableName");
            switch ($operation) {
                case 'list':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-" . urlencode($tableName));
                    break;
                case 'create':
                    if ($pk->getType() == 'integer') {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_integer");
                    } else {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_string");
                    }
                    break;
                case 'read':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-" . urlencode($tableName));
                    break;
                case 'update':
                case 'delete':
                case 'increment':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/rows_affected");
                    break;
            }
        }
    }

    private function setComponentSchema(String $tableName, array $references) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach ($this->operations as $operation => $method) {
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if ($type != 'table' && $operation != 'list') {
                continue;
            }
            if ($operation == 'delete') {
                continue;
            }
            if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            if ($operation == 'list') {
                $this->openapi->set("components|schemas|$operation-$tableName|type", "object");
                $this->openapi->set("components|schemas|$operation-$tableName|properties|results|type", "integer");
                $this->openapi->set("components|schemas|$operation-$tableName|properties|results|format", "int64");
                $this->openapi->set("components|schemas|$operation-$tableName|properties|records|type", "array");
                $prefix = "components|schemas|$operation-$tableName|properties|records|items";
            } else {
                $prefix = "components|schemas|$operation-$tableName";
            }
            $this->openapi->set("$prefix|type", "object");
            foreach ($table->getColumnNames() as $columnName) {
                if (!$this->isOperationOnColumnAllowed($operation, $tableName, $columnName)) {
                    continue;
                }
                $column = $table->getColumn($columnName);
                $properties = $this->types[$column->getType()];
                foreach ($properties as $key => $value) {
                    $this->openapi->set("$prefix|properties|$columnName|$key", $value);
                }
                if ($column->getPk()) {
                    $this->openapi->set("$prefix|properties|$columnName|x-primary-key", true);
                    $this->openapi->set("$prefix|properties|$columnName|x-referenced", $references);
                }
                $fk = $column->getFk();
                if ($fk) {
                    $this->openapi->set("$prefix|properties|$columnName|x-references", $fk);
                }
            }
        }
    }

    private function setComponentResponse(String $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach (['list', 'read'] as $operation) {
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if ($type != 'table' && $operation != 'list') {
                continue;
            }
            if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            if ($operation == 'list') {
                $this->openapi->set("components|responses|$operation-$tableName|description", "list of $tableName records");
            } else {
                $this->openapi->set("components|responses|$operation-$tableName|description", "single $tableName record");
            }
            $this->openapi->set("components|responses|$operation-$tableName|content|application/json|schema|\$ref", "#/components/schemas/$operation-" . urlencode($tableName));
        }
    }

    private function setComponentRequestBody(String $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        if ($pkName && $type == 'table') {
            foreach (['create', 'update', 'increment'] as $operation) {
                if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                    continue;
                }
                $this->openapi->set("components|requestBodies|$operation-$tableName|description", "single $tableName record");
                $this->openapi->set("components|requestBodies|$operation-$tableName|content|application/json|schema|\$ref", "#/components/schemas/$operation-" . urlencode($tableName));
            }
        }
    }

    private function setComponentParameters() /*: void*/
    {
        $this->openapi->set("components|parameters|pk|name", "id");
        $this->openapi->set("components|parameters|pk|in", "path");
        $this->openapi->set("components|parameters|pk|schema|type", "string");
        $this->openapi->set("components|parameters|pk|description", "primary key value");
        $this->openapi->set("components|parameters|pk|required", true);

        $this->openapi->set("components|parameters|filter|name", "filter");
        $this->openapi->set("components|parameters|filter|in", "query");
        $this->openapi->set("components|parameters|filter|schema|type", "array");
        $this->openapi->set("components|parameters|filter|schema|items|type", "string");
        $this->openapi->set("components|parameters|filter|description", "Filters to be applied. Each filter consists of a column, an operator and a value (comma separated). Example: id,eq,1");
        $this->openapi->set("components|parameters|filter|required", false);

        $this->openapi->set("components|parameters|include|name", "include");
        $this->openapi->set("components|parameters|include|in", "query");
        $this->openapi->set("components|parameters|include|schema|type", "string");
        $this->openapi->set("components|parameters|include|description", "Columns you want to include in the output (comma separated). Example: posts.*,categories.name");
        $this->openapi->set("components|parameters|include|required", false);

        $this->openapi->set("components|parameters|exclude|name", "exclude");
        $this->openapi->set("components|parameters|exclude|in", "query");
        $this->openapi->set("components|parameters|exclude|schema|type", "string");
        $this->openapi->set("components|parameters|exclude|description", "Columns you want to exclude from the output (comma separated). Example: posts.content");
        $this->openapi->set("components|parameters|exclude|required", false);

        $this->openapi->set("components|parameters|order|name", "order");
        $this->openapi->set("components|parameters|order|in", "query");
        $this->openapi->set("components|parameters|order|schema|type", "array");
        $this->openapi->set("components|parameters|order|schema|items|type", "string");
        $this->openapi->set("components|parameters|order|description", "Column you want to sort on and the sort direction (comma separated). Example: id,desc");
        $this->openapi->set("components|parameters|order|required", false);

        $this->openapi->set("components|parameters|size|name", "size");
        $this->openapi->set("components|parameters|size|in", "query");
        $this->openapi->set("components|parameters|size|schema|type", "string");
        $this->openapi->set("components|parameters|size|description", "Maximum number of results (for top lists). Example: 10");
        $this->openapi->set("components|parameters|size|required", false);

        $this->openapi->set("components|parameters|page|name", "page");
        $this->openapi->set("components|parameters|page|in", "query");
        $this->openapi->set("components|parameters|page|schema|type", "string");
        $this->openapi->set("components|parameters|page|description", "Page number and page size (comma separated). Example: 1,10");
        $this->openapi->set("components|parameters|page|required", false);

        $this->openapi->set("components|parameters|join|name", "join");
        $this->openapi->set("components|parameters|join|in", "query");
        $this->openapi->set("components|parameters|join|schema|type", "array");
        $this->openapi->set("components|parameters|join|schema|items|type", "string");
        $this->openapi->set("components|parameters|join|description", "Paths (comma separated) to related entities that you want to include. Example: comments,users");
        $this->openapi->set("components|parameters|join|required", false);
    }

    private function setTag(int $index, String $tableName) /*: void*/
    {
        $this->openapi->set("tags|$index|name", "$tableName");
        $this->openapi->set("tags|$index|description", "$tableName operations");
    }
}

// file: src/Tqdev/PhpCrudApi/OpenApi/OpenApiDefinition.php

class OpenApiDefinition implements \JsonSerializable
{
    private $root;

    public function __construct($base)
    {
        $this->root = $base;
    }

    public function set(String $path, $value) /*: void*/
    {
        $parts = explode('|', trim($path, '|'));
        $current = &$this->root;
        while (count($parts) > 0) {
            $part = array_shift($parts);
            if (!isset($current[$part])) {
                $current[$part] = [];
            }
            $current = &$current[$part];
        }
        $current = $value;
    }

    public function has(String $path): bool
    {
        $parts = explode('|', trim($path, '|'));
        $current = &$this->root;
        while (count($parts) > 0) {
            $part = array_shift($parts);
            if (!isset($current[$part])) {
                return false;
            }
            $current = &$current[$part];
        }
        return true;
    }

    public function jsonSerialize()
    {
        return $this->root;
    }
}

// file: src/Tqdev/PhpCrudApi/OpenApi/OpenApiService.php

class OpenApiService
{
    private $builder;

    public function __construct(ReflectionService $reflection, array $base)
    {
        $this->builder = new OpenApiBuilder($reflection, $base);
    }

    public function get(): OpenApiDefinition
    {
        return $this->builder->build();
    }

}

// file: src/Tqdev/PhpCrudApi/Record/Condition/AndCondition.php

class AndCondition extends Condition
{
    private $conditions;

    public function __construct(Condition $condition1, Condition $condition2)
    {
        $this->conditions = [$condition1, $condition2];
    }

    public function _and(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        $this->conditions[] = $condition;
        return $this;
    }

    public function getConditions(): array
    {
        return $this->conditions;
    }

    public static function fromArray(array $conditions): Condition
    {
        $condition = new NoCondition();
        foreach ($conditions as $c) {
            $condition = $condition->_and($c);
        }
        return $condition;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/ColumnCondition.php

class ColumnCondition extends Condition
{
    private $column;
    private $operator;
    private $value;

    public function __construct(ReflectedColumn $column, String $operator, String $value)
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function getColumn(): ReflectedColumn
    {
        return $this->column;
    }

    public function getOperator(): String
    {
        return $this->operator;
    }

    public function getValue(): String
    {
        return $this->value;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/Condition.php

abstract class Condition
{
    public function _and(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        return new AndCondition($this, $condition);
    }

    public function _or(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        return new OrCondition($this, $condition);
    }

    public function _not(): Condition
    {
        return new NotCondition($this);
    }

    public static function fromString(ReflectedTable $table, String $value): Condition
    {
        $condition = new NoCondition();
        $parts = explode(',', $value, 3);
        if (count($parts) < 2) {
            return $condition;
        }
        if (count($parts) < 3) {
            $parts[2] = '';
        }
        $field = $table->getColumn($parts[0]);
        $command = $parts[1];
        $negate = false;
        $spatial = false;
        if (strlen($command) > 2) {
            if (substr($command, 0, 1) == 'n') {
                $negate = true;
                $command = substr($command, 1);
            }
            if (substr($command, 0, 1) == 's') {
                $spatial = true;
                $command = substr($command, 1);
            }
        }
        if ($spatial) {
            if (in_array($command, ['co', 'cr', 'di', 'eq', 'in', 'ov', 'to', 'wi', 'ic', 'is', 'iv'])) {
                $condition = new SpatialCondition($field, $command, $parts[2]);
            }
        } else {
            if (in_array($command, ['cs', 'sw', 'ew', 'eq', 'lt', 'le', 'ge', 'gt', 'bt', 'in', 'is'])) {
                $condition = new ColumnCondition($field, $command, $parts[2]);
            }
        }
        if ($negate) {
            $condition = $condition->_not();
        }
        return $condition;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/Condition/NoCondition.php

class NoCondition extends Condition
{
    public function _and(Condition $condition): Condition
    {
        return $condition;
    }

    public function _or(Condition $condition): Condition
    {
        return $condition;
    }

    public function _not(): Condition
    {
        return $this;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/Condition/NotCondition.php

class NotCondition extends Condition
{
    private $condition;

    public function __construct(Condition $condition)
    {
        $this->condition = $condition;
    }

    public function getCondition(): Condition
    {
        return $this->condition;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/OrCondition.php

class OrCondition extends Condition
{
    private $conditions;

    public function __construct(Condition $condition1, Condition $condition2)
    {
        $this->conditions = [$condition1, $condition2];
    }

    public function _or(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        $this->conditions[] = $condition;
        return $this;
    }

    public function getConditions(): array
    {
        return $this->conditions;
    }

    public static function fromArray(array $conditions): Condition
    {
        $condition = new NoCondition();
        foreach ($conditions as $c) {
            $condition = $condition->_or($c);
        }
        return $condition;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/SpatialCondition.php

class SpatialCondition extends ColumnCondition
{
}

// file: src/Tqdev/PhpCrudApi/Record/Document/ErrorDocument.php

class ErrorDocument implements \JsonSerializable
{
    public $code;
    public $message;
    public $details;

    public function __construct(ErrorCode $errorCode, String $argument, $details)
    {
        $this->code = $errorCode->getCode();
        $this->message = $errorCode->getMessage($argument);
        $this->details = $details;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): String
    {
        return $this->message;
    }

    public function serialize()
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'details' => $this->details,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize());
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Document/ListDocument.php

class ListDocument implements \JsonSerializable
{

    private $records;

    private $results;

    public function __construct(array $records, int $results)
    {
        $this->records = $records;
        $this->results = $results;
    }

    public function getRecords(): array
    {
        return $this->records;
    }

    public function getResults(): int
    {
        return $this->results;
    }

    public function serialize()
    {
        return [
            'records' => $this->records,
            'results' => $this->results,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize(), function ($v) {
            return $v !== 0;
        });
    }
}

// file: src/Tqdev/PhpCrudApi/Record/ColumnIncluder.php

class ColumnIncluder
{

    private function isMandatory(String $tableName, String $columnName, array $params): bool
    {
        return isset($params['mandatory']) && in_array($tableName . "." . $columnName, $params['mandatory']);
    }

    private function select(String $tableName, bool $primaryTable, array $params, String $paramName,
        array $columnNames, bool $include): array{
        if (!isset($params[$paramName])) {
            return $columnNames;
        }
        $columns = array();
        foreach (explode(',', $params[$paramName][0]) as $columnName) {
            $columns[$columnName] = true;
        }
        $result = array();
        foreach ($columnNames as $columnName) {
            $match = isset($columns['*.*']);
            if (!$match) {
                $match = isset($columns[$tableName . '.*']) || isset($columns[$tableName . '.' . $columnName]);
            }
            if ($primaryTable && !$match) {
                $match = isset($columns['*']) || isset($columns[$columnName]);
            }
            if ($match) {
                if ($include || $this->isMandatory($tableName, $columnName, $params)) {
                    $result[] = $columnName;
                }
            } else {
                if (!$include || $this->isMandatory($tableName, $columnName, $params)) {
                    $result[] = $columnName;
                }
            }
        }
        return $result;
    }

    public function getNames(ReflectedTable $table, bool $primaryTable, array $params): array
    {
        $tableName = $table->getName();
        $results = $table->getColumnNames();
        $results = $this->select($tableName, $primaryTable, $params, 'include', $results, true);
        $results = $this->select($tableName, $primaryTable, $params, 'exclude', $results, false);
        return $results;
    }

    public function getValues(ReflectedTable $table, bool $primaryTable, /* object */ $record, array $params): array
    {
        $results = array();
        $columnNames = $this->getNames($table, $primaryTable, $params);
        foreach ($columnNames as $columnName) {
            if (property_exists($record, $columnName)) {
                $results[$columnName] = $record->$columnName;
            }
        }
        return $results;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/ErrorCode.php

class ErrorCode
{

    private $code;
    private $message;
    private $status;

    const ERROR_NOT_FOUND = 9999;
    const ROUTE_NOT_FOUND = 1000;
    const TABLE_NOT_FOUND = 1001;
    const ARGUMENT_COUNT_MISMATCH = 1002;
    const RECORD_NOT_FOUND = 1003;
    const ORIGIN_FORBIDDEN = 1004;
    const COLUMN_NOT_FOUND = 1005;
    const TABLE_ALREADY_EXISTS = 1006;
    const COLUMN_ALREADY_EXISTS = 1007;
    const HTTP_MESSAGE_NOT_READABLE = 1008;
    const DUPLICATE_KEY_EXCEPTION = 1009;
    const DATA_INTEGRITY_VIOLATION = 1010;
    const AUTHENTICATION_REQUIRED = 1011;
    const AUTHENTICATION_FAILED = 1012;
    const INPUT_VALIDATION_FAILED = 1013;
    const OPERATION_FORBIDDEN = 1014;
    const OPERATION_NOT_SUPPORTED = 1015;
    const TEMPORARY_OR_PERMANENTLY_BLOCKED = 1016;
    const BAD_OR_MISSING_XSRF_TOKEN = 1017;
    const ONLY_AJAX_REQUESTS_ALLOWED = 1018;
    const PAGINATION_FORBIDDEN = 1019;

    private $values = [
        9999 => ["%s", Response::INTERNAL_SERVER_ERROR],
        1000 => ["Route '%s' not found", Response::NOT_FOUND],
        1001 => ["Table '%s' not found", Response::NOT_FOUND],
        1002 => ["Argument count mismatch in '%s'", Response::UNPROCESSABLE_ENTITY],
        1003 => ["Record '%s' not found", Response::NOT_FOUND],
        1004 => ["Origin '%s' is forbidden", Response::FORBIDDEN],
        1005 => ["Column '%s' not found", Response::NOT_FOUND],
        1006 => ["Table '%s' already exists", Response::CONFLICT],
        1007 => ["Column '%s' already exists", Response::CONFLICT],
        1008 => ["Cannot read HTTP message", Response::UNPROCESSABLE_ENTITY],
        1009 => ["Duplicate key exception", Response::CONFLICT],
        1010 => ["Data integrity violation", Response::CONFLICT],
        1011 => ["Authentication required", Response::UNAUTHORIZED],
        1012 => ["Authentication failed for '%s'", Response::FORBIDDEN],
        1013 => ["Input validation failed for '%s'", Response::UNPROCESSABLE_ENTITY],
        1014 => ["Operation forbidden", Response::FORBIDDEN],
        1015 => ["Operation '%s' not supported", Response::METHOD_NOT_ALLOWED],
        1016 => ["Temporary or permanently blocked", Response::FORBIDDEN],
        1017 => ["Bad or missing XSRF token", Response::FORBIDDEN],
        1018 => ["Only AJAX requests allowed for '%s'", Response::FORBIDDEN],
        1019 => ["Pagination forbidden", Response::FORBIDDEN],
    ];

    public function __construct(int $code)
    {
        if (!isset($this->values[$code])) {
            $code = 9999;
        }
        $this->code = $code;
        $this->message = $this->values[$code][0];
        $this->status = $this->values[$code][1];
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(String $argument): String
    {
        return sprintf($this->message, $argument);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/FilterInfo.php

class FilterInfo
{

    private function addConditionFromFilterPath(PathTree $conditions, array $path, ReflectedTable $table, array $params)
    {
        $key = 'filter' . implode('', $path);
        if (isset($params[$key])) {
            foreach ($params[$key] as $filter) {
                $condition = Condition::fromString($table, $filter);
                if (($condition instanceof NoCondition) == false) {
                    $conditions->put($path, $condition);
                }
            }
        }
    }

    private function getConditionsAsPathTree(ReflectedTable $table, array $params): PathTree
    {
        $conditions = new PathTree();
        $this->addConditionFromFilterPath($conditions, [], $table, $params);
        for ($n = ord('0'); $n <= ord('9'); $n++) {
            $this->addConditionFromFilterPath($conditions, [chr($n)], $table, $params);
            for ($l = ord('a'); $l <= ord('f'); $l++) {
                $this->addConditionFromFilterPath($conditions, [chr($n), chr($l)], $table, $params);
            }
        }
        return $conditions;
    }

    private function combinePathTreeOfConditions(PathTree $tree): Condition
    {
        $andConditions = $tree->getValues();
        $and = AndCondition::fromArray($andConditions);
        $orConditions = [];
        foreach ($tree->getKeys() as $p) {
            $orConditions[] = $this->combinePathTreeOfConditions($tree->get($p));
        }
        $or = OrCondition::fromArray($orConditions);
        return $and->_and($or);
    }

    public function getCombinedConditions(ReflectedTable $table, array $params): Condition
    {
        return $this->combinePathTreeOfConditions($this->getConditionsAsPathTree($table, $params));
    }

}

// file: src/Tqdev/PhpCrudApi/Record/HabtmValues.php

class HabtmValues
{
    public $pkValues;
    public $fkValues;

    public function __construct(array $pkValues, array $fkValues)
    {
        $this->pkValues = $pkValues;
        $this->fkValues = $fkValues;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/OrderingInfo.php

class OrderingInfo
{

    public function getColumnOrdering(ReflectedTable $table, array $params): array
    {
        $fields = array();
        if (isset($params['order'])) {
            foreach ($params['order'] as $order) {
                $parts = explode(',', $order, 3);
                $columnName = $parts[0];
                if (!$table->hasColumn($columnName)) {
                    continue;
                }
                $ascending = 'ASC';
                if (count($parts) > 1) {
                    if (substr(strtoupper($parts[1]), 0, 4) == "DESC") {
                        $ascending = 'DESC';
                    }
                }
                $fields[] = [$columnName, $ascending];
            }
        }
        if (count($fields) == 0) {
            return $this->getDefaultColumnOrdering($table);
        }
        return $fields;
    }

    public function getDefaultColumnOrdering(ReflectedTable $table): array
    {
        $fields = array();
        $pk = $table->getPk();
        if ($pk) {
            $fields[] = [$pk->getName(), 'ASC'];
        } else {
            foreach ($table->getColumnNames() as $columnName) {
                $fields[] = [$columnName, 'ASC'];
            }
        }
        return $fields;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/PaginationInfo.php

class PaginationInfo
{

    public $DEFAULT_PAGE_SIZE = 20;

    public function hasPage(array $params): bool
    {
        return isset($params['page']);
    }

    public function getPageOffset(array $params): int
    {
        $offset = 0;
        $pageSize = $this->getPageSize($params);
        if (isset($params['page'])) {
            foreach ($params['page'] as $page) {
                $parts = explode(',', $page, 2);
                $page = intval($parts[0]) - 1;
                $offset = $page * $pageSize;
            }
        }
        return $offset;
    }

    private function getPageSize(array $params): int
    {
        $pageSize = $this->DEFAULT_PAGE_SIZE;
        if (isset($params['page'])) {
            foreach ($params['page'] as $page) {
                $parts = explode(',', $page, 2);
                if (count($parts) > 1) {
                    $pageSize = intval($parts[1]);
                }
            }
        }
        return $pageSize;
    }

    public function getResultSize(array $params): int
    {
        $numberOfRows = -1;
        if (isset($params['size'])) {
            foreach ($params['size'] as $size) {
                $numberOfRows = intval($size);
            }
        }
        return $numberOfRows;
    }

    public function getPageLimit(array $params): int
    {
        $pageLimit = -1;
        if ($this->hasPage($params)) {
            $pageLimit = $this->getPageSize($params);
        }
        $resultSize = $this->getResultSize($params);
        if ($resultSize >= 0) {
            if ($pageLimit >= 0) {
                $pageLimit = min($pageLimit, $resultSize);
            } else {
                $pageLimit = $resultSize;
            }
        }
        return $pageLimit;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/PathTree.php

class PathTree implements \JsonSerializable
{
    const WILDCARD = '*';

    private $tree;

    public function __construct( /* object */&$tree = null)
    {
        if (!$tree) {
            $tree = $this->newTree();
        }
        $this->tree = &$tree;
    }

    public function newTree()
    {
        return (object) ['values' => [], 'branches' => (object) []];
    }

    public function getKeys(): array
    {
        $branches = (array) $this->tree->branches;
        return array_keys($branches);
    }

    public function getValues(): array
    {
        return $this->tree->values;
    }

    public function get(String $key): PathTree
    {
        if (!isset($this->tree->branches->$key)) {
            return null;
        }
        return new PathTree($this->tree->branches->$key);
    }

    public function put(array $path, $value)
    {
        $tree = &$this->tree;
        foreach ($path as $key) {
            if (!isset($tree->branches->$key)) {
                $tree->branches->$key = $this->newTree();
            }
            $tree = &$tree->branches->$key;
        }
        $tree->values[] = $value;
    }

    public function match(array $path): array
    {
        $star = self::WILDCARD;
        $tree = &$this->tree;
        foreach ($path as $key) {
            if (isset($tree->branches->$key)) {
                $tree = &$tree->branches->$key;
            } else if (isset($tree->branches->$star)) {
                $tree = &$tree->branches->$star;
            } else {
                return [];
            }
        }
        return $tree->values;
    }

    public static function fromJson( /* object */$tree): PathTree
    {
        return new PathTree($tree);
    }

    public function jsonSerialize()
    {
        return $this->tree;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/RecordService.php

class RecordService
{
    private $db;
    private $reflection;
    private $columns;
    private $joiner;
    private $filters;
    private $ordering;
    private $pagination;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->reflection = $reflection;
        $this->columns = new ColumnIncluder();
        $this->joiner = new RelationJoiner($reflection, $this->columns);
        $this->filters = new FilterInfo();
        $this->ordering = new OrderingInfo();
        $this->pagination = new PaginationInfo();
    }

    private function sanitizeRecord(String $tableName, /* object */ $record, String $id)
    {
        $keyset = array_keys((array) $record);
        foreach ($keyset as $key) {
            if (!$this->reflection->getTable($tableName)->hasColumn($key)) {
                unset($record->$key);
            }
        }
        if ($id != '') {
            $pk = $this->reflection->getTable($tableName)->getPk();
            foreach ($this->reflection->getTable($tableName)->getColumnNames() as $key) {
                $field = $this->reflection->getTable($tableName)->getColumn($key);
                if ($field->getName() == $pk->getName()) {
                    unset($record->$key);
                }
            }
        }
    }

    public function hasTable(String $table): bool
    {
        return $this->reflection->hasTable($table);
    }

    public function getType(String $table): String
    {
        return $this->reflection->getType($table);
    }

    public function create(String $tableName, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, '');
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->createSingle($table, $columnValues);
    }

    public function read(String $tableName, String $id, array $params) /*: ?object*/
    {
        $table = $this->reflection->getTable($tableName);
        $this->joiner->addMandatoryColumns($table, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $record = $this->db->selectSingle($table, $columnNames, $id);
        if ($record == null) {
            return null;
        }
        $records = array($record);
        $this->joiner->addJoins($table, $records, $params, $this->db);
        return $records[0];
    }

    public function update(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->updateSingle($table, $columnValues, $id);
    }

    public function delete(String $tableName, String $id, array $params)
    {
        $table = $this->reflection->getTable($tableName);
        return $this->db->deleteSingle($table, $id);
    }

    public function increment(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->incrementSingle($table, $columnValues, $id);
    }

    public function _list(String $tableName, array $params): ListDocument
    {
        $table = $this->reflection->getTable($tableName);
        $this->joiner->addMandatoryColumns($table, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $condition = $this->filters->getCombinedConditions($table, $params);
        $columnOrdering = $this->ordering->getColumnOrdering($table, $params);
        if (!$this->pagination->hasPage($params)) {
            $offset = 0;
            $limit = $this->pagination->getPageLimit($params);
            $count = 0;
        } else {
            $offset = $this->pagination->getPageOffset($params);
            $limit = $this->pagination->getPageLimit($params);
            $count = $this->db->selectCount($table, $condition);
        }
        $records = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, $offset, $limit);
        $this->joiner->addJoins($table, $records, $params, $this->db);
        return new ListDocument($records, $count);
    }
}

// file: src/Tqdev/PhpCrudApi/Record/RelationJoiner.php

class RelationJoiner
{

    private $reflection;
    private $columns;

    public function __construct(ReflectionService $reflection, ColumnIncluder $columns)
    {
        $this->reflection = $reflection;
        $this->ordering = new OrderingInfo();
        $this->columns = $columns;
    }

    public function addMandatoryColumns(ReflectedTable $table, array &$params) /*: void*/
    {
        if (!isset($params['join']) || !isset($params['include'])) {
            return;
        }
        $params['mandatory'] = array();
        foreach ($params['join'] as $tableNames) {
            $t1 = $table;
            foreach (explode(',', $tableNames) as $tableName) {
                if (!$this->reflection->hasTable($tableName)) {
                    continue;
                }
                $t2 = $this->reflection->getTable($tableName);
                $fks1 = $t1->getFksTo($t2->getName());
                $t3 = $this->hasAndBelongsToMany($t1, $t2);
                if ($t3 != null || count($fks1) > 0) {
                    $params['mandatory'][] = $t2->getName() . '.' . $t2->getPk()->getName();
                }
                foreach ($fks1 as $fk) {
                    $params['mandatory'][] = $t1->getName() . '.' . $fk->getName();
                }
                $fks2 = $t2->getFksTo($t1->getName());
                if ($t3 != null || count($fks2) > 0) {
                    $params['mandatory'][] = $t1->getName() . '.' . $t1->getPk()->getName();
                }
                foreach ($fks2 as $fk) {
                    $params['mandatory'][] = $t2->getName() . '.' . $fk->getName();
                }
                $t1 = $t2;
            }
        }
    }

    private function getJoinsAsPathTree(array $params): PathTree
    {
        $joins = new PathTree();
        if (isset($params['join'])) {
            foreach ($params['join'] as $tableNames) {
                $path = array();
                foreach (explode(',', $tableNames) as $tableName) {
                    $t = $this->reflection->getTable($tableName);
                    if ($t != null) {
                        $path[] = $t->getName();
                    }
                }
                $joins->put($path, true);
            }
        }
        return $joins;
    }

    public function addJoins(ReflectedTable $table, array &$records, array $params, GenericDB $db) /*: void*/
    {
        $joins = $this->getJoinsAsPathTree($params);
        $this->addJoinsForTables($table, $joins, $records, $params, $db);
    }

    private function hasAndBelongsToMany(ReflectedTable $t1, ReflectedTable $t2) /*: ?ReflectedTable*/
    {
        foreach ($this->reflection->getTableNames() as $tableName) {
            $t3 = $this->reflection->getTable($tableName);
            if (count($t3->getFksTo($t1->getName())) > 0 && count($t3->getFksTo($t2->getName())) > 0) {
                return $t3;
            }
        }
        return null;
    }

    private function addJoinsForTables(ReflectedTable $t1, PathTree $joins, array &$records, array $params, GenericDB $db)
    {

        foreach ($joins->getKeys() as $t2Name) {

            $t2 = $this->reflection->getTable($t2Name);
            
            $belongsTo = count($t1->getFksTo($t2->getName())) > 0;
            $hasMany = count($t2->getFksTo($t1->getName())) > 0;
            if (!$belongsTo && !$hasMany) {
                $t3 = $this->hasAndBelongsToMany($t1, $t2);
            } else {
                $t3 = null;
            }
            $hasAndBelongsToMany = ($t3 != null);

            $newRecords = array();
            $fkValues = null;
            $pkValues = null;
            $habtmValues = null;

            if ($belongsTo) {
                $fkValues = $this->getFkEmptyValues($t1, $t2, $records);
                $this->addFkRecords($t2, $fkValues, $params, $db, $newRecords);
            } 
            if ($hasMany) {
                $pkValues = $this->getPkEmptyValues($t1, $records);
                $this->addPkRecords($t1, $t2, $pkValues, $params, $db, $newRecords);
            } 
            if ($hasAndBelongsToMany) {
                $habtmValues = $this->getHabtmEmptyValues($t1, $t2, $t3, $db, $records);
                $this->addFkRecords($t2, $habtmValues->fkValues, $params, $db, $newRecords);
            }

            $this->addJoinsForTables($t2, $joins->get($t2Name), $newRecords, $params, $db);

            if ($fkValues != null) {
                $this->fillFkValues($t2, $newRecords, $fkValues);
                $this->setFkValues($t1, $t2, $records, $fkValues);
            } 
            if ($pkValues != null) {
                $this->fillPkValues($t1, $t2, $newRecords, $pkValues);
                $this->setPkValues($t1, $t2, $records, $pkValues);
            } 
            if ($habtmValues != null) {
                $this->fillFkValues($t2, $newRecords, $habtmValues->fkValues);
                $this->setHabtmValues($t1, $t2, $records, $habtmValues);
            }
        }
    }

    private function getFkEmptyValues(ReflectedTable $t1, ReflectedTable $t2, array $records): array
    {
        $fkValues = array();
        $fks = $t1->getFksTo($t2->getName());
        foreach ($fks as $fk) {
            $fkName = $fk->getName();
            foreach ($records as $record) {
                if (isset($record[$fkName])) {
                    $fkValue = $record[$fkName];
                    $fkValues[$fkValue] = null;
                }
            }
        }
        return $fkValues;
    }

    private function addFkRecords(ReflectedTable $t2, array $fkValues, array $params, GenericDB $db, array &$records) /*: void*/
    {
        $columnNames = $this->columns->getNames($t2, false, $params);
        $fkIds = array_keys($fkValues);

        foreach ($db->selectMultiple($t2, $columnNames, $fkIds) as $record) {
            $records[] = $record;
        }
    }

    private function fillFkValues(ReflectedTable $t2, array $fkRecords, array &$fkValues) /*: void*/
    {
        $pkName = $t2->getPk()->getName();
        foreach ($fkRecords as $fkRecord) {
            $pkValue = $fkRecord[$pkName];
            $fkValues[$pkValue] = $fkRecord;
        }
    }

    private function setFkValues(ReflectedTable $t1, ReflectedTable $t2, array &$records, array $fkValues) /*: void*/
    {
        $fks = $t1->getFksTo($t2->getName());
        foreach ($fks as $fk) {
            $fkName = $fk->getName();
            foreach ($records as $i => $record) {
                if (isset($record[$fkName])) {
                    $key = $record[$fkName];
                    $records[$i][$fkName] = $fkValues[$key];
                }
            }
        }
    }

    private function getPkEmptyValues(ReflectedTable $t1, array $records): array
    {
        $pkValues = array();
        $pkName = $t1->getPk()->getName();
        foreach ($records as $record) {
            $key = $record[$pkName];
            $pkValues[$key] = array();
        }
        return $pkValues;
    }

    private function addPkRecords(ReflectedTable $t1, ReflectedTable $t2, array $pkValues, array $params, GenericDB $db, array &$records) /*: void*/
    {
        $fks = $t2->getFksTo($t1->getName());
        $columnNames = $this->columns->getNames($t2, false, $params);
        $pkValueKeys = implode(',', array_keys($pkValues));
        $conditions = array();
        foreach ($fks as $fk) {
            $conditions[] = new ColumnCondition($fk, 'in', $pkValueKeys);
        }
        $condition = OrCondition::fromArray($conditions);
        $columnOrdering = array();
        $limit = VariableStore::get("joinLimits.maxRecords") ?: -1;
        if ($limit != -1) {
            $columnOrdering = $this->ordering->getDefaultColumnOrdering($t2);
        }
        foreach ($db->selectAll($t2, $columnNames, $condition, $columnOrdering, 0, $limit) as $record) {
            $records[] = $record;
        }
    }

    private function fillPkValues(ReflectedTable $t1, ReflectedTable $t2, array $pkRecords, array &$pkValues) /*: void*/
    {
        $fks = $t2->getFksTo($t1->getName());
        foreach ($fks as $fk) {
            $fkName = $fk->getName();
            foreach ($pkRecords as $pkRecord) {
                $key = $pkRecord[$fkName];
                if (isset($pkValues[$key])) {
                    $pkValues[$key][] = $pkRecord;
                }
            }
        }
    }

    private function setPkValues(ReflectedTable $t1, ReflectedTable $t2, array &$records, array $pkValues) /*: void*/
    {
        $pkName = $t1->getPk()->getName();
        $t2Name = $t2->getName();

        foreach ($records as $i => $record) {
            $key = $record[$pkName];
            $records[$i][$t2Name] = $pkValues[$key];
        }
    }

    private function getHabtmEmptyValues(ReflectedTable $t1, ReflectedTable $t2, ReflectedTable $t3, GenericDB $db, array $records): HabtmValues
    {
        $pkValues = $this->getPkEmptyValues($t1, $records);
        $fkValues = array();

        $fk1 = $t3->getFksTo($t1->getName())[0];
        $fk2 = $t3->getFksTo($t2->getName())[0];

        $fk1Name = $fk1->getName();
        $fk2Name = $fk2->getName();

        $columnNames = array($fk1Name, $fk2Name);

        $pkIds = implode(',', array_keys($pkValues));
        $condition = new ColumnCondition($t3->getColumn($fk1Name), 'in', $pkIds);
        $columnOrdering = array();

        $limit = VariableStore::get("joinLimits.maxRecords") ?: -1;
        if ($limit != -1) {
            $columnOrdering = $this->ordering->getDefaultColumnOrdering($t3);
        }
        $records = $db->selectAll($t3, $columnNames, $condition, $columnOrdering, 0, $limit);
        foreach ($records as $record) {
            $val1 = $record[$fk1Name];
            $val2 = $record[$fk2Name];
            $pkValues[$val1][] = $val2;
            $fkValues[$val2] = null;
        }

        return new HabtmValues($pkValues, $fkValues);
    }

    private function setHabtmValues(ReflectedTable $t1, ReflectedTable $t2, array &$records, HabtmValues $habtmValues) /*: void*/
    {
        $pkName = $t1->getPk()->getName();
        $t2Name = $t2->getName();
        foreach ($records as $i => $record) {
            $key = $record[$pkName];
            $val = array();
            $fks = $habtmValues->pkValues[$key];
            foreach ($fks as $fk) {
                $val[] = $habtmValues->fkValues[$fk];
            }
            $records[$i][$t2Name] = $val;
        }
    }
}

// file: src/Tqdev/PhpCrudApi/Record/RequestUtils.php

class RequestUtils
{
    private $reflection;

    public function __construct(ReflectionService $reflection)
    {
        $this->reflection = $reflection;
    }

    public function getParams(ServerRequestInterface $request): array
    {
        $params = array();
        $query = $request->getUri()->getQuery();
        $query = str_replace('][]=', ']=', str_replace('=', '[]=', $query));
        parse_str($query, $params);
        return $params;
    }

    public function getPathSegment(ServerRequestInterface $request, int $part): String
    {
        $pathSegments = explode('/', rtrim($request->getUri()->getPath(), '/'));
        if ($part < 0 || $part >= count($pathSegments)) {
            return '';
        }
        return $pathSegments[$part];
    }

    public function getOperation(ServerRequestInterface $request): String
    {
        $method = $request->getMethod();
        $path = $this->utils->getPathSegment($request, 1);
        $hasPk = $this->utils->getPathSegment($request, 3) != '';
        switch ($path) {
            case 'openapi':
                return 'document';
            case 'columns':
                return $method == 'get' ? 'reflect' : 'remodel';
            case 'records':
                switch ($method) {
                    case 'POST':
                        return 'create';
                    case 'GET':
                        return $hasPk ? 'read' : 'list';
                    case 'PUT':
                        return 'update';
                    case 'DELETE':
                        return 'delete';
                    case 'PATCH':
                        return 'increment';
                }
        }
        return 'unknown';
    }

    private function getJoinTables(String $tableName, array $parameters): array
    {
        $uniqueTableNames = array();
        $uniqueTableNames[$tableName] = true;
        if (isset($parameters['join'])) {
            foreach ($parameters['join'] as $parameter) {
                $tableNames = explode(',', trim($parameter));
                foreach ($tableNames as $tableName) {
                    $uniqueTableNames[$tableName] = true;
                }
            }
        }
        return array_keys($uniqueTableNames);
    }

    public function getTableNames(ServerRequestInterface $request): array
    {
        $path = $this->utils->getPathSegment($request, 1);
        $tableName = $this->utils->getPathSegment($request, 2);
        $allTableNames = $this->reflection->getTableNames();
        switch ($path) {
            case 'openapi':
                return $allTableNames;
            case 'columns':
                return $tableName ? [$tableName] : $allTableNames;
            case 'records':
                return $this->getJoinTables($tableName, $this->utils->getParams($request));
        }
        return $allTableNames;
    }

}

// file: src/Tqdev/PhpCrudApi/Api.php

class Api
{
    private $router;
    private $responder;
    private $debug;

    public function __construct(Config $config)
    {
        $db = new GenericDB(
            $config->getDriver(),
            $config->getAddress(),
            $config->getPort(),
            $config->getDatabase(),
            $config->getUsername(),
            $config->getPassword()
        );
        $cache = CacheFactory::create($config);
        $reflection = new ReflectionService($db, $cache, $config->getCacheTime());
        $responder = new Responder();
        $router = new SimpleRouter($responder, $cache, $config->getCacheTime(), $config->getDebug());
        foreach ($config->getMiddlewares() as $middleware => $properties) {
            switch ($middleware) {
                case 'cors':
                    new CorsMiddleware($router, $responder, $properties);
                    break;
                case 'firewall':
                    new FirewallMiddleware($router, $responder, $properties);
                    break;
                case 'basicAuth':
                    new BasicAuthMiddleware($router, $responder, $properties);
                    break;
                case 'jwtAuth':
                    new JwtAuthMiddleware($router, $responder, $properties);
                    break;
                case 'validation':
                    new ValidationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'ipAddress':
                    new IpAddressMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'sanitation':
                    new SanitationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'multiTenancy':
                    new MultiTenancyMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'authorization':
                    new AuthorizationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'xsrf':
                    new XsrfMiddleware($router, $responder, $properties);
                    break;
                case 'pageLimits':
                    new PageLimitsMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'joinLimits':
                    new JoinLimitsMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'customization':
                    new CustomizationMiddleware($router, $responder, $properties, $reflection);
                    break;
            }
        }
        foreach ($config->getControllers() as $controller) {
            switch ($controller) {
                case 'records':
                    $records = new RecordService($db, $reflection);
                    new RecordController($router, $responder, $reflection, $records);
                    break;
                case 'columns':
                    $definition = new DefinitionService($db, $reflection);
                    new ColumnController($router, $responder, $reflection, $definition);
                    break;
                case 'cache':
                    new CacheController($router, $responder, $cache);
                    break;
                case 'openapi':
                    $openApi = new OpenApiService($reflection, $config->getOpenApiBase());
                    new OpenApiController($router, $responder, $openApi);
                    break;
            }
        }
        $this->router = $router;
        $this->responder = $responder;
        $this->debug = $config->getDebug();
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $response = null;
        try {
            $response = $this->router->route($request);
        } catch (\Throwable $e) {
            $response = $this->responder->error(ErrorCode::ERROR_NOT_FOUND, $e->getMessage());
            if ($this->debug) {
                $response->addExceptionHeaders($e);
            }
        }
        return $response;
    }
}

// file: src/Tqdev/PhpCrudApi/Config.php

class Config
{
    private $values = [
        'driver' => null,
        'address' => 'localhost',
        'port' => null,
        'username' => null,
        'password' => null,
        'database' => null,
        'middlewares' => 'cors',
        'controllers' => 'records,openapi',
        'cacheType' => 'TempFile',
        'cachePath' => '',
        'cacheTime' => 10,
        'debug' => false,
        'openApiBase' => '{"info":{"title":"PHP-CRUD-API","version":"1.0.0"}}',
    ];

    private function getDefaultDriver(array $values): String
    {
        if (isset($values['driver'])) {
            return $values['driver'];
        }
        return 'mysql';
    }

    private function getDefaultPort(String $driver): int
    {
        switch ($driver) {
            case 'mysql':return 3306;
            case 'pgsql':return 5432;
            case 'sqlsrv':return 1433;
        }
    }

    private function getDefaultAddress(String $driver): String
    {
        switch ($driver) {
            case 'mysql':return 'localhost';
            case 'pgsql':return 'localhost';
            case 'sqlsrv':return 'localhost';
        }
    }

    private function getDriverDefaults(String $driver): array
    {
        return [
            'driver' => $driver,
            'address' => $this->getDefaultAddress($driver),
            'port' => $this->getDefaultPort($driver),
        ];
    }

    public function __construct(array $values)
    {
        $driver = $this->getDefaultDriver($values);
        $defaults = $this->getDriverDefaults($driver);
        $newValues = array_merge($this->values, $defaults, $values);
        $newValues = $this->parseMiddlewares($newValues);
        $diff = array_diff_key($newValues, $this->values);
        if (!empty($diff)) {
            $key = array_keys($diff)[0];
            throw new \Exception("Config has invalid value '$key'");
        }
        $this->values = $newValues;
    }

    private function parseMiddlewares(array $values): array
    {
        $newValues = array();
        $properties = array();
        $middlewares = array_map('trim', explode(',', $values['middlewares']));
        foreach ($middlewares as $middleware) {
            $properties[$middleware] = [];
        }
        foreach ($values as $key => $value) {
            if (strpos($key, '.') === false) {
                $newValues[$key] = $value;
            } else {
                list($middleware, $key2) = explode('.', $key, 2);
                if (isset($properties[$middleware])) {
                    $properties[$middleware][$key2] = $value;
                } else {
                    throw new \Exception("Config has invalid value '$key'");
                }
            }
        }
        $newValues['middlewares'] = array_reverse($properties, true);
        return $newValues;
    }

    public function getDriver(): String
    {
        return $this->values['driver'];
    }

    public function getAddress(): String
    {
        return $this->values['address'];
    }

    public function getPort(): int
    {
        return $this->values['port'];
    }

    public function getUsername(): String
    {
        return $this->values['username'];
    }

    public function getPassword(): String
    {
        return $this->values['password'];
    }

    public function getDatabase(): String
    {
        return $this->values['database'];
    }

    public function getMiddlewares(): array
    {
        return $this->values['middlewares'];
    }

    public function getControllers(): array
    {
        return array_map('trim', explode(',', $this->values['controllers']));
    }

    public function getCacheType(): String
    {
        return $this->values['cacheType'];
    }

    public function getCachePath(): String
    {
        return $this->values['cachePath'];
    }

    public function getCacheTime(): int
    {
        return $this->values['cacheTime'];
    }

    public function getDebug(): String
    {
        return $this->values['debug'];
    }

    public function getOpenApiBase(): array
    {
        return json_decode($this->values['openApiBase'], true);
    }
}

// file: src/Tqdev/PhpCrudApi/RequestFactory.php

class RequestFactory
{
    public static function fromGlobals(): ServerRequestInterface
    {
        $psr17Factory = new Psr17Factory();
        $creator = new ServerRequestCreator($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);
        return $creator->fromGlobals();
    }

    public static function fromString(String $request): ServerRequestInterface
    {
        $parts = explode("\n\n", trim($request), 2);
        $lines = explode("\n", $parts[0]);
        $first = explode(' ', trim(array_shift($lines)), 2);
        $method = $first[0];
        $body = $parts[1];
        $url = isset($first[1]) ? $first[1] : '';

        $psr17Factory = new Psr17Factory();
        $serverRequest = $psr17Factory->createServerRequest($method, $url);
        if (isset($parts[1])) {
            $serverRequest = $serverRequest->withBody($body);
        }
        foreach ($lines as $line) {
            list($key, $value) = explode(':', $line, 2);
            $serverRequest = $serverRequest->withAddedHeader($key, $value);
        }
        return $serverRequest;
    }
}

// file: src/Tqdev/PhpCrudApi/Response.php

class Response
{
    const OK = 200;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const CONFLICT = 409;
    const UNPROCESSABLE_ENTITY = 422;
    const INTERNAL_SERVER_ERROR = 500;
    private $status;
    private $headers;
    private $body;

    public function __construct(int $status, $body)
    {
        $this->status = $status;
        $this->headers = array();
        $this->parseBody($body);
    }

    private function parseBody($body)
    {
        if ($body === '') {
            $this->body = '';
        } else {
            $data = json_encode($body, JSON_UNESCAPED_UNICODE);
            $this->addHeader('Content-Type', 'application/json');
            $this->addHeader('Content-Length', strlen($data));
            $this->body = $data;
        }
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getBody(): String
    {
        return $this->body;
    }

    public function addHeader(String $key, String $value)
    {
        $this->headers[$key] = $value;
    }

    public function getHeader(String $key): String
    {
        if (isset($this->headers[$key])) {
            return $this->headers[$key];
        }
        return null;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function output()
    {
        http_response_code($this->getStatus());
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
        echo $this->getBody();
    }

    public function addExceptionHeaders(\Throwable $e)
    {
        $this->addHeader('X-Exception-Name', get_class($e));
        $this->addHeader('X-Exception-Message', $e->getMessage());
        $this->addHeader('X-Exception-File', $e->getFile() . ':' . $e->getLine());
    }

    public function __toString(): String
    {
        $str = "$this->status\n";
        foreach ($this->headers as $key => $value) {
            $str .= "$key: $value\n";
        }
        if ($this->body !== '') {
            $str .= "\n";
            $str .= "$this->body\n";
        }
        return $str;
    }
}
