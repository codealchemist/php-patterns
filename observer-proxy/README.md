#Observer-Proxy PHP pattern

Check this examples:
[PHP Design Patterns by IBM](http://www.ibm.com/developerworks/library/os-php-designptrns)

I wanted to create an *Observer* without manually adding new code to the object I wanted to observe.
Since PHP 5.3.0 *annonymous functions* are available and I wanted to try the observer pattern using them.

This should feel pretty natural to you if are used to jQuery, for example:

    $observableObject->on('methodName', function($object){
        ...
    });
