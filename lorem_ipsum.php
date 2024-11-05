<?php
/**
 * Generates a lorem ipsum text with a specified number of words.
 *
 * @param int $word_count The number of words to generate.
 * @param string|null $seed A seed to use for random generation (optional). If not provided, a random seed will be generated.
 * @return string The generated lorem ipsum text.
 */
function lorem_ipsum($word_count, $seed = null) {
    // Array of words used to generate sentences.
    $lorem = [
        'lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'praesent',
        'interdum', 'dictum', 'mi', 'non', 'egestas', 'nulla', 'in', 'lacus', 'sed', 'sapien', 'placerat',
        'malesuada', 'at', 'erat', 'etiam', 'id', 'velit', 'finibus', 'viverra', 'maecenas', 'mattis', 'volutpat',
        'justo', 'vitae', 'vestibulum', 'metus', 'lobortis', 'mauris', 'luctus', 'leo', 'feugiat', 'nibh',
        'tincidunt', 'a', 'integer', 'facilisis', 'lacinia', 'ligula', 'ac', 'suspendisse', 'eleifend', 'nunc',
        'nec', 'pulvinar', 'quisque', 'ut', 'semper', 'auctor', 'tortor', 'mollis', 'est', 'suscipit', 'diam',
        'tempor', 'scelerisque', 'venenatis', 'quis', 'ultrices', 'tellus', 'nisi', 'phasellus', 'aliquam', 'molestie',
        'purus', 'convallis', 'cursus', 'ex', 'massa', 'fusce', 'felis', 'fringilla', 'faucibus', 'varius',
        'ante', 'primis', 'orci', 'et', 'posuere', 'cubilia', 'curae', 'proin', 'ultricies', 'hendrerit', 'ornare',
        'augue', 'pharetra', 'dapibus', 'nullam', 'sollicitudin', 'euismod', 'eget', 'pretium', 'vulputate',
        'urna', 'arcu', 'porttitor', 'quam', 'condimentum', 'consequat', 'tempus', 'vehicula', 'eros', 'nam', 'imperdiet',
        'hac', 'habitasse', 'platea', 'dictumst', 'sagittis', 'gravida', 'eu', 'commodo', 'dui', 'lectus',
        'vivamus', 'libero', 'vel', 'maximus', 'pellentesque', 'efficitur', 'class', 'aptent', 'taciti', 'sociosqu',
        'ad', 'litora', 'torquent', 'per', 'conubia', 'nostra', 'inceptos', 'himenaeos', 'fermentum', 'turpis', 'donec',
        'magna', 'porta', 'enim', 'curabitur', 'odio', 'rhoncus', 'blandit', 'potenti', 'senectus', 'netus', 'fames',
        'sodales', 'accumsan', 'congue', 'neque', 'duis', 'bibendum', 'laoreet', 'elementum', 'cras', 'aenean',
        'sem', 'ullamcorper', 'dignissim', 'risus', 'aliquet', 'habitant', 'morbi', 'tristique', 'nisl', 'iaculis'
    ];

    // Initialize the seed
    if ($seed === null) {
        $seed = md5(uniqid(mt_rand(), true));
    } else {
        $seed = md5($seed);
    }

    // Use the seed to initialize the random number generator
    mt_srand(hexdec(substr($seed, 0, 8)));

    // Generate sentences
    $sentences = [];
    $initial_word_count = $word_count;

    while ($word_count > 0) {
        // Determine the number of words for the current sentence (between 3 and 15 words, or remaining words if less)
        $current_word_count = min($word_count, mt_rand(3, 15));

        // Select random words
        $keys = array_rand($lorem, $current_word_count);
        if ($current_word_count == 1) {
            $keys = [$keys];
        }
        $words = array_map(function ($key) use ($lorem) {
            return $lorem[$key];
        }, $keys);
        $fragment = implode(' ', $words);

        // Randomly add commas in the sentence
        if (mt_rand(0, 100) < 30 && $current_word_count > 5) { // 30% chance to add a comma
            $comma_position = mt_rand(1, $current_word_count - 1);
            $words[$comma_position] .= ',';
            $fragment = implode(' ', $words);
        }

        // Capitalize the first letter and add a period at the end
        $sentences[] = ucfirst($fragment) . '.';

        // Update the remaining word count
        $word_count -= $current_word_count;
    }

    // Return all sentences concatenated with a space
    return implode(' ', $sentences);
}

?>
