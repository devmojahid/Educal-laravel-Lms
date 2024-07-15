<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Symfony\Component\HttpFoundation\Response;

class XSS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $input = $request->all();
        $sanitized = Purifier::clean($input);
        array_walk_recursive($input, function(&$input) {
            $sanitized = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $input);
            $allowedTags = '<p><a><ul><li><ol><strong><svg><path><em><br><hr><h1><h2><h3><h4><h5><h6><img><iframe><div><span><table><thead><tbody><tr><th><td><blockquote><code><pre><del><ins><small><big><strike><u><center><font><b><i><u><s><sub><sup><img><video><audio><source><object><embed><param><iframe><figure><figcaption><mark><abbr><address><cite><bdo><q><dfn><kbd><samp><var><time><progress><meter><ruby><rt><rp><wbr><details><summary><menuitem><menu><command><legend><fieldset><datalist><keygen><output><style><link><meta><title><base><head><body><html><form><input><select><option><textarea><button><label><fieldset><legend><datalist><keygen><output>';
            $input = strip_tags($sanitized, $allowedTags);
        });
  
        $request->merge($sanitized);
        return $next($request);
    }

    /**
     * Sanitize input data.
     *
     * @param  array  $input
     * @return array
     */
    private function sanitizeInput(array $input)
    {
        // Implement your sanitization logic here
        // Example: Use Laravel's helper functions
        return array_map('htmlspecialchars', $input);
    }
}