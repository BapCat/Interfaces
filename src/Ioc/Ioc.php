<?php namespace BapCat\Interfaces\Ioc;

/**
 * Dependency injection manager
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
   * @param   string                  $alias      An alias (eg. `db.helper`), or a real class or
   *                                              interface name to be replaced by `$binding`
   * @param   string|callable|object  $binding    May be one of the following:
   *                                              <ul>
   *                                                  <li>The fully-qualified name of a class</li>
   *                                                  <li>An instance of a class (creates a singleton)</li>
   *                                                  <li>A callable that returns an instance of a class</li>
   *                                              </ul>
   */
  public abstract function bind($alias, $binding);
  
  /**
   * Adds a custom resolver to the IoC container
   * 
   * @param   Resolver  $resolver The resolver to add
   */
  public abstract function addResolver(Resolver $resolver);
}
