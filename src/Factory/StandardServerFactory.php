<?php
declare(strict_types=1);

namespace Xaddax\GraphQL\Factory;

use GraphQL\Server\StandardServer;
use Psr\Container\ContainerInterface;

final class StandardServerFactory
{
    public function __invoke(ContainerInterface $container): StandardServer
    {
        $config = $container->get('config')['graphQL']['server'];

        $schemaClass = $config['schema'];
        $config['schema'] = new $schemaClass();

        return new StandardServer($config);
    }
}