<?php

/*
 * This file is part of the Hautelook\AliceBundle package.
 *
 * (c) Baldur Rensch <brensch@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hautelook\AliceBundle\Tests\SymfonyApp;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle;
use Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle;
use Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle;
use Hautelook\AliceBundle\HautelookAliceBundle;
use Hautelook\AliceBundle\Tests\SymfonyApp\TestBundle\Bundle\ABundle\TestABundle;
use Hautelook\AliceBundle\Tests\SymfonyApp\TestBundle\Bundle\BBundle\TestBBundle;
use Hautelook\AliceBundle\Tests\SymfonyApp\TestBundle\Bundle\CBundle\TestCBundle;
use Hautelook\AliceBundle\Tests\SymfonyApp\TestBundle\Bundle\DBundle\TestDBundle;
use Hautelook\AliceBundle\Tests\SymfonyApp\TestBundle\TestBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new DoctrineBundle(),
            new DoctrineFixturesBundle(),
            new DoctrineMongoDBBundle(),
            new DoctrinePHPCRBundle(),
            new FrameworkBundle(),
            new HautelookAliceBundle(),
            new TestBundle(),
            new TestABundle(),
            new TestBBundle(),
            new TestCBundle(),
            new TestDBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.yml');
    }
}
