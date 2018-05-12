<?php

/*
 * This file is part of the Antvel Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antvel\Address\Tests\Concerns;

trait Environment
{
    /**
     * Load the database migrations.
     *
     * @return void
     */
    protected function loadMigrations()
    {
        $this->artisan('migrate:fresh');
    }

    /**
     * Load the database factories.
     *
     * @return void
     */
    protected function loadFactories()
    {
        $this->withFactories(__DIR__ . '/../../database/factories');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', $this->generateRandomKey($app));
    }

    /**
     * Generate a random key for the application.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return string
     */
    protected function generateRandomKey($app)
    {
        return 'base64:' . base64_encode(random_bytes(
            $app['config']['app']['cipher'] == 'AES-128-CBC' ? 16 : 32
        ));
    }

    /**
     * Get package service providers.
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Antvel\Address\AddressServiceProvider::class
        ];
    }
}
