<?php

class Message
{


    static protected $winner = "\nVENCEDOR! Você precisou de %s jogos com %s números e %s para ganhar. Parabéns!".PHP_EOL;

    static protected $loser = "\nQue pena que não ganhou! Você gastou %s, jogou %s vezes com %s números. Talvez na próxima vida!".PHP_EOL;

    static protected $playedNumbers = 'Os números jogados foram: %s';

    public static function winner (...$message)
    {
       printf(static::$winner, ...$message);
    }

    public static function loser (...$message)
    {
       printf(static::$loser, ...$message);
    }

    public static function playedNumbers (...$message)
    {
       printf(static::$playedNumbers, ...$message);
    }
}
