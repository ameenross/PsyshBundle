<?php

/*
 * This file is part of the PsyshBundle package.
 *
 * (c) Théo FIDRY <theo.fidry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fidry\PsyshBundle\Tests\Command;

use Fidry\PsyshBundle\Command\PsyshCommand;
use Psy\Shell;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
class PsyshCommandIntegrationTest extends KernelTestCase
{
    /**
     * @var Shell
     */
    private $shell;

    /**
     * @var PsyshCommand
     */
    private $command;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->shell = self::$kernel->getContainer()->get('psysh.shell');
        $this->command = self::$kernel->getContainer()->get('psysh.command.shell_command');
    }

    public function testScopeVariables()
    {
        $this->assertEquals(
            [
                'container',
                'kernel',
                'parameters',
                '_',
                'self',
            ],
            array_keys($this->shell->getScopeVariables()),
            'Expected shell service to have scope variables',
            0.0,
            10,
            true
        );
    }

    public function testFindShell()
    {
        $application = new Application(self::$kernel);
        $application->add($this->command);
        $application->find('psysh');

        $this->assertTrue(true);
    }
}
