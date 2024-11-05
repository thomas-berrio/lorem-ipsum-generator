# Lorem Ipsum Generator

This repository contains a simple PHP function that generates a lorem ipsum text with a specified number of words. It is designed to be flexible, allowing users to reproduce the same output with a provided seed or generate unique text by default.

## Features
- **Custom Word Count**: Specify how many words you want in the generated lorem ipsum text.
- **Seeded Randomness**: Use a seed to generate reproducible results, ensuring the same text is generated each time the seed is used.
- **Flexible Output**: Generates sentences of varying lengths with occasional commas for a more natural look.

## Usage

### Installation
To use the lorem ipsum generator, simply include the `lorem_ipsum.php` file in your project.

### Function Description
```php
/**
 * Generates a lorem ipsum text with a specified number of words.
 *
 * @param int $word_count The number of words to generate.
 * @param string|null $seed A seed to use for random generation (optional). If not provided, a random seed will be generated.
 * @return string The generated lorem ipsum text.
 */
function lorem_ipsum($word_count, $seed = null);
```

### Example
```php
// Generate a lorem ipsum text with 50 words
$text = lorem_ipsum(50);
echo $text;

// Generate a lorem ipsum text with 50 words using a specific seed
$text_with_seed = lorem_ipsum(50, "my_custom_seed");
echo $text_with_seed;
```

### Output Example
```
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi sapien, interdum id nulla, egestas nec purus. Metus malesuada at erat id finibus viverra.
```

## How It Works
The `lorem_ipsum` function uses a fixed array of Latin-like words to generate random sentences. Sentences are composed of between 3 and 15 words, and commas are occasionally inserted to create more natural-looking text. If a seed is provided, it is hashed using MD5 to initialize the random number generator, ensuring consistent output when the same seed is used.

## Contributing
If you would like to contribute to this project, feel free to submit a pull request or open an issue for discussion. Suggestions for new features or improvements are always welcome!

## License
This script is open-source and can be freely used or modified.

## Author
Created by Thomas Berrio. Feel free to contact me for any questions or suggestions!
