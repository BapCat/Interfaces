<?php namespace BapCat\Interfaces\Ioc;

/**
 * Dependency injection manager
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class Ioc implements Resolver {
  /**
   * @var object  Singleton instance
   */
  private static $_instance = null;
  
  /**
   * Accessor for singleton, instantiates if necessary
   */
  public static function instance() {
    if(self::$_instance == null) {
      self::$_instance = new static;
    }
    
    return self::$_instance;
  }
  
  /**
   * Binds a class to an alias
   * 
   * @param  string                  $alias    An alias (eg. `db.helper`), or a real class or
   *                                           interface name to be replaced by `$binding`
   * @param  string|callable|object  $binding  May be one of the following:
   *                                           <ul>
   *                                             <li>The fully-qualified name of a class</li>
   *                                             <li>An instance of a class (creates a singleton)</li>
   *                                             <li>A callable that returns an instance of a class</li>
   *                                           </ul>
   */
  public abstract function bind($alias, $binding);
  
  /**
   * Binds a class to an alias as a lazy-loaded singleton
   * 
   * @param  string                  $alias    An alias (eg. `db.helper`), or a real class or
   *                                           interface name to be replaced by `$binding`
   * @param  string|callable|object  $binding  May be one of the following:
   *                                           <ul>
   *                                             <li>The fully-qualified name of a class</li>
   *                                             <li>An instance of a class (creates a singleton)</li>
   *                                             <li>A callable that returns an instance of a class</li>
   *                                           </ul>
   * @param  array  $arguments  The arguments to pass to the binding when it is constructed
   */
  public abstract function singleton($alias, $binding, array $arguments = []);
  
  /**
   * Resolves an alias to a concrete class name
   * 
   * @param  string  $alias  An alias (eg. `db.helper`) to resolve back to a real class
   * 
   * @return string  The concrete class registered to alias, or `$alias` if there is no binding
   */
  public abstract function resolve($alias);
  
  /**
   * Adds a custom resolver to the IoC container
   * 
   * @param  Resolver  $resolver  The resolver to add
   */
  public abstract function addResolver(Resolver $resolver);
  
  /**
   * Executes a method using dependency injection
   * 
   * @param  object  $instance   An instance of an object, or a class name if calling a static method
   * @param  string  $method     The name of the method to call on the object or class
   * @param  array   $arguments  The arguments to pass to the method
   * 
   * @return mixed   The return value of the called method
   */
  public abstract function execute($instance, $method, array $arguments = []);
}
