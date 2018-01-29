<?php
use PhpParser\Error;
use PhpParser\ParserFactory;

$code = <<<'CODE'
<?php
$arararar = 'vlavla';
//je suis un commentaire;
$az = "boom";

/* deuxieme commenaire */
function test($foo)
{
    var_dump($foo);
}
CODE;
$parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

try {
    $stmts = $parser->parse($code);
    echo "<pre>";
    var_dump($stmts);
    echo "</pre>";

} catch (Error $e) {
    echo 'Parse Error: ', $e->getMessage();
}

use PhpParser\PrettyPrinter;

$code = "<?php echo 'Hi ', hi\\getTarget();";

$parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
$prettyPrinter = new PrettyPrinter\Standard;

try {
    // parse
    $stmts = $parser->parse($code);

    // change
    $stmts[0]         // the echo statement
          ->exprs     // sub expressions
          [0]         // the first of them (the string node)
          ->value     // it's value, i.e. 'Hi '
          = 'Hello '; // change to 'Hello '

    // pretty print
    $code = $prettyPrinter->prettyPrint($stmts);

    echo $code;
} catch (Error $e) {
    echo 'Parse Error: ', $e->getMessage();
}
//
// $prettyPrinter = new PrettyPrinter\Standard;
// $temp = $prettyPrinter->prettyPrintFile($ast);
// echo "<a href=\"/code?userID=$temp\">User</a>";
// highlight_string($temp);
