<?php

/**
 * Check if the request method is the specified method.
 *
 * @param string $method
 * @return bool
 */
function isMethod(string $method): bool
{
    return $_SERVER['REQUEST_METHOD'] === $method;
}

/**
 * Redirect to the specified URL.
 *
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}

/**
 * Return the specified data as JSON.
 *
 * @param array $data
 */
function json(array $data): void
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

/**
 * Get the request body as an array.
 *
 * @return array
 */
function getBody(): array
{
    return json_decode(file_get_contents('php://input'), true);
}
