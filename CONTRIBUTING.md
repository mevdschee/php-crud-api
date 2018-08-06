# Contributing to php-crud-api

Pull requests are welcome.

## Use phpfmt

Please use "phpfmt" to ensure consistent formatting.

## Run the tests

Before you do a PR, you should ensure any new functionality has test cases and that all existing tests are succeeding.

## Run the build 

Since this project is a single file application, you must ensure that classes are loaded in the correct order. 
This is only important for the "extends" and "implements" relations. The 'build.php' script appends the classes in 
alphabetical order (directories first). The path of the class that is extended or implemented (parent) must be above
the extending or implementing (child) class when listing the contents of the 'src' directory in this order. If you
get this order wrong you will see the build will fail with a "Class not found" error message. The solution is to
rename the child class so that it starts with a later letter in the alphabet than the parent class or that you move
the parent class to a subdirectory (directories are scanned first).
