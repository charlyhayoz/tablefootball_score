<?php

namespace App\Helper;

class Avatar
{
  const LIST = [
    'storage/images/avatars/astronaut.png',
    'storage/images/avatars/bear.png',
    'storage/images/avatars/chicken.png',
    'storage/images/avatars/dog.png',
    'storage/images/avatars/fox.png',
    'storage/images/avatars/meerkat.png',
    'storage/images/avatars/panda.png',
    'storage/images/avatars/rabbit.png'
  ];


  public static function getRandomAvatar()
  {
    return self::LIST[array_rand(self::LIST, 1)];
  }

  public static function getAllAvatars()
  {
    return self::LIST;
  }
}
