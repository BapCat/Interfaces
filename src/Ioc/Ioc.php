<?php namespace BapCat\Interfaces\Ioc;

/**
 * Dependency injection manager
 */
interface Ioc extends Resolver {
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
  public function bind($alias, $binding);
  
  /**
   * Adds a custom resolver to the IoC container
   * 
   * @param   Resolver  $resolver The resolver to add
   */
  public function addResolver(Resolver $resolver);
}
