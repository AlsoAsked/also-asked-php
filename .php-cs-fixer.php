<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        'vendor',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->notName('_ide_helper*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(true)
    ->registerCustomFixers([
        ...new \PhpCsFixerCustomFixers\Fixers(),
        ...new \PedroTroller\CS\Fixer\Fixers(),
        new \AdamWojs\PhpCsFixerPhpdocForceFQCN\Fixer\Phpdoc\ForceFQCNFixer(),
    ])
    ->setRules([
        // Force FQCN (Fully-Qualified Class Name) in DocBlock comments.
        'AdamWojs/phpdoc_force_fqcn_fixer' => true,
        // Comments must be surrounded by spaces.
        \PhpCsFixerCustomFixers\Fixer\CommentSurroundedBySpacesFixer::name() => true,
        // Multiline comments or PHPDocs must contain an opening and closing line with no additional content.
        \PhpCsFixerCustomFixers\Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
        // There can be no duplicate array keys. Configuration options:
        \PhpCsFixerCustomFixers\Fixer\NoDuplicatedArrayKeyFixer::name() => true,
        // There can be no duplicate use statements.
        \PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer::name() => true,
        // Trailing comma in the list on the same line as the end of the block must be removed.
        \PhpCsFixerCustomFixers\Fixer\NoTrailingCommaInSinglelineFixer::name() => true,
        // There must be no useless parentheses.
        \PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer::name() => true,
        // PHPUnit assertions must have expected argument before actual one.
        \PhpCsFixerCustomFixers\Fixer\PhpUnitAssertArgumentsOrderFixer::name() => true,
        // PHPUnit assertions like assertCount and assertInstanceOf must be used over assertEquals/assertSame.
        \PhpCsFixerCustomFixers\Fixer\PhpUnitDedicatedAssertFixer::name() => true,
        // PHPUnit fail, markTestIncomplete and markTestSkipped functions should not be followed directly by return.
        \PhpCsFixerCustomFixers\Fixer\PhpUnitNoUselessReturnFixer::name() => true,
        // Generic array style should be used in PHPDoc.
        \PhpCsFixerCustomFixers\Fixer\PhpdocArrayStyleFixer::name() => true,
        // There must be no superfluous parameters in PHPDoc.
        \PhpCsFixerCustomFixers\Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
        // The @param annotations must be in the same order as the function parameters.
        \PhpCsFixerCustomFixers\Fixer\PhpdocParamOrderFixer::name() => true,
        // The @param annotations must have a type.
        \PhpCsFixerCustomFixers\Fixer\PhpdocParamTypeFixer::name() => true,
        // In PHPDoc, the class or interface element self should be preferred over the class name itself.
        \PhpCsFixerCustomFixers\Fixer\PhpdocSelfAccessorFixer::name() => true,
        // PHPDoc types commas must not be preceded by whitespace, and must be succeeded by single whitespace.
        \PhpCsFixerCustomFixers\Fixer\PhpdocTypesCommaSpacesFixer::name() => true,
        // PHPDoc types must be trimmed.
        \PhpCsFixerCustomFixers\Fixer\PhpdocTypesTrimFixer::name() => true,
        // Statements not followed by a semicolon must be followed by a single space. Configuration options:
        \PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer::name() => true,
        // Statements not preceded by a line break must be preceded by a single space.
        \PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer::name() => true,
        // A class that implements the __toString () method must explicitly implement the Stringable interface.
        \PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer::name() => true,
        // Exception messages MUST ends by ".", "…", "?" or "!".
        'PedroTroller/exceptions_punctuation' => true,
        // If the declaration of a method is too long, the arguments of this method MUST BE separated (one argument per line)
        'PedroTroller/line_break_between_method_arguments' => ['max-args' => false, 'max-length' => 120, 'automatic-argument-merge' => true],
        // Classy elements (method, property, ...) comments MUST BE a PhpDoc block
        'PedroTroller/comment_line_to_phpdoc_block' => true,
        // Each line of multi-line DocComments must have an asterisk [PSR-5] and must be aligned with the first one.
        'align_multiline_comment' => ['comment_type' => 'phpdocs_like'],
        // Each element of an array must be indented exactly once.
        'array_indentation' => true,
        // Converts simple usages of `array_push($x, $y);` to `$x[] = $y;`.
        'array_push' => true,
        // PHP arrays should be declared using the configured syntax.
        'array_syntax' => ['syntax' => 'short'],
        // Use the null coalescing assignment operator `??=` where possible.
        'assign_null_coalescing_to_coalesce_equal' => true,
        // Converts backtick operators to `shell_exec` calls.
        'backtick_to_shell_exec' => true,
        // Binary operators should be surrounded by space as configured.
        'binary_operator_spaces' => ['default' => 'single_space'],
        // There MUST be one blank line after the namespace declaration.
        'blank_line_after_namespace' => true,
        // Ensure there is no code on the same line as the PHP open tag and it is followed by a blank line.
        'blank_line_after_opening_tag' => true,
        // An empty line feed must precede any configured statement.
        'blank_line_before_statement' => ['statements' => ['break', 'case', 'continue', 'declare', 'default', 'do', 'exit', 'for', 'foreach', 'goto', 'if', 'include', 'include_once', 'phpdoc', 'require', 'require_once', 'return', 'switch', 'throw', 'try', 'while', 'yield', 'yield_from']],
        // Putting blank lines between `use` statement groups.
        'blank_line_between_import_groups' => true,
        // The body of each structure MUST be enclosed by braces. Braces should be properly placed. Body of braces should be properly indented.
        'braces' => ['allow_single_line_anonymous_class_with_empty_body' => false, 'allow_single_line_closure' => false, 'position_after_anonymous_constructs' => 'same', 'position_after_control_structures' => 'same', 'position_after_functions_and_oop_constructs' => 'next'],
        // A single space or none should be between cast and variable.
        'cast_spaces' => ['space' => 'single'],
        // Class, trait and interface elements must be separated with one or none blank line.
        'class_attributes_separation' => ['elements' => ['const' => 'one', 'method' => 'one', 'property' => 'one', 'trait_import' => 'none', 'case' => 'one']],
        // Whitespace around the keywords of a class, trait, enum or interfaces definition should be one space.
        'class_definition' => ['inline_constructor_arguments' => true, 'multi_line_extends_each_single_line' => true, 'single_item_single_line' => true, 'space_before_parenthesis' => false],
        // When referencing an internal class it must be written using the correct casing.
        'class_reference_name_casing' => true,
        // Namespace must not contain spacing, comments or PHPDoc.
        'clean_namespace' => true,
        // Using `isset($var) &&` multiple times should be done in one call.
        'combine_consecutive_issets' => true,
        // Calling `unset` on multiple items should be done in one call.
        'combine_consecutive_unsets' => true,
        // Replace multiple nested calls of `dirname` by only one call with second `$level` parameter. Requires PHP >= 7.0.
        'combine_nested_dirname' => true,
        // Comments with annotation should be docblock when used on structural elements.
        'comment_to_phpdoc' => ['ignored_tags' => []],
        // Remove extra spaces in a nullable typehint.
        'compact_nullable_typehint' => true,
        // Concatenation should be spaced according configuration.
        'concat_space' => ['spacing' => 'one'],
        // The PHP constants `true`, `false`, and `null` MUST be written using the correct casing.
        'constant_case' => ['case' => 'lower'],
        // The body of each control structure MUST be enclosed within braces.
        'control_structure_braces' => true,
        // Control structure continuation keyword must be on the configured line.
        'control_structure_continuation_position' => ['position' => 'same_line'],
        // Curly braces must be placed as configured.
        'curly_braces_position' => ['allow_single_line_anonymous_functions' => false, 'allow_single_line_empty_anonymous_classes' => false, 'anonymous_classes_opening_brace' => 'same_line', 'anonymous_functions_opening_brace' => 'same_line', 'classes_opening_brace' => 'next_line_unless_newline_at_signature_end', 'control_structures_opening_brace' => 'same_line', 'functions_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        // Equal sign in declare statement should be surrounded by spaces or not following configuration.
        'declare_equal_normalize' => ['space' => 'none'],
        // There must not be spaces around `declare` statement parentheses.
        'declare_parentheses' => true,
        // Replaces `dirname(__FILE__)` expression with equivalent `__DIR__` constant.
        'dir_constant' => true,
        // Replaces short-echo `<?=` with long format `<?php echo`/`<?php print` syntax, or vice-versa.
        'echo_tag_syntax' => ['format' => 'long', 'long_function' => 'echo', 'shorten_simple_statements_only' => false],
        // Empty loop-body must be in configured style.
        'empty_loop_body' => ['style' => 'braces'],
        // Empty loop-condition must be in configured style.
        'empty_loop_condition' => ['style' => 'while'],
        // PHP code MUST use only UTF-8 without BOM (remove BOM).
        'encoding' => true,
        // Add curly braces to indirect variables to make them clear to understand. Requires PHP >= 7.0.
        'explicit_indirect_variable' => true,
        // Converts implicit variables into explicit ones in double-quoted strings or heredoc syntax.
        'explicit_string_variable' => true,
        // PHP code must use the long `<?php` tags or short-echo `<?=` tags and not other tag variations.
        'full_opening_tag' => true,
        // Transforms imported FQCN parameters and return types in function arguments to short version.
        'fully_qualified_strict_types' => true,
        // Spaces should be properly placed in a function declaration.
        'function_declaration' => ['closure_fn_spacing' => 'none'],
        // Replace core functions calls returning constants with the constants.
        'function_to_constant' => ['functions' => ['get_called_class', 'get_class', 'get_class_this', 'php_sapi_name', 'phpversion', 'pi']],
        // Ensure single space between function's argument and its typehint.
        'function_typehint_space' => true,
        // Replace `get_class` calls on object variables with class keyword syntax.
        'get_class_to_class_keyword' => true,
        // Imports or fully qualifies global classes/functions/constants.
        'global_namespace_import' => ['import_classes' => null, 'import_constants' => null, 'import_functions' => false],
        // Convert `heredoc` to `nowdoc` where possible.
        'heredoc_to_nowdoc' => true,
        // Function `implode` must be called with 2 arguments in the documented order.
        'implode_call' => true,
        // Include/Require and file path should be divided with a single space. File path should not be placed under brackets.
        'include' => true,
        // Pre- or post-increment and decrement operators should be used if possible.
        'increment_style' => ['style' => 'post'],
        // Code MUST use configured indentation type.
        'indentation_type' => true,
        // Integer literals must be in correct case.
        'integer_literal_case' => true,
        // Lambda must not import variables it doesn't use.
        'lambda_not_used_import' => true,
        // All PHP files must use same line ending.
        'line_ending' => true,
        // Ensure there is no code on the same line as the PHP open tag.
        'linebreak_after_opening_tag' => true,
        // List (`array` destructuring) assignment should be declared using the configured syntax. Requires PHP >= 7.1.
        'list_syntax' => ['syntax' => 'short'],
        // Use `&&` and `||` logical operators instead of `and` and `or`.
        'logical_operators' => true,
        // Cast should be written in lower case.
        'lowercase_cast' => true,
        // PHP keywords MUST be in lower case.
        'lowercase_keywords' => true,
        // Class static references `self`, `static` and `parent` MUST be in lower case.
        'lowercase_static_reference' => true,
        // Magic constants should be referred to using the correct casing.
        'magic_constant_casing' => true,
        // Magic method definitions and calls must be using the correct casing.
        'magic_method_casing' => true,
        // Replace non multibyte-safe functions with corresponding mb function.
        'mb_str_functions' => true,
        // In method arguments and method call, there MUST NOT be a space before each comma and there MUST be one space after each comma. Argument lists MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.
        'method_argument_space' => ['after_heredoc' => true, 'keep_multiple_spaces_after_comma' => false, 'on_multiline' => 'ensure_fully_multiline'],
        // Method chaining MUST be properly indented. Method chaining with different levels of indentation is not supported.
        'method_chaining_indentation' => true,
        // Replace `strpos()` calls with `str_starts_with()` or `str_contains()` if possible.
        'modernize_strpos' => true,
        // Replaces `intval`, `floatval`, `doubleval`, `strval` and `boolval` function calls with according type casting operator.
        'modernize_types_casting' => true,
        // DocBlocks must start with two asterisks, multiline comments must start with a single asterisk, after the opening slash. Both must end with a single asterisk before the closing slash.
        'multiline_comment_opening_closing' => true,
        // Forbid multi-line whitespace before the closing semicolon or move the semicolon to the new line for chained calls.
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        // Add leading `\` before constant invocation of internal constant to speed up resolving. Constant name match is case-sensitive, except for `null`, `false` and `true`.
        'native_constant_invocation' => ['exclude' => ['null', 'false', 'true'], 'fix_built_in' => true, 'include' => [], 'scope' => 'all', 'strict' => true],
        // Function defined by PHP should be called using the correct casing.
        'native_function_casing' => true,
        // Add leading `\` before function invocation to speed up resolving.
        'native_function_invocation' => ['exclude' => [], 'include' => ['@all'], 'scope' => 'all', 'strict' => true],
        // Native type hints for functions should use the correct case.
        'native_function_type_declaration_casing' => true,
        // All instances created with `new` keyword must (not) be followed by braces.
        'new_with_braces' => ['anonymous_class' => true, 'named_class' => true],
        // Master functions shall be used instead of aliases.
        'no_alias_functions' => ['sets' => ['@IMAP', '@all', '@exif', '@ftp', '@internal', '@ldap', '@mbreg', '@mysqli', '@oci', '@odbc', '@openssl', '@pcntl', '@pg', '@posix', '@snmp', '@sodium', '@time']],
        // Replace control structure alternative syntax to use braces.
        'no_alternative_syntax' => ['fix_non_monolithic_code' => true],
        // There should not be a binary flag before strings.
        'no_binary_string' => true,
        // There should be no empty lines after class opening brace.
        'no_blank_lines_after_class_opening' => true,
        // There should not be blank lines between docblock and the documented element.
        'no_blank_lines_after_phpdoc' => true,
        // There must be a comment when fall-through is intentional in a non-empty case body.
        'no_break_comment' => ['comment_text' => 'no break'],
        // The closing `? >` tag MUST be omitted from files containing only PHP.
        'no_closing_tag' => true,
        // There should not be any empty comments.
        'no_empty_comment' => true,
        // There should not be empty PHPDoc blocks.
        'no_empty_phpdoc' => true,
        // Remove useless (semicolon) statements.
        'no_empty_statement' => true,
        // Removes extra blank lines and/or blank lines following configuration.
        'no_extra_blank_lines' => ['tokens' => ['attribute', 'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use']],
        // Replace accidental usage of homoglyphs (non ascii characters) in names.
        'no_homoglyph_names' => true,
        // Remove leading slashes in `use` clauses.
        'no_leading_import_slash' => true,
        // The namespace declaration line shouldn't contain leading whitespace.
        'no_leading_namespace_whitespace' => true,
        // Either language construct `print` or `echo` should be used.
        'no_mixed_echo_print' => ['use' => 'echo'],
        // Operator `=>` should not be surrounded by multi-line whitespaces.
        'no_multiline_whitespace_around_double_arrow' => true,
        // There must not be more than one statement per line.
        'no_multiple_statements_per_line' => true,
        // Properties MUST not be explicitly initialized with `null` except when they have a type declaration (PHP 7.4).
        'no_null_property_initialization' => true,
        // Convert PHP4-style constructors to `__construct`.
        'no_php4_constructor' => true,
        // Short cast `bool` using double exclamation mark should not be used.
        'no_short_bool_cast' => true,
        // Single-line whitespace before closing semicolon are prohibited.
        'no_singleline_whitespace_before_semicolons' => true,
        // There must be no space around double colons (also called Scope Resolution Operator or Paamayim Nekudotayim).
        'no_space_around_double_colon' => true,
        // When making a method or function call, there MUST NOT be a space between the method or function name and the opening parenthesis.
        'no_spaces_after_function_name' => true,
        // There MUST NOT be spaces around offset braces.
        'no_spaces_around_offset' => ['positions' => ['inside', 'outside']],
        // There MUST NOT be a space after the opening parenthesis. There MUST NOT be a space before the closing parenthesis.
        'no_spaces_inside_parenthesis' => true,
        // Replaces superfluous `elseif` with `if`.
        'no_superfluous_elseif' => true,
        // If a list of values separated by a comma is contained on a single line, then the last item MUST NOT have a trailing comma.
        'no_trailing_comma_in_singleline' => true,
        // Remove trailing whitespace at the end of non-blank lines.
        'no_trailing_whitespace' => true,
        // There MUST be no trailing spaces inside comment or PHPDoc.
        'no_trailing_whitespace_in_comment' => true,
        // There must be no trailing whitespace in strings.
        'no_trailing_whitespace_in_string' => true,
        // Removes unneeded parentheses around control statements.
        'no_unneeded_control_parentheses' => ['statements' => ['break', 'clone', 'continue', 'echo_print', 'negative_instanceof', 'others', 'return', 'switch_case', 'yield', 'yield_from']],
        // Removes unneeded curly braces that are superfluous and aren't part of a control structure's body.
        'no_unneeded_curly_braces' => ['namespaces' => true],
        // Imports should not be aliased as the same name.
        'no_unneeded_import_alias' => true,
        // Variables must be set `null` instead of using `(unset)` casting.
        'no_unset_cast' => true,
        // Unused `use` statements must be removed.
        'no_unused_imports' => true,
        // There should not be useless concat operations.
        'no_useless_concat_operator' => ['juggle_simple_strings' => true],
        // There should not be useless `else` cases.
        'no_useless_else' => true,
        // There should not be useless `null-safe-operators` `?->` used.
        'no_useless_nullsafe_operator' => true,
        // There should not be an empty `return` statement at the end of a function.
        'no_useless_return' => true,
        // There must be no `sprintf` calls with only the first argument.
        'no_useless_sprintf' => true,
        // In array declaration, there MUST NOT be a whitespace before each comma.
        'no_whitespace_before_comma_in_array' => ['after_heredoc' => true],
        // Remove trailing whitespace at the end of blank lines.
        'no_whitespace_in_blank_line' => true,
        // Array index should always be written by using square braces.
        'normalize_index_brace' => true,
        // Adds or removes `?` before type declarations for parameters with a default `null` value.
        'nullable_type_declaration_for_default_null_value' => ['use_nullable_type_declaration' => true],
        // There should not be space before or after object operators `->` and `?->`.
        'object_operator_without_whitespace' => true,
        // Literal octal must be in `0o` notation.
        'octal_notation' => true,
        // Operators - when multiline - must always be at the beginning or at the end of the line.
        'operator_linebreak' => ['only_booleans' => false, 'position' => 'beginning'],
        // Ordering `use` statements.
        'ordered_imports' => ['sort_algorithm' => 'alpha', 'imports_order' => ['const', 'class', 'function']],
        // Orders the interfaces in an `implements` or `interface extends` clause.
        'ordered_interfaces' => ['direction' => 'ascend'],
        // Trait `use` statements must be sorted alphabetically.
        'ordered_traits' => true,
        // PHPUnit assertion method calls like `->assertSame(true, $foo)` should be written with dedicated method like `->assertTrue($foo)`.
        'php_unit_construct' => ['assertions' => ['assertEquals', 'assertNotEquals', 'assertNotSame', 'assertSame']],
        // PHPUnit assertions like `assertInternalType`, `assertFileExists`, should be used over `assertTrue`.
        'php_unit_dedicate_assert' => ['target' => 'newest'],
        // PHPUnit assertions like `assertIsArray` should be used over `assertInternalType`.
        'php_unit_dedicate_assert_internal_type' => ['target' => 'newest'],
        // Usages of `->setExpectedException*` methods MUST be replaced by `->expectException*` methods.
        'php_unit_expectation' => ['target' => 'newest'],
        // PHPUnit annotations should be a FQCNs including a root namespace.
        'php_unit_fqcn_annotation' => true,
        // All PHPUnit test classes should be marked as internal.
        'php_unit_internal_class' => ['types' => ['final', 'normal']],
        // Enforce camel (or snake) case for PHPUnit test methods, following configuration.
        'php_unit_method_casing' => ['case' => 'camel_case'],
        // Usages of `->getMock` and `->getMockWithoutInvokingTheOriginalConstructor` methods MUST be replaced by `->createMock` or `->createPartialMock` methods.
        'php_unit_mock' => ['target' => 'newest'],
        // Usage of PHPUnit's mock e.g. `->will($this->returnValue(..))` must be replaced by its shorter equivalent such as `->willReturn(...)`.
        'php_unit_mock_short_will_return' => true,
        // PHPUnit classes MUST be used in namespaced version, e.g. `\PHPUnit\Framework\TestCase` instead of `\PHPUnit_Framework_TestCase`.
        'php_unit_namespaced' => ['target' => 'newest'],
        // Usages of `@expectedException*` annotations MUST be replaced by `->setExpectedException*` methods.
        'php_unit_no_expectation_annotation' => ['target' => 'newest'],
        // Changes the visibility of the `setUp()` and `tearDown()` functions of PHPUnit to `protected`, to match the PHPUnit TestCase.
        'php_unit_set_up_tear_down_visibility' => true,
        // All PHPUnit test cases should have `@small`, `@medium` or `@large` annotation to enable run time limits.
        'php_unit_size_class' => ['group' => 'small'],
        // PHPUnit methods like `assertSame` should be used instead of `assertEquals`.
        'php_unit_strict' => ['assertions' => ['assertAttributeEquals', 'assertAttributeNotEquals', 'assertEquals', 'assertNotEquals']],
        // Adds or removes @test annotations from tests, following configuration.
        'php_unit_test_annotation' => ['style' => 'prefix'],
        // Calls to `PHPUnit\Framework\TestCase` static methods must all be of the same type, either `$this->`, `self::` or `static::`.
        'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
        // PHPDoc should contain `@param` for all params.
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => false],
        // All items of the given phpdoc tags must be either left-aligned or (by default) aligned vertically.
        'phpdoc_align' => ['align' => 'left', 'tags' => ['method', 'param', 'property', 'property-read', 'property-write', 'return', 'throws', 'type', 'var']],
        // PHPDoc annotation descriptions should not be a sentence.
        'phpdoc_annotation_without_dot' => true,
        // Docblocks should have the same indentation as the documented subject.
        'phpdoc_indent' => true,
        // Fixes PHPDoc inline tags.
        'phpdoc_inline_tag_normalizer' => ['tags' => ['example', 'id', 'internal', 'inheritdoc', 'inheritdocs', 'link', 'source', 'toc', 'tutorial']],
        // Changes doc blocks from single to multi line, or reversed. Works for class constants, properties and methods only.
        'phpdoc_line_span' => ['const' => 'multi', 'method' => 'multi', 'property' => 'multi'],
        // `@access` annotations should be omitted from PHPDoc.
        'phpdoc_no_access' => true,
        // No alias PHPDoc tags should be used.
        'phpdoc_no_alias_tag' => ['replacements' => ['property-read' => 'property', 'property-write' => 'property', 'type' => 'var', 'link' => 'see']],
        // `@package` and `@subpackage` annotations should be omitted from PHPDoc.
        'phpdoc_no_package' => true,
        // Classy that does not inherit must not have `@inheritdoc` tags.
        'phpdoc_no_useless_inheritdoc' => true,
        // Annotations in PHPDoc should be ordered in defined sequence.
        'phpdoc_order' => ['order' => ['param', 'throws', 'return']],
        // Order phpdoc tags by value.
        'phpdoc_order_by_value' => ['annotations' => ['author', 'covers', 'coversNothing', 'dataProvider', 'depends', 'group', 'internal', 'method', 'mixin', 'property', 'property-read', 'property-write', 'requires', 'throws', 'uses']],
        // The type of `@return` annotations of methods returning a reference to itself must the configured one.
        'phpdoc_return_self_reference' => ['replacements' => ['this' => '$this', '@this' => '$this', '$self' => 'self', '@self' => 'self', '$static' => 'static', '@static' => 'static']],
        // Scalar types should always be written in the same form. `int` not `integer`, `bool` not `boolean`, `float` not `real` or `double`.
        'phpdoc_scalar' => ['types' => ['boolean', 'callback', 'double', 'integer', 'real', 'str']],
        // Annotations in PHPDoc should be grouped together so that annotations of the same type immediately follow each other. Annotations of a different type are separated by a single blank line.
        'phpdoc_separation' => true,
        // Single line `@var` PHPDoc should have proper spacing.
        'phpdoc_single_line_var_spacing' => true,
        // PHPDoc summary should end in either a full stop, exclamation mark, or question mark.
        'phpdoc_summary' => true,
        // Fixes casing of PHPDoc tags.
        'phpdoc_tag_casing' => ['tags' => ['inheritDoc']],
        // Forces PHPDoc tags to be either regular annotations or inline.
        'phpdoc_tag_type' => ['tags' => ['api' => 'annotation', 'author' => 'annotation', 'copyright' => 'annotation', 'deprecated' => 'annotation', 'example' => 'annotation', 'global' => 'annotation', 'inheritDoc' => 'annotation', 'internal' => 'annotation', 'license' => 'annotation', 'method' => 'annotation', 'package' => 'annotation', 'param' => 'annotation', 'property' => 'annotation', 'return' => 'annotation', 'see' => 'annotation', 'since' => 'annotation', 'throws' => 'annotation', 'todo' => 'annotation', 'uses' => 'annotation', 'var' => 'annotation', 'version' => 'annotation']],
        // PHPDoc should start and end with content, excluding the very first and last line of the docblocks.
        'phpdoc_trim' => true,
        // Removes extra blank lines after summary and after description in PHPDoc.
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        // The correct case must be used for standard PHP types in PHPDoc.
        'phpdoc_types' => ['groups' => ['alias', 'meta', 'simple']],
        // Sorts PHPDoc types.
        'phpdoc_types_order' => ['null_adjustment' => 'always_last', 'sort_algorithm' => 'alpha'],
        // `@var` and `@type` annotations must have type and name in the correct order.
        'phpdoc_var_annotation_correct_order' => true,
        // `@var` and `@type` annotations of classy properties should not contain the name.
        'phpdoc_var_without_name' => true,
        // Converts `pow` to the `**` operator.
        'pow_to_exponentiation' => true,
        // Replaces `rand`, `srand`, `getrandmax` functions calls with their `mt_*` analogs or `random_int`.
        'random_api_migration' => ['replacements' => ['getrandmax' => 'mt_getrandmax', 'rand' => 'mt_rand', 'srand' => 'mt_srand']],
        // Callables must be called without using `call_user_func*` when possible.
        'regular_callable_call' => true,
        // Adjust spacing around colon in return type declarations and backed enum types.
        'return_type_declaration' => ['space_before' => 'none'],
        // Instructions must be terminated with a semicolon.
        'semicolon_after_instruction' => true,
        // Cast shall be used, not `settype`.
        'set_type_to_cast' => true,
        // Cast `(boolean)` and `(integer)` should be written as `(bool)` and `(int)`, `(double)` and `(real)` as `(float)`, `(binary)` as `(string)`.
        'short_scalar_cast' => true,
        // Converts explicit variables in double-quoted strings and heredoc syntax from simple to complex format (`${` to `{$`).
        'simple_to_complex_string_variable' => true,
        // A return statement wishing to return `void` should not return `null`.
        'simplified_null_return' => true,
        // A PHP file without end tag must always end with a single empty line feed.
        'single_blank_line_at_eof' => true,
        // There should be exactly one blank line before a namespace declaration.
        'single_blank_line_before_namespace' => true,
        // There MUST NOT be more than one property or constant declared per statement.
        'single_class_element_per_statement' => ['elements' => ['const', 'property']],
        // There MUST be one use keyword per declaration.
        'single_import_per_statement' => ['group_to_single_imports' => true],
        // Each namespace use MUST go on its own line and there MUST be one blank line after the use statements block.
        'single_line_after_imports' => true,
        // Single-line comments must have proper spacing.
        'single_line_comment_spacing' => true,
        // Single-line comments and multi-line comments with only one line of actual content should use the `//` syntax.
        'single_line_comment_style' => ['comment_types' => ['asterisk', 'hash']],
        // Throwing exception must be done in single line.
        'single_line_throw' => true,
        // Convert double quotes to single quotes for simple strings.
        'single_quote' => ['strings_containing_single_quote_chars' => true],
        // Ensures a single space after language constructs.
        'single_space_after_construct' => ['constructs' => ['abstract', 'as', 'attribute', 'break', 'case', 'catch', 'class', 'clone', 'comment', 'const', 'const_import', 'continue', 'do', 'echo', 'else', 'elseif', 'enum', 'extends', 'final', 'finally', 'for', 'foreach', 'function', 'function_import', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'match', 'named_argument', 'namespace', 'new', 'open_tag_with_echo', 'php_doc', 'php_open', 'print', 'private', 'protected', 'public', 'readonly', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'type_colon', 'use', 'use_lambda', 'use_trait', 'var', 'while', 'yield', 'yield_from']],
        // Each trait `use` must be done as single statement.
        'single_trait_insert_per_statement' => true,
        // Fix whitespace after a semicolon.
        'space_after_semicolon' => ['remove_in_empty_for_expressions' => false],
        // Increment and decrement operators should be used if possible.
        'standardize_increment' => true,
        // Replace all `<>` with `!=`.
        'standardize_not_equals' => true,
        // Each statement must be indented.
        'statement_indentation' => true,
        // Lambdas not (indirect) referencing `$this` must be declared `static`.
        'static_lambda' => true,
        // Comparisons should be strict.
        'strict_comparison' => true,
        // String tests for empty must be done against `''`, not with `strlen`.
        'string_length_to_empty' => true,
        // All multi-line strings must use correct line ending.
        'string_line_ending' => true,
        // A case should be followed by a colon and not a semicolon.
        'switch_case_semicolon_to_colon' => true,
        // Removes extra spaces between colon and case value.
        'switch_case_space' => true,
        // Switch case must not be ended with `continue` but with `break`.
        'switch_continue_to_break' => true,
        // Standardize spaces around ternary operator.
        'ternary_operator_spaces' => true,
        // Use the Elvis operator `?:` where possible.
        'ternary_to_elvis_operator' => true,
        // Use `null` coalescing operator `??` where possible. Requires PHP >= 7.0.
        'ternary_to_null_coalescing' => true,
        // Multi-line arrays, arguments list, parameters list and `match` expressions must have a trailing comma.
        'trailing_comma_in_multiline' => ['after_heredoc' => true, 'elements' => ['arguments', 'arrays', 'match', 'parameters']],
        // Arrays should be formatted like function/method arguments, without leading or trailing single line space.
        'trim_array_spaces' => true,
        // A single space or none should be around union type and intersection type operators.
        'types_spaces' => ['space' => 'none'],
        // Unary operators should be placed adjacent to their operands.
        'unary_operator_spaces' => true,
        // Anonymous functions with one-liner return statement must use arrow functions.
        'use_arrow_functions' => true,
        // Visibility MUST be declared on all properties and methods; `abstract` and `final` MUST be declared before the visibility; `static` MUST be declared after the visibility.
        'visibility_required' => ['elements' => ['const', 'method', 'property']],
        // Add `void` return type to functions with missing or empty return statements, but priority is given to `@return` annotations. Requires PHP >= 7.1.
        'void_return' => false,
        // In array declaration, there MUST be a whitespace after each comma.
        'whitespace_after_comma_in_array' => ['ensure_single_space' => true],
        // Write conditions in Yoda style (`true`), non-Yoda style (`['equal' => false, 'identical' => false, 'less_and_greater' => false]`) or ignore those conditions (`null`) based on configuration.
        'yoda_style' => ['always_move_variable' => false, 'equal' => false, 'identical' => false, 'less_and_greater' => false],
        // Force strict types declaration in all files.
        'declare_strict_types' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(true);
