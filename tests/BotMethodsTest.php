<?php

namespace WeStacks\TeleBot\Tests;

use Dotenv\Dotenv;
use WeStacks\TeleBot\Bot;
use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\User;

class BotMethodsTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $dotenv = Dotenv::createUnsafeImmutable(__DIR__.'/..');
        $dotenv->load();

        $this->bot = new Bot([
            'token' => getenv('TELEGRAM_BOT_TOKEN'),
            'name'  => getenv('TELEGRAM_BOT_NAME')
        ]);
    }

    public function testBotCreated()
    {
        $this->assertInstanceOf(Bot::class, $this->bot);
    }

    public function testExecuteMethod()
    {
        $botUser = $this->bot->getMe();
        $this->assertInstanceOf(User::class, $botUser);
    }
}