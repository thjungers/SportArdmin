<?php

namespace App\Override\Routing;

use Illuminate\Routing\ResourceRegistrar as OriginalRegistrar;

class ResourceRegistrar extends OriginalRegistrar
{
    /**
     * Add the update method for a resourceful route.
     * Overridden from Illuminate\Routing\ResourceRegistrar: do not add a PUT route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceUpdate($name, $base, $controller, $options)
    {
        $name = $this->getShallowName($name, $options);

        $uri = $this->getResourceUri($name).'/{'.$base.'}';

        $action = $this->getResourceAction($name, $controller, 'update', $options);

        return $this->router->patch($uri, $action);
    }
}