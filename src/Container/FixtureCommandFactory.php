<?php
/**
 *
 */

declare(strict_types=1);

namespace Zend\Expressive\Doctrine\Fixtures\Container;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Doctrine\Fixtures\FixtureCommand;

/**
 * Class FixtureCommandFactory
 *
 * @package Zend\Expressive\Doctrine\Fixtures\Container
 */
class FixtureCommandFactory
{
    /**
     * @param ContainerInterface $container
     * @return FixtureCommand
     */
    public function __invoke(ContainerInterface $container): FixtureCommand
    {
        $config = $container->get('config');
        $paths = [];

        if (isset($config['doctrine']['fixture']) && is_array($config['doctrine']['fixture'])) {
            $paths = $config['doctrine']['fixture'];
        }

        $em = $container->get(EntityManagerInterface::class);
        $importCommand = new FixtureCommand($em);
        $importCommand->setPaths($paths);

        return $importCommand;
    }
}
