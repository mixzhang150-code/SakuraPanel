<?php
require_once __DIR__ . '/../core/Smtp.php';

use SakuraPanel\Smtp;

function assertSameValue($expected, $actual, $message)
{
    if ($expected !== $actual) {
        fwrite(STDERR, "Assertion failed: {$message}\nExpected: " . var_export($expected, true) . "\nActual: " . var_export($actual, true) . "\n");
        exit(1);
    }
}

$smtp = new Smtp('smtp.example.com', 25, false, 'user', 'pass');
$reflection = new ReflectionClass(Smtp::class);
$extractDomain = $reflection->getMethod('extractDomainFromAddress');
$extractDomain->setAccessible(true);

assertSameValue('example.com', $extractDomain->invoke($smtp, 'alice@example.com'), 'Should extract normal domain');
assertSameValue('sub.example.com', $extractDomain->invoke($smtp, 'bob@sub.example.com'), 'Should extract sub-domain');
assertSameValue(false, $extractDomain->invoke($smtp, 'not-an-email-address'), 'Invalid address should return false');
assertSameValue(false, $extractDomain->invoke($smtp, 'also@invalid@address'), 'Address with multiple @ should return false');

echo "smtp_extract_domain_test passed\n";
