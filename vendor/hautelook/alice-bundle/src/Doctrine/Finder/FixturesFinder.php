<?php

/*
 * This file is part of the Hautelook\AliceBundle package.
 *
 * (c) Baldur Rensch <brensch@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hautelook\AliceBundle\Doctrine\Finder;

use Hautelook\AliceBundle\Doctrine\DataFixtures\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder as SymfonyFinder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

/**
 * Extends its parent class to take into account doctrine data loaders.
 *
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
class FixturesFinder extends \Hautelook\AliceBundle\Finder\FixturesFinder implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     *
     * Extended to look for data loaders. If a data loader is found, will take the fixtures from it instead of taking
     * all the fixtures files.
     */
    public function getFixturesFromDirectory($path)
    {
        $fixtures = [];

        $loaders = $this->getDataLoadersFromDirectory($path);
        foreach ($loaders as $loader) {
            $fixtures = array_merge($fixtures, $loader->getFixtures());
        }

        // If no data loader is found, takes all fixtures files
        if (0 === count($loaders)) {
            return parent::getFixturesFromDirectory($path);
        }

        return $fixtures;
    }

    /**
     * Gets all data loaders instances.
     *
     * For first get all the path for where to look for data loaders.
     *
     * @param BundleInterface[] $bundles
     * @param string            $environment
     *
     * @return LoaderInterface[] Fixtures files real paths.
     */
    public function getDataLoaders(array $bundles, $environment)
    {
        $loadersPaths = $this->getLoadersPaths($bundles, $environment);

        // Add all fixtures to the new Doctrine loader
        $loaders = [];
        foreach ($loadersPaths as $path) {
            $loaders = array_merge($loaders, $this->getDataLoadersFromDirectory($path));
        }

        return $loaders;
    }

    /**
     * Get data loaders inside the given directory.
     *
     * @param string $path Directory path
     *
     * @return LoaderInterface[]
     */
    private function getDataLoadersFromDirectory($path)
    {
        $loaders = [];

        // Get all PHP classes in given folder
        $phpClasses = [];
        $finder = SymfonyFinder::create()->depth(0)->in($path)->files()->name('*.php');
        foreach ($finder as $file) {
            /* @var SplFileInfo $file */
            $phpClasses[$file->getRealPath()] = true;
            require_once $file->getRealPath();
        }

        $loaderInterface = 'Hautelook\AliceBundle\Doctrine\DataFixtures\LoaderInterface';

        // Check if PHP classes are data loaders or not
        foreach (get_declared_classes() as $className) {
            $reflectionClass = new \ReflectionClass($className);
            $sourceFile = $reflectionClass->getFileName();

            if (true === isset($phpClasses[$sourceFile])) {
                if ($reflectionClass->implementsInterface($loaderInterface) && !$reflectionClass->isAbstract()) {
                    $loader = new $className();
                    $loaders[$className] = $loader;

                    if ($loader instanceof ContainerAwareInterface) {
                        $loader->setContainer($this->container);
                    }
                }
            }
        }

        return $loaders;
    }
}
