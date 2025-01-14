<?php

/*
 * This file is part of the AntiMattr MongoDB Migrations Bundle, a library by Matthew Fitzgerald.
 *
 * (c) 2014 Matthew Fitzgerald
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AntiMattr\Bundle\MongoDBMigrationsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The config tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('mongo_db_migrations', 'array');
        $rootNode = method_exists(TreeBuilder::class, 'getRootNode') ? $treeBuilder->getRootNode() : $treeBuilder->root('mongo_db_migrations', 'array');

        $rootNode
            ->children()
                ->scalarNode('collection_name')->defaultValue('migration_versions')->cannotBeEmpty()->end()
                ->scalarNode('database_name')->cannotBeEmpty()->end()
                ->scalarNode('dir_name')->defaultValue('%kernel.project_dir%/src/MongoDBMigrations')->cannotBeEmpty()->end()
                ->scalarNode('name')->defaultValue('Application MongoDB Migrations')->end()
                ->scalarNode('namespace')->defaultValue('Application\MongoDBMigrations')->cannotBeEmpty()->end()
                ->scalarNode('script_dir_name')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
