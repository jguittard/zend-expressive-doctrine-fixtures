<?php
/**
 *
 */

declare(strict_types=1);

namespace Zend\Expressive\Doctrine\Fixtures;

/**
 * Class ConfigProvider
 *
 * @package Zend\Expressive\Doctrine\Fixtures
 */
class ConfigProvider
{
    /**
     * Return configuration for this component.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    /**
     * Return dependency mappings for this component.
     *
     * @return array
     */
    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                FixtureCommand::class => Container\FixtureCommandFactory::class,
            ],
        ];
    }
}
