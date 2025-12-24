<?php
function getExcerpt($text, $maxWords = 10, $suffix = '...')
{
    // Clean the text
    $text = trim($text);

    // Split into words
    $words = preg_split('/\s+/', $text);

    // If text has fewer words than max, return it as is
    if (count($words) <= $maxWords) {
        return $text;
    }

    // Take first N words and join them
    $truncated = array_slice($words, 0, $maxWords);

    return implode(' ', $truncated) . $suffix;
}
